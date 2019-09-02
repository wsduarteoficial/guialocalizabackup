<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoryCompanyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('category_company', function(Blueprint $table)
		{
			$table->increments('id');
            $table->unsignedInteger('category_id')->index();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('CASCADE');
			$table->unsignedInteger('company_id')->index();
			$table->foreign('company_id')->references('id')->on('companies')->onDelete('CASCADE');

		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		
		Schema::table('category_company', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropForeign(['company_id']);
		});

		Schema::drop('category_company');
	}

}
