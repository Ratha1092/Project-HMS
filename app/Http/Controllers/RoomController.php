<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Hotel;
use App\Services\RoomService;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function __construct(
        private readonly RoomService $service
    ) {
        $this->authorizeResource(Room::class, 'room');
        
    }

    public function index()
    {
        return view('rooms.index', ['rooms' => Room::with('hotel')->paginate(10),
        ]);
    }

    public function create()
    {
        return view('rooms.create', ['hotels' => Hotel::all(),]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'hotel_id' => ['required', 'exists:hotels,id'],
            'room_number' => ['required', 'string', 'max:50'],
            'price' => ['required', 'numeric', 'min:0'],
            'capacity' => ['required', 'integer', 'min:1'],
        ]);

        $this->service->create($validated);

        return redirect()
            ->route('rooms.index')
            ->with('success', 'Room created successfully.');
    }

    public function edit(Room $room)
    {
        return view('rooms.edit', [
            'room' => $room,
            'hotels' => Hotel::all(),
        ]);
    }

    public function update(Request $request, Room $room)
    {
        $validated = $request->validate([
            'hotel_id' => ['required', 'exists:hotels,id'],
            'room_number' => ['required', 'string', 'max:50'],
            'price' => ['required', 'numeric', 'min:0'],
            'capacity' => ['required', 'integer', 'min:1'],
        ]);

        $this->service->update($room, $validated);

        return redirect()
            ->route('rooms.index')
            ->with('success', 'Room updated successfully.');
    }

    public function destroy(Room $room)
    {
        $this->service->delete($room);

        return redirect()
            ->route('rooms.index')
            ->with('success', 'Room deleted successfully.');
    }
}
