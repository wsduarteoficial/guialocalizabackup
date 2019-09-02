<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTagsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tags', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedInteger('category_id')->index();
			$table->foreign('category_id')->references('id')->on('categories')->onDelete('CASCADE');
			$table->string('name')->unique();
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

		Schema::table('tags', function (Blueprint $table) {
			$table->dropForeign(['category_id']);
		});

		Schema::drop('tags');
		
	}

}
