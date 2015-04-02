<?php namespace Components\Message;

use Illuminate\Support\Facades\Facade as BaseFacade;

class Facade extends BaseFacade {

    /**
     * Get the registered name of the component.
     *
     * If you got a problem about this facade
     * you may checking on sensitive case.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'Components\Message\Contracts\Factory'; }

}
