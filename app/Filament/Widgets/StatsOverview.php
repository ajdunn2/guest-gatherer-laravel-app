<?php

namespace App\Filament\Widgets;

use App\Models\Guest;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Guest Invites', Guest::all()->count()),
            Stat::make('Confirmed Invites', Guest::where('guest_status_id', 2)->count()),
            Stat::make('Rejected Invites', Guest::where('guest_status_id', 3)->count()),
            Stat::make('Pending Invites', Guest::where(function ($q) {$q->where('guest_status_id', 1)->orWhere('guest_status_id', 4);})->count()),
        ];
    }
}
