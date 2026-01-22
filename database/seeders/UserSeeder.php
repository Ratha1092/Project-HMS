<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use App\Enum\UserRole;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@hms.test'],
            [
                'name' => 'System Admin',
                'password' => Hash::make('12345678'),
                'role' => UserRole::ADMIN,
            ]
        );

        User::updateOrCreate(
            ['email' => 'manager@hms.test'],
            [
                'name' => 'Hotel Manager',
                'password' => Hash::make('12345678'),
                'role' => UserRole::MANAGER,
            ]
        );

        User::updateOrCreate(
            ['email' => 'receptionist@hms.test'],
            [
                'name' => 'Receptionist',
                'password' => Hash::make('12345678'),
                'role' => UserRole::RECEPTIONIST,
            ]
        );
    }
}
