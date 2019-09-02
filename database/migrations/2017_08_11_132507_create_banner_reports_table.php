<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBannerReportsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('banner_reports', function(Blueprint $table)
		{
			$table->increments('id');
            $table->unsignedInteger('banner_id')->index();
            $table->foreign('banner_id')->references('id')->on('banners')->onDelete('CASCADE');
            $table->unsignedInteger('company_id')->index();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('CASCADE');
            $table->integer('city_id')->default(0);
            $table->integer('state_id')->default(0);
            $table->enum('action', ['click', 'view'])->default('view');
            $table->string('url_referer')->nullable();
            $table->string('tags')->nullable();
			$table->string('ip')->nullable();
			$table->string('agent')->nullable();
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

		Schema::table('banner_reports', function (Blueprint $table) {
            $table->dropForeign(['banner_id']);
            $table->dropForeign(['company_id']);
		});
		
		Schema::drop('banner_reports');

	}

}
