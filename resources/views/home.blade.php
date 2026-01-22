@extends('layouts.app')

@section('content')
<div class="bg-gray-100 min-h-screen">
    <div class="max-w-7xl mx-auto px-6 py-8">

        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-2xl font-semibold text-gray-800">
                    Hi, {{ auth()->user()->name }} 👋
                </h1>
                <p class="text-sm text-gray-500">
                    Here’s what’s happening in your hotels today
                </p>
            </div>

            <div class="text-sm text-gray-500">
                {{ now()->format('l, d M Y') }}
            </div>
        </div>

        <!-- Stats -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">

            <div class="bg-white rounded-xl shadow p-5">
                <p class="text-sm text-gray-500">Hotels</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">
                    {{ $hotelsCount }}
                </p>
            </div>

            <div class="bg-white rounded-xl shadow p-5">
                <p class="text-sm text-gray-500">Rooms</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">
                    {{ $roomsCount }}
                </p>
            </div>

            <div class="bg-white rounded-xl shadow p-5">
                <p class="text-sm text-gray-500">Bookings</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">
                    {{ $bookingsCount }}
                </p>
            </div>

            <div class="bg-white rounded-xl shadow p-5">
                <p class="text-sm text-gray-500">Occupancy</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">
                    {{ $roomsCount > 0 ? round(($bookingsCount / $roomsCount) * 100) : 0 }}%
                </p>
            </div>

        </div>

        <!-- Main Content -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- Chart Placeholder -->
            <div class="bg-white rounded-xl shadow p-6 lg:col-span-2">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="font-semibold text-gray-800">
                        Booking Overview
                    </h2>
                    <span class="text-sm text-gray-400">Last 6 months</span>
                </div>

                <div class="h-64 flex items-center justify-center text-gray-400 border border-dashed rounded-lg">
                    📊 Chart placeholder (ApexCharts / Chart.js)
                </div>
            </div>

            <!-- Recent Bookings -->
            <div class="bg-white rounded-xl shadow p-6">
                <h2 class="font-semibold text-gray-800 mb-4">
                    Recent Bookings
                </h2>

                @forelse($recentBookings as $booking)
                    <div class="flex justify-between items-center py-3 border-b last:border-0">
                        <div>
                            <p class="text-sm font-medium text-gray-700">
                                {{ $booking->user->name }}
                            </p>
                            <p class="text-xs text-gray-400">
                                Room {{ $booking->room->number }} • {{ $booking->room->hotel->name }}
                            </p>
                        </div>
                        <span class="text-xs text-gray-500">
                            {{ $booking->created_at->diffForHumans() }}
                        </span>
                    </div>
                @empty
                    <p class="text-sm text-gray-500">
                        No recent bookings
                    </p>
                @endforelse
            </div>

        </div>

        <!-- Quick Actions -->
        <div class="mt-10 flex flex-wrap gap-4">

            @can('create', App\Models\Hotel::class)
                <a href="{{ route('hotels.create') }}"
                   class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-3 rounded-lg shadow text-sm">
                    ➕ Create Hotel
                </a>
            @endcan

            @can('create', App\Models\Room::class)
                <a href="{{ route('rooms.create') }}"
                   class="bg-emerald-600 hover:bg-emerald-700 text-white px-5 py-3 rounded-lg shadow text-sm">
                    ➕ Add Room
                </a>
            @endcan

            @can('create', App\Models\Booking::class)
                <a href="{{ route('bookings.create') }}"
                   class="bg-purple-600 hover:bg-purple-700 text-white px-5 py-3 rounded-lg shadow text-sm">
                    📅 Book Room
                </a>
            @endcan

            <a href="{{ route('bookings.index') }}"
               class="bg-gray-800 hover:bg-gray-900 text-white px-5 py-3 rounded-lg shadow text-sm">
                📋 View Bookings
            </a>

        </div>

    </div>
</div>
@endsection
