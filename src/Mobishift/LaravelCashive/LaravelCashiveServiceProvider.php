<?php namespace Mobishift\LaravelCashive;

use Illuminate\Support\ServiceProvider;
use LibCashive\Client;

class LaravelCashiveServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = true;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('mobishift/laravel-cashive');
	}
	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind('cashive', function($app)
		{
		    $client = new Client($app['config']->get("laravel-cashive::cashive.key"), $app['config']->get("laravel-cashive::cashive.secret"));
		    $client->debug = $app['config']->get("laravel-cashive::cashive.debug");
            if($app['config']->get("laravel-cashive::cashive.debug_host")){
                $client->host = $app['config']->get("laravel-cashive::cashive.debug_host");
            }
			return $client;
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('cashive');
	}

}
