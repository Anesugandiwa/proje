<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class Stats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Users',  User::count())
                ->description('Registered Users')
                ->color('primary')
                ->descriptionIcon('heroicon-s-user-group'),
        ];
    }
}
