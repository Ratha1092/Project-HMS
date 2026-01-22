<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Booking;

interface BookingRepositoryInterface
{
    public function create(array $data): Booking;

    public function update(Booking $booking, array $data): bool;

    public function hasOverlappingBooking(
        int $roomId,
        string $checkIn,
        string $checkOut
    ): bool;
}
