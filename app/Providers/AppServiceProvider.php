<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register any application services.
	 *
	 * This service provider is a great spot to register your various container
	 * bindings with the application. As you can see, we are registering our
	 * "Registrar" implementation here. You can add your own bindings too!
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(
			'Illuminate\Contracts\Auth\Registrar',
			'App\Services\Registrar'
		);

		$this->app->singleton('App\Services\Something', function($app, $config)
		{
			return (new \App\Services\Something($config))->setName();
		});

		$this->registerRepository();
	}

	protected function registerRepository()
	{
		$this->app->bind(
			'App\Contracts\Repositories\UserRepositoryInterface',
			'App\Repositories\UserRepository'
		);
	}

}
