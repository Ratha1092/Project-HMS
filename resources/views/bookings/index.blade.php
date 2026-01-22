@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 px-4">

    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-xl font-bold text-gray-800">Bookings</h1>

        <a href="{{ route('bookings.create') }}"
           class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-semibold rounded-lg shadow hover:bg-blue-700 transition">
            + Book Now
        </a>
    </div>

    <!-- Table -->
    <table class="w-full bg-white rounded-lg shadow">
        <thead>
            <tr class="text-left border-b bg-gray-50">
                <th class="p-3">User</th>
                <th class="p-3">Hotel</th>
                <th class="p-3">Room</th>
                <th class="p-3">Check-in</th>
                <th class="p-3">Check-out</th>
                <th class="p-3">Status</th>
                <th class="p-3">Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($bookings as $booking)
            <tr class="border-b hover:bg-gray-50">
                <td class="p-3">{{ $booking->user->name }}</td>
                <td class="p-3">{{ $booking->room->hotel->name }}</td>
                <td class="p-3">{{ $booking->room->number }}</td>
                <td class="p-3">{{ $booking->check_in->format('M d, Y') }}</td>
                <td class="p-3">{{ $booking->check_out->format('M d, Y') }}</td>
                <td class="p-3">
                    <span class="px-2 py-1 text-xs rounded {{ $booking->status->color() }}">
                        {{ $booking->status->label() }}
                    </span>
                </td>
                <td class="p-3">
                    @can('delete', $booking)
                        <form method="POST" action="{{ route('bookings.destroy', $booking) }}" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="text-red-600 hover:underline"
                                    onclick="return confirm('Are you sure?')">
                                Cancel
                            </button>
                        </form>
                    @endcan
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
@endsection
