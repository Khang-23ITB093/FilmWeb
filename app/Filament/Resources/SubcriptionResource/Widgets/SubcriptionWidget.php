<?php

namespace App\Filament\Resources\SubcriptionResource\Widgets;

use App\Models\User;
use Filament\Widgets\ChartWidget;

class SubcriptionWidget extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'data' => [

                        50,100],
                    'backgroundColor' => [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)'
                    ],
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
