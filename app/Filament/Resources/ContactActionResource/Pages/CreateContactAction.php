<?php

namespace App\Filament\Resources\ContactActionResource\Pages;

use App\Filament\Resources\ContactActionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateContactAction extends CreateRecord
{
    protected static string $resource = ContactActionResource::class;
}
