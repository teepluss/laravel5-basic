<?php namespace Components\Message;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

class MessageServiceProvider extends ServiceProvider {

	/**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		// Auto create app alias with boot method.
        $loader = AliasLoader::getInstance()->alias('Message', 'Components\Message\Facade');
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->singleton('Components\Message\Contracts\Factory', function($app)
		{
			return new MessageManager($app);
		});
	}

}
