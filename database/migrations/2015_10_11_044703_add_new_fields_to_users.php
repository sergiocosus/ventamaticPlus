<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddNewFieldsToUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function(Blueprint $table)
		{
			$table->string('last_name', 50);
			$table->string('username', 30);
			$table->string('phone', 50);
			$table->string('cell_phone', 50);
			$table->string('address', 100);
			$table->string('rfc', 13);

			$table->char('locality_id', 4)->nullable();
			$table->char('municipality_id', 3)->nullable();
			$table->char('state_id', 2)->nullable();

			$table->softDeletes();

			$table->foreign('locality_id')->references('id')->on('localities');
			$table->foreign('municipality_id')->references('municipality_id')->on('localities');
			$table->foreign('state_id')->references('state_id')->on('localities');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table)
		{
			$table->dropColumn('last_name');
			$table->dropColumn('username');
			$table->dropColumn('phone');
			$table->dropColumn('cell_phone');
			$table->dropColumn('address');
			$table->dropColumn('email');
			$table->dropColumn('rfc');

			$table->dropForeign('users_municipality_id_foreign');
			$table->dropForeign('users_locality_id_foreign');
			$table->dropForeign('users_state_id_foreign');

			$table->dropColumn('locality_id');
			$table->dropColumn('municipality_id');
			$table->dropColumn('state_id');


			$table->dropSoftDeletes();


		});
	}

}
