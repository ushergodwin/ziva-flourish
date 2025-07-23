<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogPostResource\Pages;
use App\Filament\Resources\BlogPostResource\RelationManagers;
use App\Models\BlogPost;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Columns\DateTimeColumn;
use Illuminate\Support\Str;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;

class BlogPostResource extends Resource
{
    protected static ?string $model = BlogPost::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {

        return $form->schema([
            TextInput::make('title')
                ->required()
                ->reactive()
                ->afterStateUpdated(function (callable $set, $state) {
                    $set('slug', Str::slug($state));
                })
                ->columnSpanFull(),

            TextInput::make('slug')
                ->required()
                ->disabled()
                ->dehydrated(), // ensures it's still saved to the DB
            // ->hiddenOnForms(), // uncomment this if you want to hide the field completely
            FileUpload::make('thumbnail')
                ->label('Featured Image')
                ->image()
                ->directory('thumbnails')
                ->imagePreviewHeight('150')
                ->maxSize(2048)
                ->columnSpanFull(),
            TextInput::make('author_name')
                ->required(),
            Select::make('blog_category_id')
                ->label('Blog Category')
                ->relationship('blogCategory', 'name')
                ->required(),

            RichEditor::make('content')
                ->required()
                ->columnSpanFull(),

            DateTimePicker::make('published_at')
                ->default(now())
                ->label('Published At'),

            Toggle::make('is_published')
                ->default(false),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->limit(30),
                TextColumn::make('author_name'),
                ToggleColumn::make('is_published'),
                TextColumn::make('published_at')->label('Published On')->dateTime()
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
            'index' => Pages\ListBlogPosts::route('/'),
            'create' => Pages\CreateBlogPost::route('/create'),
            'edit' => Pages\EditBlogPost::route('/{record}/edit'),
        ];
    }
}
