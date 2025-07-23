<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompanyInfoResource\Pages;
use App\Filament\Resources\CompanyInfoResource\RelationManagers;
use App\Models\CompanyInfo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;

class CompanyInfoResource extends Resource
{
    protected static ?string $model = CompanyInfo::class;

    protected static ?string $navigationIcon = 'heroicon-o-identification';

    public static function form(Form $form): Form
    {
        return $form->schema([

            Section::make('Contact')
                ->schema([
                    TextInput::make('email')->email()->label('Office Email'),
                    TextInput::make('phone_1')->label('Phone 1'),
                    TextInput::make('phone_2')->label('Phone 2'),
                    TextInput::make('phone_3')->label('Phone 3'),
                    TextInput::make('phone_4')->label('Phone 4'),
                    TextInput::make('address')->label('Office Address'),
                ]),

            Section::make('Social Media')
                ->schema([
                    TextInput::make('facebook')->label('Facebook URL'),
                    TextInput::make('twitter')->label('Twitter/X URL'),
                    TextInput::make('instagram')->label('Instagram URL'),
                    TextInput::make('linkedin')->label('LinkedIn URL'),
                    TextInput::make('youtube')->label('YouTube URL'),
                    TextInput::make('tiktok')->label('TikTok URL'),
                    TextInput::make('whatsapp')->label('WhatsApp Link or Number'),
                ])
        ]);
    }

    public static function table(Table $table): Table
    {

        return $table
            ->columns([
                TextColumn::make('email'),
                TextColumn::make('phone_1'),
                TextColumn::make('address')->limit(50),
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
            'index' => Pages\ListCompanyInfos::route('/'),
            'create' => Pages\CreateCompanyInfo::route('/create'),
            'edit' => Pages\EditCompanyInfo::route('/{record}/edit'),
        ];
    }
}
