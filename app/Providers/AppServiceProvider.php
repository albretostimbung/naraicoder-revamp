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
        $this->app->bind(\App\Services\OAuthService::class, \App\Services\Implement\OAuthServiceImpl::class);
        $this->app->bind(\App\Services\ArticleService::class, \App\Services\Implement\ArticleServiceImpl::class);
        $this->app->bind(\App\Services\EventService::class, \App\Services\Implement\EventServiceImpl::class);

        $this->app->bind(\App\Repositories\UserRepository::class, \App\Repositories\Implement\UserRepositoryImpl::class);
        $this->app->bind(\App\Repositories\CommunityProfileRepository::class, \App\Repositories\Implement\CommunityProfileRepositoryImpl::class);
        $this->app->bind(\App\Repositories\PartnerRepository::class, \App\Repositories\Implement\PartnerRepositoryImpl::class);
        $this->app->bind(\App\Repositories\TeamRepository::class, \App\Repositories\Implement\TeamRepositoryImpl::class);
        $this->app->bind(\App\Repositories\EventRepository::class, \App\Repositories\Implement\EventRepositoryImpl::class);
        $this->app->bind(\App\Repositories\EventImageRepository::class, \App\Repositories\Implement\EventImageRepositoryImpl::class);
        $this->app->bind(\App\Repositories\ArticleRepository::class, \App\Repositories\Implement\ArticleRepositoryImpl::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
