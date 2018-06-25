<?php

namespace App\Providers;

use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //注册路由
        Passport::routes();

        //开启隐式授权令牌
        Passport::enableImplicitGrant();

        //设置令牌过期时间15天
        Passport::tokensExpireIn(now()->addDays(15));

        //设置刷新令牌过期时间30天
        Passport::refreshTokensExpireIn(now()->addDays(30));
    }
}
