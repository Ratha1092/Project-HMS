@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 px-4">

    <div class="flex justify-between mb-4">
        <h1 class="text-xl font-bold">Bookings</h1>
    </div>

    <table class="w-full bg-white rounded shadow">
        <thead>
            <tr class="text-left border-b">
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
            <tr class="border-b">
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
                            <button type="submit" class="text-red-600" onclick="return confirm('Are you sure?')">Cancel</button>
                        </form>
                    @endcan
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
@endsection