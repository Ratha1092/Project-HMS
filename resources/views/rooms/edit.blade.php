@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">Edit Room</h1>

    <form method="POST" action="{{ route('rooms.update', $room) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="hotel_id" class="block text-sm font-medium text-gray-700">Hotel</label>
            <select name="hotel_id" id="hotel_id" class="w-full border p-2" required>
                <option value="">Select Hotel</option>
                @foreach($hotels as $hotel)
                    <option value="{{ $hotel->id }}" {{ $hotel->id == $room->hotel_id ? 'selected' : '' }}>
                        {{ $hotel->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="room_number" class="block text-sm font-medium text-gray-700">Room Number</label>
            <input name="room_number" type="text" value="{{ $room->number }}" class="w-full border p-2" required>
        </div>

        <div class="mb-4">
            <label for="price" class="block text-sm font-medium text-gray-700">Price per Night</label>
            <input name="price" type="number" step="0.01" value="{{ $room->price }}" class="w-full border p-2" required>
        </div>

        <div class="mb-4">
            <label for="capacity" class="block text-sm font-medium text-gray-700">Capacity</label>
            <input name="capacity" type="number" value="{{ $room->capacity }}" class="w-full border p-2" required>
        </div>

        <button class="px-4 py-2 bg-blue-600 text-white rounded">
            Update
        </button>
    </form>
</div>
@endsection