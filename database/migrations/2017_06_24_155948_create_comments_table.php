<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedInteger('company_id')->index();
			$table->foreign('company_id')->references('id')->on('companies')->onDelete('CASCADE');
			$table->string('name')->nullable();
			$table->string('email')->nullable();
			$table->string('comment')->nullable();
			$table->string('ip')->nullable();
			$table->string('agent')->nullable();
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

		Schema::table('comments', function (Blueprint $table) {
			$table->dropForeign(['company_id']);
		});
		
		Schema::drop('comments');
	}

}
