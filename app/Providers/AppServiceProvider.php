<?php

namespace App\Providers;

use App\Models\User;
use App\Observers\UserObserver;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //忽略 Passport 默认迁移
        Passport::ignoreMigrations();

        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }
}
