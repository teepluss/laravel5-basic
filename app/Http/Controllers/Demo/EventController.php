<?php namespace App\Http\Controllers\Demo;

use App\User, App\Podcast;
use App\Events\PodcastWasPurchased;
use App\Http\Controllers\Controller;
use App\Handlers\Events\EmailPurchaseConfirmation;

class EventController extends Controller {

    public function getIndex()
    {
        $user = User::first();
        $podcast = Podcast::first();

        event(new PodcastWasPurchased($user, $podcast));
    }

}
