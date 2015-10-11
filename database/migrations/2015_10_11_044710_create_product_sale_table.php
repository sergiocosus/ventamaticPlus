<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductSaleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_sale', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('sale_id')->unsigned();
			$table->integer('product_id')->unsigned()->index('fk_buy_product_idx');
			$table->decimal('quantity',10,3);
			$table->decimal('price', 10)->unsigned()->nullable();

			$table->foreign('sale_id')->references('id')->on('sales');
			$table->foreign('product_id')->references('id')->on('products');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product_sale');
	}

}
