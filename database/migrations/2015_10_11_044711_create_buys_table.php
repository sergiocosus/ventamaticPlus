<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBuysTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('buys', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('branch_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->integer('provider_id')->unsigned();
			$table->decimal('total', 10, 2);
			$table->timestamps();
			$table->softDeletes();

			$table->foreign('branch_id')->references('id')->on('branches');
			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('provider_id')->references('id')->on('users');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('buys');
	}

}
