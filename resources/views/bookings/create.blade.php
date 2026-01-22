@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">Create Booking</h1>

    <form method="POST" action="{{ route('bookings.store') }}">
        @csrf

        <div class="mb-4">
            <label for="room_id" class="block text-sm font-medium text-gray-700">Room</label>
            <select name="room_id" id="room_id" class="w-full border p-2" required>
                <option value="">Select Room</option>
                @foreach($rooms as $room)
                    <option value="{{ $room->id }}">
                        {{ $room->hotel->name }} - Room {{ $room->number }} (${{ $room->price }}/night)
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="check_in" class="block text-sm font-medium text-gray-700">Check-in Date</label>
            <input name="check_in" type="date" class="w-full border p-2" required>
        </div>

        <div class="mb-4">
            <label for="check_out" class="block text-sm font-medium text-gray-700">Check-out Date</label>
            <input name="check_out" type="date" class="w-full border p-2" required>
        </div>

        <button class="px-4 py-2 bg-blue-600 text-white rounded">
            Book Room
        </button>
    </form>
</div>
@endsection