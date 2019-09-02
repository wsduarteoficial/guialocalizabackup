<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBannerSubcategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('banner_subcategory', function(Blueprint $table)
		{
			$table->increments('id');
            $table->unsignedInteger('banner_id')->index();
            $table->foreign('banner_id')->references('id')->on('banners')->onDelete('CASCADE');
            $table->unsignedInteger('subcategory_id')->index();
            $table->foreign('subcategory_id')->references('id')->on('subcategories')->onDelete('CASCADE');

        });
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('banner_subcategory', function (Blueprint $table) {
            $table->dropForeign(['banner_id']);
            $table->dropForeign(['subcategory_id']);
		});
		
		Schema::drop('banner_subcategory');

	}

}
