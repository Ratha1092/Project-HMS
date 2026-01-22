@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">Create Hotel</h1>

    <form method="POST" action="{{ route('hotels.store') }}">
        @csrf

        <div class="mb-4">
            <label>Name</label>
            <input name="name" class="w-full border p-2" required>
        </div>

        <div class="mb-4">
            <label>Address</label>
            <textarea name="address" class="w-full border p-2" required></textarea>
        </div>

        <button class="px-4 py-2 bg-green-600 text-white rounded">
            Save
        </button>
    </form>
</div>
@endsection
