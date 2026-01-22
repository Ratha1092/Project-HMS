<?php

declare(strict_types=1);

namespace App\Enum;

enum RoomStatus: string
{
    case AVAILABLE = 'available';
    case MAINTENANCE = 'maintenance';
    case OCCUPIED = 'occupied';

    public function label(): string
    {
        return match ($this) {
            self::AVAILABLE => 'Available',
            self::MAINTENANCE => 'Maintenance',
            self::OCCUPIED => 'Occupied',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::AVAILABLE => 'bg-green-100 text-green-800',
            self::MAINTENANCE => 'bg-yellow-100 text-yellow-800',
            self::OCCUPIED => 'bg-red-100 text-red-800',
        };
    }
}
