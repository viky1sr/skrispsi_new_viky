<?php

namespace App\Providers;

use App\HomeCare\MasterSpa\Repositories\Interfaces\MasterSpaRepositoryInterface;
use App\HomeCare\MasterSpa\Repositories\MasterSpaRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(MasterSpaRepositoryInterface::class,MasterSpaRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
