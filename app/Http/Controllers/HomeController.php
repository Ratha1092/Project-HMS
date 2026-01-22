<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Room;
use App\Models\Booking;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): View
    {
        return view('home', [
            'hotelsCount'   => Hotel::count(),
            'roomsCount'    => Room::count(),
            'bookingsCount' => Booking::count(),
            'recentBookings'=> Booking::with(['user', 'room.hotel'])
                                    ->latest()
                                    ->limit(5)
                                    ->get(),
        ]);
    }
}
