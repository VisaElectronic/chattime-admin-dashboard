<?php

namespace App\Filament\Widgets;

use App\Services\GroupChatService;
use App\Services\MessageService;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $countMessages = app(MessageService::class)->count();
        $countGroupChat = app(GroupChatService::class)->count();
        $countPrivateChat = app(GroupChatService::class)->count(true);
        return [
            Stat::make('Messages', $countMessages ?? 0),
            Stat::make('Group Chats', $countGroupChat ?? 0),
            Stat::make('Private Chats', $countPrivateChat ?? 0),
            Stat::make('Online', 0)
                ->color('success'),
        ];
    }

    protected function getColumns(): int
    {
        return 2;
    }
}
