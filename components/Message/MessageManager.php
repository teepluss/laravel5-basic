<?php namespace Components\Message;

use Closure;
use InvalidArgumentException;
use Components\Message\Contracts\Driver;
use Components\Message\Contracts\Factory;

class MessageManager implements Factory {

    protected $config = [
        'default' => 'true',

        'providers' => [

            'true' => [
                'driver' => 'true',
                'ip' => '127.0.0.1'
            ],

            'twilio' => [
                'driver' => 'twilio',
                'ip' => '127.0.0.1'
            ],

            'bulk' => [
                'driver' => 'bulk',
                'ip' => '127.0.0.1'
            ]

        ]
    ];

    /**
     * The application instance.
     *
     * @var \Illuminate\Foundation\Application
     */
    protected $app;

    /**
     * The array of resolved message adapters.
     *
     * @var array
     */
    protected $adapters = [];

    /**
     * The registered custom driver creators.
     *
     * @var array
     */
    protected $customCreators = [];

    /**
     * Create a new Message manager instance.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    public function __construct($app)
    {
        $this->app = $app;
    }

    /**
     * Get a message adapter instance by name.
     *
     * @param  string|null  $name
     * @return mixed
     */
    public function adapter($name = null)
    {
        $name = $name ?: $this->getDefaultDriver();

        return $this->adapters[$name] = $this->get($name);
    }

    /**
     * Get a message adapter instance.
     *
     * @param  string  $driver
     * @return mixed
     */
    public function driver($driver = null)
    {
        return $this->adapter($driver);
    }

    /**
     * Attempt to get the store from the local cache.
     *
     * @param  string  $name
     * @return \Components\Message\Contracts\Repository
     */
    protected function get($name)
    {
        return isset($this->adapters[$name]) ? $this->adapters[$name] : $this->resolve($name);
    }

    /**
     * Resolve the given adapter.
     *
     * @param  string  $name
     * @return \Components\Message\Contracts\Repository
     */
    protected function resolve($name)
    {
        $config = $this->getConfig($name);

        if (is_null($config))
        {
            throw new InvalidArgumentException("Provider [{$name}] is not defined.");
        }

        if (isset($this->customCreators[$config['driver']]))
        {
            return $this->callCustomCreator($config);
        }
        else
        {
            return $this->{"create".ucfirst($config['driver'])."Driver"}($config);
        }
    }

    /**
     * Call a custom driver creator.
     *
     * @param  array  $config
     * @return mixed
     */
    protected function callCustomCreator(array $config)
    {
        return $this->customCreators[$config['driver']]($this->app, $config);
    }

    /**
     * Create an instance of the TRUE driver.
     *
     * @param  array  $config
     * @return \Components\Message\Adapters\True
     */
    protected function createTrueDriver(array $config)
    {
        return $this->repository(new Adapters\True($config));
    }

    /**
     * Create an instance of the Twilio driver.
     *
     * @param  array  $config
     * @return \Components\Message\Adapters\Twilio
     */
    protected function createTwilioDriver(array $config)
    {
        return $this->repository(new Adapters\Twilio($config));
    }

    /**
     * Create a new message repository with the given implementation.
     *
     * @param  \Components\Message\Contracts\Adapter  $adapter
     * @return \Illuminate\Cache\Repository
     */
    public function repository(Driver $adapter)
    {
        $repository = new Repository($adapter);

        if ($this->app->bound('Illuminate\Contracts\Events\Dispatcher'))
        {
            $repository->setEventDispatcher(
                $this->app['Illuminate\Contracts\Events\Dispatcher']
            );
        }

        return $repository;
    }

    /**
     * Get the message connection configuration.
     *
     * @param  string  $name
     * @return array
     */
    protected function getConfig($name)
    {
        return $this->config['providers'][$name];
    }

    /**
     * Get the default message driver name.
     *
     * @return string
     */
    public function getDefaultDriver()
    {
        return $this->config['default'];
    }

    /**
     * Set the default message driver name.
     *
     * @param  string  $name
     * @return void
     */
    public function setDefaultDriver($name)
    {
        $this->config['default'] = $name;
    }

    /**
     * Register a custom driver creator Closure.
     *
     * @param  string    $driver
     * @param  \Closure  $callback
     * @return $this
     */
    public function extend($driver, Closure $callback)
    {
        $this->customCreators[$driver] = $callback;

        return $this;
    }

    /**
     * Dynamically call the default driver instance.
     *
     * @param  string  $method
     * @param  array   $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        return call_user_func_array(array($this->adapter(), $method), $parameters);
    }

}