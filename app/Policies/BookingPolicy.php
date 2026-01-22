<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Booking;
use App\Models\User;

class BookingPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Booking $booking): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return $user->isAdmin() || $user->isManager();
    }

    public function update(User $user, Booking $booking): bool
    {
        return $user->isAdmin() || $user->isManager();
    }

    public function delete(User $user, Booking $booking): bool
    {
        return $user->isAdmin() || $user->isManager();
    }
}
