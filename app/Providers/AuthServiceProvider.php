<?php

namespace App\Providers;

use App\Models\Multimedia;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        //
    ];

    public function boot(): void
    {
        Gate::define('view-media', function ($user = null, Multimedia $multimedia = null) {
            return true; // Permettre l'accès à tous pour le moment
        });
    }
}