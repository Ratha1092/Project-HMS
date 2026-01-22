<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Hotel;
use App\Repositories\HotelRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class HotelService
{
    public function __construct(
        private readonly HotelRepositoryInterface $hotels
    ) {}

    public function paginate(): LengthAwarePaginator
    {
        return $this->hotels->paginate();
    }

    public function create(array $data): Hotel
    {
        return $this->hotels->create($data);
    }

    public function update(Hotel $hotel, array $data): bool
    {
        return $this->hotels->update($hotel, $data);
    }

    public function delete(Hotel $hotel): bool
    {
        return $this->hotels->delete($hotel);
    }
}
