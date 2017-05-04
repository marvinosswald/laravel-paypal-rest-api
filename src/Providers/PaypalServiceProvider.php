<?php

namespace Marvinosswald\LaravelPayPal\Providers;

use Illuminate\Support\ServiceProvider;
use Marvinosswald\LaravelPayPal\Services\Paypal;

class PaypalServiceProvider extends ServiceProvider{

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider and dependencies.
	 * @return void
	 */
    public function register()
    {
        // Tell Laravel that when an instance of YourPackageContract is requested, an instance of YourPackage should be returned
        $this->app->singleton('Marvinosswald\\LaravelPayPal\\Contracts\\PayPalContract', 'Marvinosswald\\LaravelPayPal\\Services\\Paypal');
    }

    public function provides()
    {
        return ['Marvinosswald\\LaravelPayPal\\Contracts\\PayPalContract'];
    }

	/**
	 * Set up aliases, setup routes, publish assets.
	 * @return void
	 */
	public function boot()
	{
		$this->publishAssets();
	}

	/**
	 * Publish package assets.
	 * @return void
	 */
	private function publishAssets()
	{
	    $this->publishes([
	      realpath(__DIR__.'/../../resources/Config') => config_path('')
	    ], 'config');
	}
}
