<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OpeningHourResource\Pages;
use App\Filament\Resources\OpeningHourResource\RelationManagers;
use App\Models\OpeningHour;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\{Select, TimePicker, Toggle};
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;

class OpeningHourResource extends Resource
{
    protected static ?string $model = OpeningHour::class;

    protected static ?string $navigationIcon = 'heroicon-o-clock';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Select::make('day')
                ->required()
                ->options([
                    'Monday' => 'Monday',
                    'Tuesday' => 'Tuesday',
                    'Wednesday' => 'Wednesday',
                    'Thursday' => 'Thursday',
                    'Friday' => 'Friday',
                    'Saturday' => 'Saturday',
                    'Sunday' => 'Sunday',
                ])
                ->unique(ignoreRecord: true), // ensure one record per day
            TimePicker::make('opens_at')
                ->label('Opens At')
                ->seconds(false),
            TimePicker::make('closes_at')
                ->label('Closes At')
                ->seconds(false),
            Toggle::make('is_closed')
                ->label('Closed This Day')
                ->default(false),
        ]);
    }

    public static function table(Table $table): Table
    {

        return $table
            ->columns([
                TextColumn::make('day')->sortable()->searchable(),
                TextColumn::make('opens_at'),
                TextColumn::make('closes_at'),
                ToggleColumn::make('is_closed')->label('Closed?'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListOpeningHours::route('/'),
            'create' => Pages\CreateOpeningHour::route('/create'),
            'edit' => Pages\EditOpeningHour::route('/{record}/edit'),
        ];
    }
}
