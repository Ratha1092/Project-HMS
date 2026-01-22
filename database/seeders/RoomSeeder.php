<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Hotel;
use App\Models\Room;
use App\Enum\RoomStatus;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    public function run(): void
    {
        $hotels = Hotel::all();

        foreach ($hotels as $hotel) {
            foreach (range(101, 105) as $number) {
                Room::updateOrCreate(
                    [
                        'hotel_id' => $hotel->id,
                        'room_number' => (string) $number,
                    ],
                    [
                        'price' => 120.00,
                        'capacity' => 2,
                        'status' => RoomStatus::AVAILABLE,
                    ]
                );
            }
        }
    }
}
