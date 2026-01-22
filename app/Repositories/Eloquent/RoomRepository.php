<?php

declare(strict_types=1);

namespace App\Repositories\Eloquent;

use App\Models\Room;
use App\Repositories\RoomRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class RoomRepository implements RoomRepositoryInterface
{
    public function paginate(int $perPage = 10): LengthAwarePaginator
    {
        return Room::query()
            ->with('hotel')
            ->orderBy('hotel_id')
            ->orderBy('room_number')
            ->paginate($perPage);
    }

    public function create(array $data): Room
    {
        return Room::create($data);
    }

    public function update(Room $room, array $data): bool
    {
        return $room->update($data);
    }

    public function delete(Room $room): bool
    {
        return $room->delete();
    }
}

