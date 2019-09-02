<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cities', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedInteger('state_id')->index();
			$table->foreign('state_id')->references('id')->on('states');
			$table->string('name');
			$table->string('image')->nullable();
			$table->boolean('active')->default(0);
			$table->boolean('default')->default(0);
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

		Schema::table('cities', function (Blueprint $table) {
			$table->dropForeign(['state_id']);
		});
		
		Schema::drop('cities');
	}

}
