<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClicksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clicks', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedInteger('company_id')->index();
			$table->foreign('company_id')->references('id')->on('companies')->onDelete('CASCADE');
			$table->unsignedInteger('phone_id')->index();
			$table->foreign('phone_id')->references('id')->on('phones')->onDelete('CASCADE');
			$table->string('url');
			$table->string('ip');
			$table->string('agent');
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

		Schema::table('clicks', function (Blueprint $table) {
			$table->dropForeign(['company_id']);
		});

		Schema::drop('clicks');
	}

}
