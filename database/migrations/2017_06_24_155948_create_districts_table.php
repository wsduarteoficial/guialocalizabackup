<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDistrictsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('districts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedInteger('city_id')->index();
			$table->foreign('city_id')->references('id')->on('cities')->onDelete('CASCADE');
			$table->string('name');
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

		Schema::table('districts', function (Blueprint $table) {
			$table->dropForeign(['city_id']);
		});
		
		Schema::drop('districts');
	}

}
