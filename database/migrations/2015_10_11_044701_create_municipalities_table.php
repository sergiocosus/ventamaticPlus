<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMunicipalitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('municipalities', function(Blueprint $table)
		{
			$table->char('id', 3);
			$table->char('state_id', 2)->index('fk_municipality_state_idx');
			$table->string('name', 45);
			$table->primary(['id','state_id']);

			$table->foreign('state_id', 'fk_municipality_state')->references('id')->on('states');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('municipalities');
	}

}
