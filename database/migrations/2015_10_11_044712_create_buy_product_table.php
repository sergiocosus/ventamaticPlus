<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBuyProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('buy_product', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('buy_id')->unsigned();
			$table->integer('product_id')->unsigned();
			$table->decimal('quantity',10,3);
			$table->decimal('cost', 10)->unsigned()->nullable();

			$table->foreign('product_id')->references('id')->on('products');
			$table->foreign('buy_id')->references('id')->on('buys');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('buy_product');
	}

}
