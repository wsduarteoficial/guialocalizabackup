<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSolicitationRegistersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('solicitation_registers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('plan_id')->nullable();
			$table->integer('state_id')->nullable();
			$table->integer('city_id')->nullable();
			$table->integer('zipcode_id')->nullable();
			$table->integer('place_id')->nullable()->comment('logradouro');
			$table->integer('district_id')->nullable();
			$table->string('name');
			$table->string('logo')->nullable();
			$table->string('email')->nullable();
			$table->string('numeral')->nullable();
			$table->text('description')->nullable();
			$table->string('website')->nullable();
			$table->string('facebook')->nullable();
			$table->string('twitter')->nullable();
			$table->string('google')->nullable();
			$table->text('tags')->nullable();
			$table->boolean('active')->default(1);
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
		Schema::drop('solicitation_registers');
	}

}
