<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLocalitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('localities', function(Blueprint $table)
		{
			$table->char('id', 4);
			$table->char('municipality_id', 3)->index('fk_locality_municipality_idx');
			$table->char('state_id', 2)->index('fk_locality_state_idx');
			$table->string('name', 100)->nullable();
			$table->primary(['id','municipality_id','state_id']);

			$table->foreign('municipality_id', 'fk_locality_municipality')->references('id')->on('municipalities')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('state_id', 'fk_locality_state')->references('state_id')->on('municipalities')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('localities');
	}

}
