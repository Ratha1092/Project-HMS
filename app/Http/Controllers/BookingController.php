<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use App\Enum\RoomStatus;
use App\Services\BookingService;
use App\Http\Requests\StoreBookingRequest;
use Illuminate\Http\RedirectResponse;

class BookingController extends Controller
{
    private BookingService $service;

    public function __construct(BookingService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return view('bookings.index', ['bookings' => Booking::with(['user', 'room.hotel'])->paginate(10),]);
    }

    public function create()
    {
        return view('bookings.create', ['rooms' => Room::with('hotel')->where('status', RoomStatus::AVAILABLE)->get(),]);
    }

    public function store(StoreBookingRequest $request): RedirectResponse
    {
        $this->authorize('create', Booking::class);

        $this->service->create([
            'user_id' => $request->user()->id,
            ...$request->validated(),
        ]);

        return redirect()
            ->back()
            ->with('success', 'Booking created successfully.');
    }

    public function destroy(Booking $booking): RedirectResponse
    {
        $this->authorize('delete', $booking);

        $this->service->cancel($booking);

        return redirect()
            ->back()
            ->with('success', 'Booking cancelled successfully.');
    }
}
