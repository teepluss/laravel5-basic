<?php namespace Components\Message\Contracts;

interface Factory {

    /**
     * Get a message adapter instance by name.
     *
     * @param  string|null  $name
     * @return mixed
     */
    public function adapter($name = null);

}
