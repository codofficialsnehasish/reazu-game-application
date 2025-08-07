<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\Game;
use App\Models\Faq;
use App\Models\PaymentMethod;
use App\Models\AboutUs;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?string $pollingInterval = '30s'; // Auto-refresh every 30 seconds (optional)
    
    protected static ?int $sort = 1; // Widget position in dashboard

    protected function getStats(): array
    {
        return [
            // Users Stat
            // Stat::make('Total Users', User::count())
            //     ->icon('heroicon-o-users')
            //     ->description('Registered users')
            //     ->descriptionIcon('heroicon-m-arrow-trending-up')
            //     ->color('success')
            //     ->chart([7, 2, 10, 3, 15, 4, 17]), // Sample growth data

            // // Games Stat
            // Stat::make('Active Games', Game::where('is_active', true)->count())
            //     ->icon('heroicon-o-gamepad')
            //     ->description('Available games')
            //     ->descriptionIcon('heroicon-m-check-badge')
            //     ->color('primary'),
            //     // ->url(route('filament.admin.resources.games.index')), // Link to games list

            // // FAQs Stat
            // Stat::make('Published FAQs', Faq::where('is_active', true)->count())
            //     ->icon('heroicon-o-question-mark-circle')
            //     ->description('Help articles')
            //     ->color('info'),
            //     // ->url(route('filament.admin.resources.faqs.index')), // Link to FAQs

            // // Payment Methods Stat
            // Stat::make('Payment Options', PaymentMethod::where('is_active', true)->count())
            //     ->icon('heroicon-o-credit-card')
            //     ->description('Available methods')
            //     ->color('warning'),
                
            // // Legal Pages Stat (shows last update)
            // Stat::make('Legal Updated', AboutUs::first()->last_updated_at->diffForHumans())
            //     ->icon('heroicon-o-document-text')
            //     ->description('Last modified')
            //     ->color('gray'),
        ];
    }

    // Widget size (full width or columns)
    protected function getColumns(): int
    {
        return 2; // Display as 2 columns
    }

    // Optional: Card styling
    protected function getCardStyles(): string
    {
        return 'rounded-lg shadow bg-white dark:bg-gray-800';
    }
}