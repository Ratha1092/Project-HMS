@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 px-4">

    <div class="flex justify-between mb-4">
        <h1 class="text-xl font-bold">Rooms</h1>
        <a href="{{ route('rooms.create') }}"
           class="bg-emerald-600 text-white px-4 py-2 rounded">
            + Add Room
        </a>
    </div>

    <table class="w-full bg-white rounded shadow">
        <thead>
            <tr class="text-left border-b">
                <th class="p-3">Hotel</th>
                <th class="p-3">Room Number</th>
                <th class="p-3">Price</th>
                <th class="p-3">Capacity</th>
                <th class="p-3">Status</th>
                <th class="p-3">Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($rooms as $room)
            <tr class="border-b">
                <td class="p-3">{{ $room->hotel->name }}</td>
                <td class="p-3">{{ $room->number }}</td>
                <td class="p-3">${{ $room->price }}</td>
                <td class="p-3">{{ $room->capacity }}</td>
                <td class="p-3">
                    <span class="px-2 py-1 text-xs rounded {{ $room->status->color() }}">
                        {{ $room->status->label() }}
                    </span>
                </td>
                <td class="p-3">
                    <a href="{{ route('rooms.edit', $room) }}" class="text-blue-600">Edit</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
@endsection