<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//$this->app['view']->composer('layouts.bootstrap', 'App\Composers\CartComposer');

		$this->app['view']->composer(['partials.header'], function($view)
		{
			$view->first = 'Home';
		});
	}

}
