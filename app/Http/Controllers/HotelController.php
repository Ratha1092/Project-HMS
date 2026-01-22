<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Services\HotelService;
use App\Http\Requests\StoreHotelRequest;
use App\Http\Requests\UpdateHotelRequest;

class HotelController extends Controller
{
    public function __construct(
        private readonly HotelService $service
    ) {
        // Enforce HotelPolicy on all resource methods
        $this->authorizeResource(Hotel::class, 'hotel');
    }

    public function index()
    {
        return view('hotels.index', [
            'hotels' => $this->service->paginate(),
        ]);
    }

    public function create()
    {
        return view('hotels.create');
    }

    public function store(StoreHotelRequest $request)
    {
        $this->service->create($request->validated());

        return redirect()
            ->route('hotels.index')
            ->with('success', 'Hotel created successfully.');
    }

    public function edit(Hotel $hotel)
    {
        return view('hotels.edit', compact('hotel'));
    }

    public function update(UpdateHotelRequest $request, Hotel $hotel)
    {
        $this->service->update($hotel, $request->validated());

        return redirect()
            ->route('hotels.index')
            ->with('success', 'Hotel updated successfully.');
    }

    public function destroy(Hotel $hotel)
    {
        $this->service->delete($hotel);

        return redirect()
            ->route('hotels.index')
            ->with('success', 'Hotel deleted successfully.');
    }
}
