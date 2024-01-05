<?php

namespace App\Filament\Widgets;

use App\Models\Event;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class GuestStatusChart extends ChartWidget
{
    protected static ?string $heading = 'Responses Chart';

    protected function getData(): array
    {
        $guestData = DB::table('guests')
            ->join('guest_statuses', 'guests.guest_status_id', '=', 'guest_statuses.id')
            ->selectRaw('guest_statuses.name as label, count(*) as value')
            ->groupBy('guests.guest_status_id')
            ->get();

        $colors = ['#64748b', '#10b981', '#ef4444', '#f59e0b'];

        return [
            'datasets' => [
                [
                    'label' => 'Blog posts created',
                    'data' => $guestData->map(fn($value) => $value->value),
                    'backgroundColor' => $colors,
                    'borderColor' => '#9BD0F5',
                ],
            ],
            'labels' => $guestData->map(fn($value) => $value->label),
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
