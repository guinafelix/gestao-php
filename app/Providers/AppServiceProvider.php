<?php

namespace App\Providers;

use App\Http\Interfaces\ClienteRepoInterface;
use App\Http\Interfaces\FornecedorRepoInterface;
use App\Http\Repositories\ClienteRepoImpl;
use App\Http\Repositories\FornecedorRepoImpl;
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
        $this->app->bind(FornecedorRepoInterface::class, FornecedorRepoImpl::class);
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
