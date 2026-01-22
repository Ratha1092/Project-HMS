<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Hotel;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface HotelRepositoryInterface
{
    public function paginate(int $perPage = 10): LengthAwarePaginator;

    public function create(array $data): Hotel;

    public function update(Hotel $hotel, array $data): bool;

    public function delete(Hotel $hotel): bool;
}
