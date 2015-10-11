<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateShiftWorksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('shift_works', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned()->index('fk_innings_user_idx');
			$table->integer('branch_id')->unsigned()->index('fk_innings_branch_idx');
			$table->boolean('completed')->default(false);
			$table->decimal('initial', 12,2)->nullable();
			$table->decimal('final', 12,2)->nullable();
			$table->decimal('calculated', 12,2)->nullable();
			$table->timestamps();
			$table->softDeletes();

			$table->foreign('branch_id')->references('id')->on('branches');
			$table->foreign('user_id')->references('id')->on('users');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('shift_works');
	}

}
