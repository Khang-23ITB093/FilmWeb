<?php

namespace App\Filament\Widgets;

use App\Models\Film;
use App\Models\User;
use App\Models\UserSubscriptions;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class UserWiget extends BaseWidget
{
    protected function getStats(): array
    {
        $totalSubscriptionAmount = UserSubscriptions::with('subscription') // Load related subscription
        ->get()
            ->sum(function ($userSubscription) {
                return $userSubscription->subscription->price ?? 0; // Ensure that price exists
            });
        return [
            Stat::make('New User',User::count())
            ->description('New users that have join')
            ->descriptionIcon('heroicon-o-user-group',IconPosition::Before)
            ->chart([1,3,5,10,20,30])
            ->color('success'),
            Stat::make('New Film',Film::count())
            ->description('New films that have been added')
            ->descriptionIcon('heroicon-o-film',IconPosition::Before)
            ->chart([1,33,4,4,20,30])
            ->color('info'),
            Stat::make('Total Subscription Amount', number_format($totalSubscriptionAmount, 2))
                ->description('Total amount of money spent on subscriptions')
                ->descriptionIcon('heroicon-o-credit-card', IconPosition::Before)
                ->color('success'),

        ];
    }
}
