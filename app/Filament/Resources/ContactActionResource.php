<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactActionResource\Pages;
use App\Models\ContactAction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ContactActionResource extends Resource
{
    protected static ?string $model = ContactAction::class;
    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationLabel = 'Contact Actions';
    protected static ?string $modelLabel = 'Contact Action';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('icon_image')
                    ->label('Icon Image')
                    ->image()
                    ->directory('contact-actions/icons')
                    ->required()
                    ->imageEditor()
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('1:1')
                    ->imageResizeTargetWidth('100')
                    ->imageResizeTargetHeight('100')
                    ->columnSpanFull(),
                    
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                    
                Forms\Components\Select::make('type')
                    ->options([
                        'whatsapp' => 'WhatsApp',
                        'email' => 'Email',
                        'phone' => 'Phone Call',
                        'tutorial' => 'Tutorial',
                        'article' => 'Article',
                    ])
                    ->required(),
                    
                Forms\Components\TextInput::make('link')
                    ->required()
                    ->maxLength(255)
                    ->hint('URL, tel: link, mailto: link, or internal route'),
                    
                Forms\Components\TextInput::make('order')
                    ->numeric()
                    ->default(0),
                    
                Forms\Components\Toggle::make('is_active')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('icon_image')
                    ->label('Icon')
                    ->circular()
                    ->size(50),
                    
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'whatsapp' => 'success',
                        'email' => 'primary',
                        'phone' => 'info',
                        default => 'gray',
                    }),
                    
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                    
                Tables\Columns\TextColumn::make('order')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->options([
                        'whatsapp' => 'WhatsApp',
                        'email' => 'Email',
                        'phone' => 'Phone',
                        'tutorial' => 'Tutorial',
                        'article' => 'Article',
                    ]),
                    
                Tables\Filters\TernaryFilter::make('is_active'),
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
            'index' => Pages\ListContactActions::route('/'),
            'create' => Pages\CreateContactAction::route('/create'),
            'edit' => Pages\EditContactAction::route('/{record}/edit'),
        ];
    }
}