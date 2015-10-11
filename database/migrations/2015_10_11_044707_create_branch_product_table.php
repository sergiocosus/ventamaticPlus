<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBranchProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('branch_product', function(Blueprint $table)
		{
			$table->integer('branch_id')->unsigned();
			$table->integer('product_id')->unsigned();
			$table->decimal('stock', 10, 3)->unsigned()->default(0.000);
			$table->decimal('price', 10, 3)->unsigned();
			$table->decimal('last_cost', 10, 3)->unsigned();

			$table->primary(['branch_id','product_id']);

			$table->foreign('product_id')->references('id')->on('products');
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
		Schema::drop('branch_product');
	}

}
