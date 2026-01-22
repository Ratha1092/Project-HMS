@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 px-4">

    <div class="flex justify-between mb-4">
        <h1 class="text-xl font-bold">Hotels</h1>
        <a href="{{ route('hotels.create') }}"
           class="bg-indigo-600 text-white px-4 py-2 rounded">
            + Create Hotel
        </a>
    </div>

    <table class="w-full bg-white rounded shadow">
        <thead>
            <tr class="text-left border-b">
                <th class="p-3">Name</th>
                <th class="p-3">Address</th>
                <th class="p-3">Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($hotels as $hotel)
            <tr class="border-b">
                <td class="p-3">{{ $hotel->name }}</td>
                <td class="p-3">{{ $hotel->address }}</td>
                <td class="p-3">
                    <a href="{{ route('hotels.edit', $hotel) }}" class="text-blue-600">Edit</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
@endsection
