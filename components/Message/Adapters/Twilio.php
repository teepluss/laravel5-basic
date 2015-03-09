<?php namespace Components\Message\Adapters;

use Components\Message\Contracts\Adapter;

class Twilio implements Adapter {

    public function send()
    {
        return 'Message sent by Twilio';
    }

}