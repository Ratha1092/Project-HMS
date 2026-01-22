<?php

declare(strict_types=1);

namespace App\Enum;

enum UserRole: string
{
    case ADMIN = 'admin';
    case MANAGER = 'manager';
    case RECEPTIONIST = 'receptionist';
}
