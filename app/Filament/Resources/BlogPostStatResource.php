<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogPostStatResource\Pages;
use App\Filament\Resources\BlogPostStatResource\RelationManagers;
use App\Models\BlogPostStat;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Select;

class BlogPostStatResource extends Resource
{
    protected static ?string $model = BlogPostStat::class;

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('blog_post_id')
                    ->relationship('blogPost', 'title')
                    ->required()
                    ->disabledOn('edit'),

                TextInput::make('views')->numeric()->required(),
                TextInput::make('likes')->numeric()->required(),
                TextInput::make('comments')->numeric()->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('blogPost.title')->label('Post')->limit(30),
                TextColumn::make('views'),
                TextColumn::make('likes'),
                TextColumn::make('comments'),
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
            'index' => Pages\ListBlogPostStats::route('/'),
            'create' => Pages\CreateBlogPostStat::route('/create'),
            'edit' => Pages\EditBlogPostStat::route('/{record}/edit'),
        ];
    }
}
