<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCouponsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('coupons', function(Blueprint $table)
		{
			$table->increments('id');
			$table->boolean('active')->default(1);
			$table->string('code');
			$table->string('description')->nullable();
			$table->enum('type', ['fix', 'percent']);
			$table->decimal('value', 10)->nullable();
			$table->decimal('value_min', 10)->nullable();
			$table->boolean('cumulative')->nullable();
			$table->boolean('appy_total')->nullable();
			$table->integer('used')->nullable();
			$table->integer('quantity')->nullable();
			$table->integer('quantity_per_customer')->nullable();
			$table->dateTime('expired_at')->nullable();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('coupons');
	}

}
