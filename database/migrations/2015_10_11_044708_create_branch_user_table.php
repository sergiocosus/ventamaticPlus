<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBranchUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('branch_user', function(Blueprint $table)
		{
			$table->integer('branch_id')->unsigned();
			$table->integer('user_id')->unsigned();

			$table->primary(['branch_id','user_id']);

			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('branch_id')->references('id')->on('branches');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('branch_user');
	}

}
