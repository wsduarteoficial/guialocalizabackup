<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompanyPhoneTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('company_phone', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedInteger('company_id')->index();
			$table->foreign('company_id')->references('id')->on('companies')->onDelete('CASCADE');
            $table->unsignedInteger('phone_id')->index();
            $table->foreign('phone_id')->references('id')->on('phones')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{

		Schema::table('company_phone', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
			$table->dropForeign(['phone_id']);
		});
		
		Schema::drop('company_phone');
	}

}
