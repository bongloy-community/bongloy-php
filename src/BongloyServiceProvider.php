<?php

namespace Bongloy;

use Illuminate\Support\ServiceProvider;
use Config;
use Stripe\Stripe As Bongloy;

class BongloyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {
      $this->registerPublishing();

      Bongloy::$apiBase = 'https://api.bongloy.com';
      Bongloy::$connectBase = 'https://bongloy.com';
      Bongloy::setApiKey(Config('bongloy.api_key'));
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
      $this->configure();
    }

    /**
     * Setup the configuration for Cashier.
     *
     * @return void
     */
    protected function configure()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/bongloy.php', 'bongloy'
        );
    }

    /**
     * Register the package's publishable resources.
     *
     * @return void
     */
    protected function registerPublishing()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/bongloy.php' => $this->app->configPath('bongloy.php'),
            ], 'bongloy-config');
        }
    }
}
