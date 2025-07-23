<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OurImpactResource\Pages;
use App\Filament\Resources\OurImpactResource\RelationManagers;
use App\Models\OurImpact;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Pages\EditRecord;

class OurImpactResource extends Resource
{
    protected static ?string $model = OurImpact::class;

    protected static ?string $navigationIcon = 'heroicon-o-globe-alt';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('title')->required(),

            FileUpload::make('background_image')
                ->image()
                ->directory('impact')
                ->label('Background Image'),

            TextInput::make('awards')->numeric()->label('Awards Won')->required(),
            TextInput::make('happy_clients')->numeric()->label('Happy Clients')->required(),
            TextInput::make('therapy_sessions')->numeric()->label('Therapy Sessions')->required(),
            TextInput::make('trainers')->numeric()->label('Certified Trainers')->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->searchable(),
                Tables\Columns\TextColumn::make('awards')->label('Awards Won'),
                Tables\Columns\TextColumn::make('happy_clients')->label('Happy Clients'),
                Tables\Columns\TextColumn::make('therapy_sessions')->label('Therapy Sessions'),
                Tables\Columns\TextColumn::make('trainers')->label('Certified Trainers'),
                Tables\Columns\TextColumn::make('updated_at')->since()->label('Last Updated'),
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
            'index' => Pages\ListOurImpacts::route('/'),
            'create' => Pages\CreateOurImpact::route('/create'),
            'edit' => Pages\EditOurImpact::route('/{record}/edit'),
        ];
    }
}
