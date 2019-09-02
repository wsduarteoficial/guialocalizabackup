<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogActivitiesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('log_activities', function(Blueprint $table) {
            $table->increments('id');
			$table->string('subject');
			$table->string('url')->nullable();
			$table->string('method')->nullable();
			$table->string('ip')->nullable();
			$table->string('agent')->nullable();
			$table->unsignedInteger('user_id')->index();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
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
		Schema::drop('log_activities');
	}

}
