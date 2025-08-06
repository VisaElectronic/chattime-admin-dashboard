<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Messages', 0),
            Stat::make('Group Chats', 0),
            Stat::make('Private Chats', 0),
            Stat::make('Online', 0)
                ->color('success'),
        ];
    }

    protected function getColumns(): int
    {
        return 2;
    }
}
