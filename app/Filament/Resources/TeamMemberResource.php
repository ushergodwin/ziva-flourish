<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeamMemberResource\Pages;
use App\Filament\Resources\TeamMemberResource\RelationManagers;
use App\Models\TeamMember;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\{TextInput, FileUpload, Textarea, Toggle};
use Filament\Tables\Columns\{ImageColumn, TextColumn, ToggleColumn};

class TeamMemberResource extends Resource
{
    protected static ?string $model = TeamMember::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form->schema([
            FileUpload::make('photo')
                ->label('Profile Photo')
                ->image()
                ->directory('team')
                ->imagePreviewHeight('120')
                ->required(),

            TextInput::make('name')->required(),
            TextInput::make('role')->label('Position')->required(),
            Textarea::make('bio')->rows(3)->nullable(),

            TextInput::make('linkedin')->url()->nullable(),
            TextInput::make('twitter')->url()->nullable(),
            TextInput::make('facebook')->url()->nullable(),
            TextInput::make('email')->email()->nullable(),

            Toggle::make('is_active')->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('photo')->circular(),
                TextColumn::make('name')->searchable(),
                TextColumn::make('role')->label('Position'),
                ToggleColumn::make('is_active')->label('Visible'),
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
            'index' => Pages\ListTeamMembers::route('/'),
            'create' => Pages\CreateTeamMember::route('/create'),
            'edit' => Pages\EditTeamMember::route('/{record}/edit'),
        ];
    }
}
