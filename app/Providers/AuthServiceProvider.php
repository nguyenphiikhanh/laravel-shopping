<?php

namespace App\Providers;

use App\Policies\CategoryPolicy;
use App\Product;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $this->defineCategoryGate();
        //
        $this->defineProductGate();

        Gate::define('menu-list', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.list-menu'));
        });
    }

    public function defineProductGate()
    {
        Gate::define('product_list', function ($user) {
            return $user->checkPermissionAccess('product_list');
        }); 

        Gate::define('product_edit', 'App\Policies\ProductPolicy@update'); 
 
 
    }
    public function defineCategoryGate()
    {
        Gate::define('category-list', 'App\Policies\CategoryPolicy@view');

        Gate::define('category-add', 'App\Policies\CategoryPolicy@create');

        Gate::define('category-edit', 'App\Policies\CategoryPolicy@update');

        Gate::define('category-del', 'App\Policies\CategoryPolicy@delete');
    }
}
