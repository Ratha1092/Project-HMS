<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Hotel;
use Illuminate\Database\Seeder;

class HotelSeeder extends Seeder
{
    public function run(): void
    {
        Hotel::updateOrCreate(
            ['name' => 'Grand Palace Hotel'],
            [
                'address' => '123 Main Street, City Center',
                'is_active' => true,
            ]
        );

        Hotel::updateOrCreate(
            ['name' => 'Ocean View Resort'],
            [
                'address' => '456 Beach Road, Seaside',
                'is_active' => true,
            ]
        );
    }
}
