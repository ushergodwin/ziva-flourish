<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WhyChoosePointResource\Pages;
use App\Filament\Resources\WhyChoosePointResource\RelationManagers;
use App\Models\WhyChoosePoint;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\{TextInput, Textarea, Toggle};
use Filament\Tables\Columns\{TextColumn, ToggleColumn};

class WhyChoosePointResource extends Resource
{
    protected static ?string $model = WhyChoosePoint::class;

    protected static ?string $navigationIcon = 'heroicon-o-star';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('title')->required(),
            Textarea::make('description')->rows(3)->nullable(),
            Toggle::make('is_active')->label('Visible')->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->searchable()->sortable(),
                TextColumn::make('description')->limit(50),
                ToggleColumn::make('is_active'),
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
            'index' => Pages\ListWhyChoosePoints::route('/'),
            'create' => Pages\CreateWhyChoosePoint::route('/create'),
            'edit' => Pages\EditWhyChoosePoint::route('/{record}/edit'),
        ];
    }
}
