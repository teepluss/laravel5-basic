<?php namespace App\Handlers\Events;

use App\Events\PodcastWasPurchased;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

use Log;

class EmailPurchaseConfirmation {

	/**
	 * Create the event handler.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Handle the event.
	 *
	 * @param  PodcastWasPurchased  $event
	 * @return void
	 */
	public function handle(PodcastWasPurchased $event)
	{
		$user = $event->user;
		$podcast = $event->podcast;

		$action = sprintf('I am sending an email to %s to confirm purchasing an %s.', $user->email, $podcast->name);

		Log::info('SendConfirmationEmail', [$action]);

		echo '<p>'.$action.'</p>';
	}

}
