<?php namespace App\Commands;

use App\User;
use App\Podcast;
use App\Commands\Command;
use App\Events\PodcastWasPurchased;
use Illuminate\Contracts\Bus\SelfHandling;

class PurchasePodcast extends Command implements SelfHandling {

	protected $user, $podcast;

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct(User $user, Podcast $podcast)
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
		event(new PodcastWasPurchased($this->user, $this->podcast));
	}

}
