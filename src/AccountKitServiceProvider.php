<?php

/*
 * This file is part of the Laravel facebook AccountKit, package.
 *
 * (c) Ibraheem Adeniyi <ibonly01@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ibonly\AccountKit;

use Illuminate\Support\ServiceProvider;

class AccountKitServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Publishes all the config file this package needs to function
     */
    public function boot()
    {
        $config = realpath(__DIR__ . '/../resources/config/facebook-accountkit.php');

        $this->publishes([
            $config => config_path('facebook-accountkit.php')
        ]);
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->bind('laravel-accountkit', function() {

            return new AccountKit;

        });
    }

    /**
     * Get the services provided by the provider
     * @return array
     */
    public function provides()
    {
        return ['laravel-accountkit'];
    }
}
