<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Booking;
use App\Repositories\BookingRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use RuntimeException;

class BookingService
{
    public function __construct(
        private readonly BookingRepositoryInterface $bookings
    ) {}

    /**
     * Create a booking with proper date validation and overlap checking
     */
    public function create(array $data): Booking
    {
        return DB::transaction(function () use ($data) {

            // Normalize & validate dates
            $checkIn  = Carbon::parse($data['check_in'])->startOfDay();
            $checkOut = Carbon::parse($data['check_out'])->startOfDay();

            if ($checkOut->lessThanOrEqualTo($checkIn)) {
                throw new RuntimeException(
                    'Check-out date must be after check-in date.'
                );
            }

            // Check room availability
            $hasConflict = $this->bookings->hasOverlappingBooking(
                (int) $data['room_id'],
                $checkIn->toDateTimeString(),
                $checkOut->toDateTimeString()
            );

            if ($hasConflict) {
                throw new RuntimeException(
                    'Room is not available for the selected dates.'
                );
            }

            // Create booking
            return $this->bookings->create([
                'user_id'   => auth()->id(),
                'room_id'   => (int) $data['room_id'],
                'check_in'  => $checkIn,
                'check_out' => $checkOut,
                'status'    => 'confirmed',
            ]);
        });
    }

    /**
     * Cancel an existing booking
     */
    public function cancel(Booking $booking): bool
    {
        return $this->bookings->update($booking, [
            'status' => 'cancelled',
        ]);
    }
}
