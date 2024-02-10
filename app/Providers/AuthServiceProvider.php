<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Project;
use App\Models\User;
use App\Policies\ProjectPolicy;
use App\Policies\TeamMemberPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class => TeamMemberPolicy::class,
        Project::class => ProjectPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('sidebar-view-member', function (User $user) {
            return $user->role_id === 1;
        });
        Gate::define('sidebar-view-project', function (User $user) {
            return $user->role_id === 1;
        });
        Gate::define('task-view-all', function (User $user) {
            return $user->role_id === 1;
        });
        Gate::define('task-create', function (User $user) {
            return $user->role_id === 1;
        });
        Gate::define('task-edit', function (User $user) {
            return $user->role_id === 1;
        });
        Gate::define('task-delete', function (User $user) {
            return $user->role_id === 1;
        });
    }
}
