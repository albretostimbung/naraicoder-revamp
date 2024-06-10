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
        $this->app->bind(\App\Services\MemberService::class, \App\Services\Implement\MemberServiceImpl::class);
        $this->app->bind(\App\Repositories\UserRepository::class, \App\Repositories\Implement\UserRepositoryImpl::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
