<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MailSubscriberResource\Pages;
use App\Filament\Resources\MailSubscriberResource\RelationManagers;
use App\Models\MailSubscriber;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

class MailSubscriberResource extends Resource
{
    protected static ?string $model = MailSubscriber::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope-open';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('email')->email()->required(),
                TextInput::make('name'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('email'),
                TextColumn::make('name'),
                TextColumn::make('created_at')->since(),
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
            'index' => Pages\ListMailSubscribers::route('/'),
            'create' => Pages\CreateMailSubscriber::route('/create'),
            'edit' => Pages\EditMailSubscriber::route('/{record}/edit'),
        ];
    }
}