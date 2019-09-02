<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePlacesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('places', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedInteger('city_id')->index();
			$table->foreign('city_id')->references('id')->on('cities')->onDelete('CASCADE');
			$table->string('name')->comment('Logradouros');
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

		Schema::table('places', function (Blueprint $table) {
			$table->dropForeign(['city_id']);
		});
		
		Schema::drop('places');
	}

}
