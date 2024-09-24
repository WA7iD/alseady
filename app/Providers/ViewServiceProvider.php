<?php

namespace App\Providers;

use App\Models\Role;
use App\Models\SiteInfo;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public $info;
    public $sidebar_roles;

    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->info = SiteInfo::first();
        $this->sidebar_roles = Role::query()->select()->pluck('display_name_'.app()->getLocale(), 'name');
        view()->composer('*', function ($view) {
            $view->with([
                'info' => $this->info,
                'sidebar_roles' => $this->sidebar_roles,

            ]);
        });
    }
}
