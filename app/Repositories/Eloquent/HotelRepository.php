<?php

declare(strict_types=1);

namespace App\Repositories\Eloquent;

use App\Models\Hotel;
use App\Repositories\HotelRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class HotelRepository implements HotelRepositoryInterface
{
    public function paginate(int $perPage = 10): LengthAwarePaginator
    {
        return Hotel::query()->latest()->paginate($perPage);
    }

    public function create(array $data): Hotel
    {
        return Hotel::create($data);
    }

    public function update(Hotel $hotel, array $data): bool
    {
        return $hotel->update($data);
    }

    public function delete(Hotel $hotel): bool
    {
        return $hotel->delete();
    }
}
