<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Widgets\StatsOverviewWidget;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    // Use a custom Blade view for the dashboard
    protected static string $view = 'filament.pages.dashboard';

    public array $stats = [];

    // Define the page title

    // Optional: add widgets if you want dynamic content
    protected static function getWidgets(): array
    {
        return [
            // other widgets...
        ];
    }

    public function mount(): void
    {
        $this->stats = [
            'Total Bookings' => \App\Models\Booking::count(),
            'Total Inquiries' => \App\Models\Inquiry::count(),
            'Total Blog Posts' => \App\Models\BlogPost::count(),
            'Total Comments' => \App\Models\BlogComment::count(),
            'Total Blog Likes' => \App\Models\BlogPostStat::sum('likes'),
            'Total Blog Views' => \App\Models\BlogPostStat::sum('views'),
            'Total Services' => \App\Models\Service::count(),
            'Total Users' => \App\Models\User::count(),
            'Total Partners' => \App\Models\Partner::count(),
            'Total Subscribers' => \App\Models\MailSubscriber::count(),
            'Total Testimonials' => \App\Models\Testimonial::count(),
            'Total Blog Categories' => \App\Models\BlogCategory::count(),
        ];
    }
}
