<?php

namespace App\Filament\Resources\GroupChatResource\Pages;

use App\Filament\Resources\GroupChatResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGroupChats extends ListRecords
{
    protected static string $resource = GroupChatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
