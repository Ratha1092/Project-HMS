<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\Hotel;
use App\Models\Room;
use App\Models\Booking;
use App\Policies\HotelPolicy;
use App\Policies\RoomPolicy;
use App\Policies\BookingPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\AuditLog;
use App\Policies\AuditLogPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Hotel::class   => HotelPolicy::class,
        Room::class    => RoomPolicy::class,
        Booking::class => BookingPolicy::class,
        AuditLog::class => AuditLogPolicy::class,
        

    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // Policies are registered automatically
    }
}
