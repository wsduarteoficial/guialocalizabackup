<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBannerCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('banner_category', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedInteger('banner_id')->index();
			$table->foreign('banner_id')->references('id')->on('banners')->onDelete('CASCADE');
            $table->unsignedInteger('category_id')->index();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('CASCADE');

		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		
		Schema::table('banner_category', function (Blueprint $table) {
            $table->dropForeign(['banner_id']);
            $table->dropForeign(['category_id']);
		});

		Schema::drop('banner_category');
	}

}
