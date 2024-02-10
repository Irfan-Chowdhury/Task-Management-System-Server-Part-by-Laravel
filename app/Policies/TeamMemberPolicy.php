<?php

namespace App\Policies;

use App\Enums\UserRoleEnum;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class TeamMemberPolicy
{
    use HandlesAuthorization;

    public function viewMember()
    {
        return Auth::check() && Auth::user()->role_id === 1;
    }
    public function createMember()
    {
        return Auth::check() && Auth::user()->role_id === 1;
    }
    public function updateMember()
    {
        return Auth::check() && Auth::user()->role_id === 1;
    }
    public function deleteMember()
    {
        return Auth::check() && Auth::user()->role_id === 1;
    }
}
