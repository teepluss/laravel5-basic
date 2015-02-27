<?php namespace App\Http\Controllers\Demo;

use App\Http\Controllers\Controller;
use App\Commands\PurchasePodcast;
use App\User, App\Podcast, Auth;

class BusController extends Controller {

    /**
     * Example about purchase product.
     *
     * @return void
     */
    public function getIndex()
    {
        $this->dispatch(
            new PurchasePodcast(user::first(), Podcast::first())
        );
    }

}
