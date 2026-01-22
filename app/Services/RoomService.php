<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Room;
use App\Repositories\RoomRepositoryInterface;

class RoomService
{
    public function __construct(
        private readonly RoomRepositoryInterface $rooms
    ) {}

    public function create(array $data): Room
    {
        return $this->rooms->create($data);
    }

    public function update(Room $room, array $data): bool
    {
        return $this->rooms->update($room, $data);
    }

    public function delete(Room $room): bool
    {
        return $this->rooms->delete($room);
    }
}
