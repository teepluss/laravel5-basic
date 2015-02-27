<?php namespace App\Commands;

use App\Commands\Command;

use Illuminate\Contracts\Bus\SelfHandling;

use App\Events\PodcastWasPurchased;

class PurchasePodcast extends Command implements SelfHandling {

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct($user, $podcast)
	{
		$this->user = $user;
		$this->podcast = $podcast;
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle()
	{
		// Handle the logic.


		event(new PodcastWasPurchased($this->user, $this->podcast));
	}

}
