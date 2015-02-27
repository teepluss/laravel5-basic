<?php namespace App\Events;

use App\Events\Event;

use Illuminate\Queue\SerializesModels;

class PodcastWasPurchased extends Event {

	use SerializesModels;

	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct($user, $podcast)
	{
		$this->user = $user;
		$this->podcast = $podcast;
	}

}
