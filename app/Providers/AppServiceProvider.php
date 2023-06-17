<?php

namespace App\Providers;

use App\Interfaces\Services\Admin\AdminServiceInterface;
use App\Interfaces\Services\Auth\AuthServiceInterface;
use App\Interfaces\Services\Mall\MallServiceInterface;
use App\Services\Admin\AdminService;
use App\Services\Auth\AuthService;
use App\Services\Mall\MallService;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->register(RepositoryServiceProvider::class);

        $this->app->register(ServiceServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);

    }
}
