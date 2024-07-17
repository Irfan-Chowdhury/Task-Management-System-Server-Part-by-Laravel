<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class ProjectPolicy
{
    use HandlesAuthorization;

    public function viewProject()
    {
        return Auth::check() && Auth::user()->role_id === 1;
    }
    public function createProject()
    {
        return Auth::check() && Auth::user()->role_id === 1;
    }
    public function updateProject()
    {
        return Auth::check() && Auth::user()->role_id === 1;
    }
    public function deleteProject()
    {
        return Auth::check() && Auth::user()->role_id === 1;
    }
}
