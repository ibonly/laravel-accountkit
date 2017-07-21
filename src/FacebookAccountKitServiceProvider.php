<?php
/*
 * This file is part of the Laravel Facebook Account-Kit package.
 *
 * (c) Ibraheem Adeniyi <ibonly01@gmail.com>
 * (c) Surajudeen Akande <surajudeen.akande@andela.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ibonly\FacebookAccountKit;

use Illuminate\Support\ServiceProvider;

class FacebookAccountKitServiceProvider extends ServiceProvider
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
        $config = realpath(__DIR__ . '/../resources/config/accountKit.php');

        $js = realpath(__DIR__ . '/../resources/config/accountkit.js');

        $this->publishes([
            $config => config_path('accountKit.php')
        ], 'config');

        $this->publishes([
            $js => public_path('js/accountkit.js')
        ], 'public');
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->singleton('AccountKit', function() {

            return new FacebookAccountKit;
        });
    }

    /**
     * Get the services provided by the provider
     *
     * @return array
     */
    public function provides()
    {
        return ['AccountKit'];
    }
}
