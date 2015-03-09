<?php namespace App\Http\Controllers\Demo;

use App\Http\Controllers\Controller;
use Components\Message\MessageManager as Message;

class ProviderController extends Controller {

    public function getIndex(Message $msg)
    {
        return view('demo.provider.index');
    }

    public function postIndex()
    {

    }

}