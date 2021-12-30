<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class CustomBladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        Blade::if('subscribed', function ($user) {
            return $user->subscribed('monthly') || $user->subscribed('yearly');
        });

        Blade::if('notsubscribed', function ($user) {
            return !($user->subscribed('monthly') || $user->subscribed('yearly'));
        });

        Blade::if('subscribedToProduct', function ($user, $id, $name) {
            return $user->subscribedToProduct($id, $name);
        });

        // Blade::if('onTrial', function ($user, $plan) {
        //     return $user->onTrial($plan);
        // });

        Blade::if('onGracePeriod', function ($plan) {
            return auth()->user()->subscription($plan)->onGracePeriod();
        });

        Blade::if('admin', function () {
            $user = Auth::user();
            return $user->isAdmin() || $user->isWriter() || $user->isSuperAdmin();
        });

        Blade::if('writer', function () {
            return auth()->user()->isWriter();
        });
    }
}
