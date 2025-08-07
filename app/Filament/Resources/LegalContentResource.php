<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LegalContentResource\Pages;
use App\Filament\Resources\LegalContentResource\RelationManagers;
use App\Models\LegalContent;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LegalContentResource extends Resource
{
    protected static ?string $model = LegalContent::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Legal Content';
    protected static ?string $modelLabel = 'Legal Content';
    protected static ?string $navigationGroup = 'Settings';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Terms & Conditions')
                    ->schema([
                        Forms\Components\RichEditor::make('terms_condition')
                            ->required()
                            ->columnSpanFull(),
                    ]),
                Forms\Components\Section::make('Privacy Policy')
                    ->schema([
                        Forms\Components\RichEditor::make('privacy_policy')
                            ->required()
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('last_updated_at')
                    ->label('Last Updated')
                    ->dateTime(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([])
            ->modifyQueryUsing(fn ($query) => $query->where('id', 1));
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLegalContents::route('/'),
            'edit' => Pages\EditLegalContent::route('/{record}/edit'),
        ];
    }
}
