<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Eloquent\HotelRepository;
use App\Repositories\Eloquent\RoomRepository;
use App\Repositories\Eloquent\BookingRepository;
use App\Repositories\HotelRepositoryInterface;
use App\Repositories\RoomRepositoryInterface;
use App\Repositories\BookingRepositoryInterface;
use App\Models\Hotel;
use App\Models\Room;
use App\Models\Booking;
use App\Observers\AuditableObserver;
use App\Repositories\AuditLogRepositoryInterface;
use App\Repositories\Eloquent\AuditLogRepository;


class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(HotelRepositoryInterface::class, HotelRepository::class);
        $this->app->bind(RoomRepositoryInterface::class, RoomRepository::class);
        $this->app->bind(BookingRepositoryInterface::class, BookingRepository::class);
        $this->app->bind(AuditLogRepositoryInterface::class,AuditLogRepository::class);
    }

    public function boot(): void
    {
        Hotel::observe(AuditableObserver::class);
        Room::observe(AuditableObserver::class);
        Booking::observe(AuditableObserver::class);

        // Rate limiting (already present)
        RateLimiter::for('auth', function (Request $request) {
            return Limit::perMinute(5)->by($request->ip());
        });
    }
}
