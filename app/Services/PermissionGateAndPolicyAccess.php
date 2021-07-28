<?php

namespace App\Services;

use Illuminate\Support\Facades\Gate;

class PermissionGateAndPolicyAccess
{

    public function setGateAndPolicyAccess()
    {
        $this->defineCategoryGate();
        $this->defineProductGate();

    }

    public function defineCategoryGate()
    {
        Gate::define('category-list', 'App\Policies\CategoryPolicy@view');

        Gate::define('category-add', 'App\Policies\CategoryPolicy@create');

        Gate::define('category-edit', 'App\Policies\CategoryPolicy@update');

        Gate::define('category-del', 'App\Policies\CategoryPolicy@delete');
    }

    public function defineProductGate()
    {
        Gate::define('product_list', 'App\Policies\ProductPolicy@view'); 

        Gate::define('product_add', 'App\Policies\ProductPolicy@create'); 

        Gate::define('product_edit', 'App\Policies\ProductPolicy@update');

        Gate::define('product_delete', 'App\Policies\ProductPolicy@delete');
    }
}
