<?php

namespace App\Providers;

use app\Modules\User\Entities\UserEntity;
use app\Modules\User\Validation\UserCreateValidator;
use app\Modules\User\Validation\UserUpdateValidator;
use Illuminate\Support\ServiceProvider;

class EntityServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserEntity::class, function ($app) {
            return new UserEntity(
                $app->make("App\Repositories\UserRepository"),
                new UserCreateValidator($app["validator"]),
                new UserUpdateValidator($app["validator"])
            );
        });
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
