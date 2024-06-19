<?php

namespace App\Filament\Resources\OrderResource\Widgets;

use App\Models\Order;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Number;

class OrderStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('New orders',Order::query()->where('status','new')->count()),
            Stat::make('Order processing',Order::query()->where('status','processing')->count()),
            Stat::make('Shipped orders',Order::query()->where('status','shipped')->count()),
            Stat::make('Avarage Price',Number::currency(Order::query()->avg('grand_total')),'UZS'),
        ];
    }
}
