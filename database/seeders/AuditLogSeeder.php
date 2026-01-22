<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\AuditLog;
use App\Models\User;
use Illuminate\Database\Seeder;

class AuditLogSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('email', 'admin@hms.test')->first();

        if ($admin) {
            AuditLog::create([
                'user_id' => $admin->id,
                'action' => 'created',
                'auditable_type' => 'App\Models\Hotel',
                'auditable_id' => 1,
                'old_values' => null,
                'new_values' => ['name' => 'Sample Hotel'],
                'ip_address' => '127.0.0.1',
            ]);

            AuditLog::create([
                'user_id' => $admin->id,
                'action' => 'updated',
                'auditable_type' => 'App\Models\Room',
                'auditable_id' => 1,
                'old_values' => ['price' => 100],
                'new_values' => ['price' => 120],
                'ip_address' => '127.0.0.1',
            ]);
        }
    }
}