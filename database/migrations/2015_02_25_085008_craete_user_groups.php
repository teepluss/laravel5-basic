<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CraeteUserGroups extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_groups', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('group_id');
			$table->timestamps();

			$table->index(['user_id', 'group_id']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_groups');
	}

}
