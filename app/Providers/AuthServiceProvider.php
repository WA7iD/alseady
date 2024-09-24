<?php

namespace App\Providers;

use Illuminate\Auth\Access\Response;
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
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        #===================[ Dashboard Gates ]===================#
        Gate::define('edit-role', function ($user, $role) {
            return $role->is_editable;
        });

        Gate::define('delete-role', function ($user, $role) {
            return $role->is_deletable ;
        });

        Gate::define('access-role', function ($user, $role = null) {
            return $role !== null
                ? Response::allow()
                : Response::denyWithStatus(404);
        });

      
    }
}
