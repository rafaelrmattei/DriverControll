<?php

namespace App\Providers;

use App\Models\User;
use App\Policies\Role;
use Illuminate\Support\Facades\Gate;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    
    protected $policies = [

    ];
    
    public function boot(): void
    {

        Gate::define('isAdmin', function ($user) {
            return $user->isAdmin();
        });

    }

}
