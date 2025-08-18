<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FounderResource\Pages;
use App\Models\Founder;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class FounderResource extends Resource
{
    protected static ?string $model = Founder::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                    
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->directory('founders'),
                    
                Forms\Components\TextInput::make('contact_number')
                    ->tel()
                    ->maxLength(20),
                    
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->maxLength(255),
                    
                Forms\Components\TextInput::make('order')
                    ->numeric()
                    ->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->circular(),
                    
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('contact_number'),
                    
                Tables\Columns\TextColumn::make('email'),
                    
                Tables\Columns\TextColumn::make('order')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('order', 'asc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFounders::route('/'),
            'create' => Pages\CreateFounder::route('/create'),
            'edit' => Pages\EditFounder::route('/{record}/edit'),
        ];
    }
}