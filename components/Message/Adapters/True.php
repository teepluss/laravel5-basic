<?php namespace Components\Message\Adapters;

use Components\Message\Contracts\Adapter;

class True implements Adapter {

    public function send()
    {
        return 'Message sent by True';
    }

}