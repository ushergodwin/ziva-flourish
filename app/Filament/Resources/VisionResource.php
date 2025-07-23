<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VisionResource\Pages;
use App\Filament\Resources\VisionResource\RelationManagers;
use App\Models\Vision;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\{RichEditor, FileUpload};
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

class VisionResource extends Resource
{
    protected static ?string $model = Vision::class;

    protected static ?string $navigationIcon = 'heroicon-o-eye';

    public static function form(Form $form): Form
    {
        return $form->schema([
            RichEditor::make('statement')
                ->label('Vision Statement')
                ->required()
                ->columnSpanFull(),

            FileUpload::make('image')
                ->label('Vision Image')
                ->image()
                ->directory('vision')
                ->imagePreviewHeight('200')
                ->maxSize(2048),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('statement')->limit(50),
                ImageColumn::make('image')->circular(),
                TextColumn::make('updated_at')->label('Last Updated')->since(),
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
            'index' => Pages\ListVisions::route('/'),
            'create' => Pages\CreateVision::route('/create'),
            'edit' => Pages\EditVision::route('/{record}/edit'),
        ];
    }


    public static function canDeleteAny(): bool
    {
        return false;
    }
}
