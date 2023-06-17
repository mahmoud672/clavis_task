<?php


namespace App\Providers;


use App\Interfaces\Repository\EloquentRepositoryInterface;
use App\Repository\BaseRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(EloquentRepositoryInterface::class,BaseRepository::class);
    }

    public function boot()
    {

    }
}
