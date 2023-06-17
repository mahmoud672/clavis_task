<?php


namespace App\Providers;

use App\Interfaces\Services\Auth\AuthServiceInterface;
use App\Services\Auth\AuthService;
use Illuminate\Support\ServiceProvider;

class ServiceServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(AuthServiceInterface::class, AuthService::class);
    }

    public function boot()
    {

    }
}
