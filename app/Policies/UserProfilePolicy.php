<?php

namespace App\Policies;

use App\Models\User;
use App\Models\UserProfile;

class UserProfilePolicy
{
    public function viewAny(User $user): bool
    {
        return $user->is_admin ?? false;
    }

    public function view(User $user, UserProfile $userProfile): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return $user->is_admin ?? false;
    }

    public function update(User $user, UserProfile $userProfile): bool
    {
        return $user->is_admin ?? false;
    }

    public function delete(User $user, UserProfile $userProfile): bool
    {
        return $user->is_admin ?? false;
    }
}
