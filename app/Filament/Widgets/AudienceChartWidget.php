<?php

namespace App\Filament\Widgets;

use App\Models\VisitorLog;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class AudienceChartWidget extends ChartWidget
{
    protected ?string $heading = 'Grafik Kunjungan (Klik)';

    protected int | string | array $columnSpan = 'full';

    protected ?string $maxHeight = '300px';

    public ?string $filter = 'month';

    protected function getFilters(): ?array
    {
        return [
            'today' => 'Harian',
            'month' => 'Bulanan',
            'year' => 'Tahunan',
        ];
    }

    protected function getData(): array
    {
        $activeFilter = $this->filter;
        $query = VisitorLog::query();

        $data = [];
        $labels = [];

        if ($activeFilter === 'today') {
            // Per jam selama 24 jam terakhir
            $visitors = $query->where('created_at', '>=', now()->subDay())
                ->select(DB::raw('HOUR(created_at) as hour'), DB::raw('count(*) as count'))
                ->groupBy('hour')
                ->orderBy('hour')
                ->get()
                ->pluck('count', 'hour')
                ->toArray();

            for ($i = 0; $i < 24; $i++) {
                $labels[] = str_pad($i, 2, '0', STR_PAD_LEFT) . ':00';
                $data[] = $visitors[$i] ?? 0;
            }
        } elseif ($activeFilter === 'year') {
            // Per bulan untuk tahun berjalan
            $visitors = $query->whereYear('created_at', now()->year)
                ->select(DB::raw('MONTH(created_at) as month'), DB::raw('count(*) as count'))
                ->groupBy('month')
                ->orderBy('month')
                ->get()
                ->pluck('count', 'month')
                ->toArray();

            for ($i = 1; $i <= 12; $i++) {
                $labels[] = Carbon::create()->month($i)->translatedFormat('M');
                $data[] = $visitors[$i] ?? 0;
            }
        } else {
            // Bulanan (Per hari selama 30 hari terakhir)
            $visitors = $query->where('created_at', '>=', now()->subDays(30))
                ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
                ->groupBy('date')
                ->orderBy('date')
                ->get()
                ->pluck('count', 'date')
                ->toArray();

            for ($i = 29; $i >= 0; $i--) {
                $date = now()->subDays($i)->format('Y-m-d');
                $labels[] = now()->subDays($i)->format('d M');
                $data[] = $visitors[$date] ?? 0;
            }
        }

        return [
            'datasets' => [
                [
                    'label' => 'Klik',
                    'data' => $data,
                    'fill' => 'start',
                    'backgroundColor' => 'rgba(251, 113, 133, 0.2)',
                    'borderColor' => 'rgb(251, 113, 133)',
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
