<?php

/*
 * This file is part of the Laravel Paystack package.
 *
 * (c) Prosper Otemuyiwa <prosperotemuyiwa@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Unicodeveloper\Paystack;

use Illuminate\Support\ServiceProvider;

class PaystackServiceProvider extends ServiceProvider
{
    /**
    * Publishes all the config file this package needs to function
    */
    public function boot()
    {
        $config = __DIR__.'/../resources/config/paystack.php';

        $this->publishes([
            $config => config_path('paystack.php')
        ]);
    }

    /**
    * Register the application services.
    */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../resources/config/paystack.php', 'paystack');

        $this->app->singleton('laravel-paystack', function () {
            return new Paystack;
        });
    }
}
