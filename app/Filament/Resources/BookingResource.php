<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingResource\Pages;
use App\Mail\BookingStatusUpdatedMail;
use App\Models\Booking;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\Mail;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required(),
                TextInput::make('email')->email(),
                TextInput::make('phone'),
                Select::make('service_id')
                    ->relationship('service', 'name')
                    ->required(),
                DatePicker::make('preferred_date'),
                TextInput::make('preferred_time')->placeholder('e.g. Morning, 2:00 PM'),
                Textarea::make('notes')->rows(3),
                Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'confirmed' => 'Confirmed',
                        'cancelled' => 'Cancelled',
                    ])
                    ->default('pending'),
            ]);
    }

    public static function table(Table $table): Table
    {

        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('phone'),
                TextColumn::make('email')->limit(30),
                TextColumn::make('service.name')->label('Service'),
                TextColumn::make('preferred_date')->date(),
                TextColumn::make('preferred_time'),
                TextColumn::make('status')->badge()->color(fn(string $state): string => match ($state) {
                    'pending' => 'gray',
                    'confirmed' => 'success',
                    'cancelled' => 'danger',
                }),
                TextColumn::make('created_at')->label('Booked At')->since(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                // delete bookings
                Tables\Actions\Action::make('delete')
                    ->label('Delete')
                    ->icon('heroicon-o-trash')
                    ->action(function ($record) {
                        $record->delete();
                    })
                    ->requiresConfirmation(),
                Tables\Actions\Action::make('updateStatus')
                    ->label('Update Status')
                    ->icon('heroicon-o-check-circle')
                    ->form([
                        Select::make('status')
                            ->options([
                                'pending' => 'Pending',
                                'confirmed' => 'Confirmed',
                                'cancelled' => 'Cancelled',
                            ])
                            ->required()
                            ->default('pending'),
                    ])
                    ->action(function (array $data, $record) {
                        $record->update(['status' => $data['status']]);

                        if ($record->email) {
                            $mailable = new BookingStatusUpdatedMail($record);
                            Mail::to($record->email)->send($mailable);
                        }
                    })
                    ->requiresConfirmation()
                    ->visible(fn($record) => $record->status === 'pending') // 👈 only show if pending


            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBookings::route('/'),
            'create' => Pages\CreateBooking::route('/create'),
            'edit' => Pages\EditBooking::route('/{record}/edit'),
        ];
    }
}