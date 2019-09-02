<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubcategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subcategories', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedInteger('category_id')->index();
			$table->foreign('category_id')->references('id')->on('categories')->onDelete('CASCADE');
			$table->string('name');
			$table->boolean('active')->default(1);
			$table->timestamps();
			$table->unique(['category_id','name'], 'category_id_name_UNIQUE');
			
		});

		\DB::statement('ALTER TABLE subcategories ADD FULLTEXT fulltext_subcategory(name)');

	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		
		Schema::table('subcategories', function (Blueprint $table) {
			$table->dropForeign(['category_id']);
		});

		Schema::drop('subcategories');
	}

}
