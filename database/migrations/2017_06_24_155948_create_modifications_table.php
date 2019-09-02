<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateModificationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('modifications', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedInteger('company_id')->index();
			$table->unsignedInteger('plan_id')->nullable();
			$table->unsignedInteger('state_id')->nullable();
			$table->unsignedInteger('city_id')->nullable();
			$table->unsignedInteger('zipcode_id')->nullable();
			$table->unsignedInteger('place_id')->nullable()->comment('logradouro');
			$table->unsignedInteger('district_id')->nullable();
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
		Schema::drop('modifications');
	}

}
