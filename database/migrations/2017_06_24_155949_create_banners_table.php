<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBannersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('banners', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedInteger('company_id')->index();
			$table->foreign('company_id')->references('id')->on('companies')->onDelete('CASCADE');
			$table->enum('position_search', ['top_left', 'right_side']);
			$table->string('image');
			$table->string('ext');
			$table->string('size');
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

		Schema::table('banners', function (Blueprint $table) {
			$table->dropForeign(['company_id']);
		});

		Schema::drop('banners');
	}

}
