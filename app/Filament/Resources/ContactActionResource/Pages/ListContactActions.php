<?php

namespace App\Filament\Resources\ContactActionResource\Pages;

use App\Filament\Resources\ContactActionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListContactActions extends ListRecords
{
    protected static string $resource = ContactActionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
