<?php

namespace App\Providers;

use App\Http\Business\LoginBusiness;
use App\Http\Interfaces\LoginBusinessInterface;
use App\Http\Interfaces\LoginInterface;
use App\Http\Interfaces\LoginServiceInterface;
use App\Http\Interfaces\UserRepostiroyInterface;
use App\Http\Repositories\UserRepository;
use App\Http\Services\LoginService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind(LoginServiceInterface::class, LoginService::class);
        $this->app->bind(LoginBusinessInterface::class, LoginBusiness::class);
        $this->app->bind(UserRepostiroyInterface::class, UserRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
