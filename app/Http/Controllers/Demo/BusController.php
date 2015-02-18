<?php namespace App\Http\Controllers\Demo;

use App\Commands\PurchasePodcast;
use App\Http\Controllers\Controller;

use App\User, App\Podcast;

class BusController extends Controller {

    public function getIndex()
    {
        $this->dispatch(
            new PurchasePodcast(User::first(), Podcast::first())
        );

        return 'Done';
    }

}
