<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CoreValueResource\Pages;
use App\Filament\Resources\CoreValueResource\RelationManagers;
use App\Models\CoreValue;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\{TextInput, FileUpload, Textarea, Toggle};
use Filament\Tables\Columns\{TextColumn, ImageColumn, ToggleColumn};

class CoreValueResource extends Resource
{
    protected static ?string $model = CoreValue::class;

    protected static ?string $navigationIcon = 'heroicon-o-heart';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('title')
                ->required()
                ->maxLength(100),

            FileUpload::make('icon')
                ->label('Icon/Image')
                ->image()
                ->directory('core-values')
                ->imagePreviewHeight('100')
                ->maxSize(1024)
                ->nullable(),

            Textarea::make('description')
                ->rows(3)
                ->nullable(),

            Toggle::make('is_active')
                ->label('Visible on site')
                ->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('icon')->label('Icon')->circular(),
                TextColumn::make('title')->searchable()->sortable(),
                TextColumn::make('description')->limit(50),
                ToggleColumn::make('is_active'),
                TextColumn::make('updated_at')->label('Updated')->since(),
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
            'index' => Pages\ListCoreValues::route('/'),
            'create' => Pages\CreateCoreValue::route('/create'),
            'edit' => Pages\EditCoreValue::route('/{record}/edit'),
        ];
    }
}
