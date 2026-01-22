<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Room;

interface RoomRepositoryInterface
{
    public function create(array $data): Room;

    public function update(Room $room, array $data): bool;

    public function delete(Room $room): bool;
}

