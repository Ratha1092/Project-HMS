<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\User;
use App\Models\Hotel;
use App\Enum\UserRole;

class HotelPolicy
{
    public function viewAny(User $user): bool
    {
        return in_array($user->role, [
            UserRole::ADMIN,
            UserRole::MANAGER,
        ], true);
    }

    public function view(User $user, Hotel $hotel): bool
    {
        return $this->viewAny($user);
    }

    public function create(User $user): bool
    {
        return in_array($user->role, [
            UserRole::ADMIN,
            UserRole::MANAGER,
        ], true);
    }

    public function update(User $user, Hotel $hotel): bool
    {
        return in_array($user->role, [
            UserRole::ADMIN,
            UserRole::MANAGER,
        ], true);
    }

    public function delete(User $user, Hotel $hotel): bool
    {
        return $user->role === UserRole::ADMIN;
    }
}
