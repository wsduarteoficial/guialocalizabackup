<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogSearchesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('log_searches', function(Blueprint $table) {
            $table->increments('id');
			$table->string('tag_search');
            $table->integer('total')->nullable();
			$table->string('url')->nullable();
			$table->string('method')->nullable();
			$table->string('ip')->nullable();
			$table->string('agent')->nullable();
			$table->unsignedInteger('state_id')->nullable()->index();
			$table->unsignedInteger('city_id')->nullable()->index();
			$table->unsignedInteger('category_id')->nullable()->index();
			$table->unsignedInteger('subcategory_id')->nullable()->index();
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
		Schema::drop('log_searches');
	}

}
