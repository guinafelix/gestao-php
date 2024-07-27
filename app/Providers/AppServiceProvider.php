<?php

namespace App\Providers;

use App\Http\Interfaces\ClienteRepoInterface;
use App\Http\Repositories\ClienteRepoImpl;
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
        $this->app->bind(ClienteRepoInterface::class, ClienteRepoImpl::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
