<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(\App\Services\AuthService::class, \App\Services\Implement\AuthServiceImpl::class);
        $this->app->bind(\App\Repositories\UserRepository::class, \App\Repositories\Implement\UserRepositoryImpl::class);
        $this->app->bind(\App\Repositories\CommunityProfileRepository::class, \App\Repositories\Implement\CommunityProfileRepositoryImpl::class);
        $this->app->bind(\App\Repositories\PartnerRepository::class, \App\Repositories\Implement\PartnerRepositoryImpl::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
