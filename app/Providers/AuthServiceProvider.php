<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Project' => 'App\Policies\ProjectPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(Gate $gate)
    {
        $this->registerPolicies();
        $this->registerCrudPolicies();

    }

    public function registerCrudPolicies(){
        \Gate::define('create', function($user){
            return $user->hasAccess(['create']);
        });
        \Gate::define('update', function($user){
            return $user->hasAccess(['update']);
        });
        \Gate::define('delete', function($user){
            return $user->hasAccess(['delete']);
        });
        \Gate::define('view', function($user){
            return $user->hasAccess(['view']);
        });
    }
}
