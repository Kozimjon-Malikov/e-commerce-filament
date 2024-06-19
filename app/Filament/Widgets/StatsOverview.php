<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Users',User::query()->count())->icon('heroicon-o-users'),
            Stat::make('New orders',Order::query()->where('status','new')->count()),
        ];
    }
}
