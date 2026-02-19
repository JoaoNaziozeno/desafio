<?php

namespace App\Providers;

use App\Models\Noticias;
use App\Policies\NoticiasPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{    
    protected $policies = [
        \App\Models\Noticias::class => \App\Policies\NoticiasPolicy::class,
    ];

    
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
