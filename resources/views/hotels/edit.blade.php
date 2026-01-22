@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">Edit Hotel</h1>

    <form method="POST" action="{{ route('hotels.update', $hotel) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label>Name</label>
            <input name="name"
                   value="{{ $hotel->name }}"
                   class="w-full border p-2" required>
        </div>

        <div class="mb-4">
            <label>Address</label>
            <textarea name="address"
                      class="w-full border p-2" required>{{ $hotel->address }}</textarea>
        </div>

        <button class="px-4 py-2 bg-blue-600 text-white rounded">
            Update
        </button>
    </form>
</div>
@endsection
