<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageSettingResource\Pages;
use App\Filament\Resources\PageSettingResource\RelationManagers;
use App\Models\PageSetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class PageSettingResource extends Resource
{
    protected static ?string $model = PageSetting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('page_id')
                ->required()
                ->unique(ignoreRecord: true)
                ->label('Page Identifier')
                ->helperText('Use slug format like "about-us", "blog", "contact-us"')
                ->disabled(),

            TextInput::make('title')->label('Page Title'),

            FileUpload::make('background_image')
                ->image()
                ->directory('page-backgrounds')
                ->label('Background Image')
                ->nullable(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('page_id'),
                TextColumn::make('title'),
                ImageColumn::make('background_image'),
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
            'index' => Pages\ListPageSettings::route('/'),
            'create' => Pages\CreatePageSetting::route('/create'),
            'edit' => Pages\EditPageSetting::route('/{record}/edit'),
        ];
    }
}
