<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubcategoryCompanyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subcategory_company', function(Blueprint $table)
		{
			$table->increments('id');
            $table->unsignedInteger('subcategory_id')->index();
            $table->foreign('subcategory_id')->references('id')->on('subcategories')->onDelete('CASCADE');
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
		Schema::table('subcategory_company', function (Blueprint $table) {
			$table->dropForeign(['subcategory_id']);
            $table->dropForeign(['company_id']);
		});
		
		Schema::drop('subcategory_company');

	}

}
