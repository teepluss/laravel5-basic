<?php namespace Components\Message;

use Closure;
use DateTime;
use Carbon\Carbon;
use Illuminate\Support\Traits\Macroable;
use Components\Message\Contracts\Adapter;
use Illuminate\Contracts\Events\Dispatcher;
use Components\Message\Contracts\Repository as MessageContract;

class Repository implements MessageContract {

    use Macroable {
        __call as macroCall;
    }

    /**
     * The message adapter implementation.
     *
     * @var \Components\Message\Contracts\Adapter
     */
    protected $adapter;

    /**
     * The event dispatcher implementation.
     *
     * @var \Illuminate\Contracts\Events\Dispatcher
     */
    protected $events;

    /**
     * Create a new message repository instance.
     *
     * @param  \Components\Message\Contracts\Adapter  $adapter
     */
    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * Set the event dispatcher instance.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher
     * @return void
     */
    public function setEventDispatcher(Dispatcher $events)
    {
        $this->events = $events;
    }

    /**
     * Handle dynamic calls into macros or pass missing methods to the adapter.
     *
     * @param  string  $method
     * @param  array   $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        if (static::hasMacro($method))
        {
            return $this->macroCall($method, $parameters);
        }

        return call_user_func_array(array($this->adapter, $method), $parameters);
    }

}
