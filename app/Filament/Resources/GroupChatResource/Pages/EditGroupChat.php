<?php

namespace App\Filament\Resources\GroupChatResource\Pages;

use App\Filament\Resources\GroupChatResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGroupChat extends EditRecord
{
    protected static string $resource = GroupChatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
