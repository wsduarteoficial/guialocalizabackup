<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;

class CreateCompaniesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('companies', function(Blueprint $table)
		{
			$table->increments('id');
			$table->uuid('company_uuid');
			$table->unsignedInteger('plan_id')->nullable()->index();
			$table->unsignedInteger('state_id')->nullable()->index();
			$table->unsignedInteger('city_id')->nullable()->index();
			$table->unsignedInteger('zipcode_id')->nullable()->index();
			$table->unsignedInteger('place_id')->nullable()->index()->comment('logradouro');
			$table->unsignedInteger('district_id')->nullable()->index();
			$table->string('name_fantasy')->index();
			$table->text('description')->nullable();
			$table->string('numeral')->nullable();
			$table->string('complement')->nullable();			
			$table->string('website')->nullable();
			$table->string('email')->nullable();	
			$table->string('facebook')->nullable();
			$table->string('twitter')->nullable();
			$table->string('google')->nullable();
			$table->text('tags')->nullable();
			$table->string('tag_title')->nullable();
			$table->text('tag_description')->nullable();
			$table->boolean('active')->default(1);
			$table->timestamps();

			$table->index(['plan_id', 'name_fantasy'], 'companies_name_fantasy_plan_id_index');
			$table->index(['plan_id', 'state_id','city_id'], 'companies_state_id_city_id_index');
			$table->index(['plan_id', 'state_id','name_fantasy'], 'companies_name_fantasy_state_id_index');
			$table->index(['plan_id', 'state_id','city_id','name_fantasy'], 'companies_name_fantasy_state_id_city_id_index');

		});

        DB::statement('ALTER TABLE companies ADD FULLTEXT fulltext_search_1(name_fantasy)');
        DB::statement('ALTER TABLE companies ADD FULLTEXT fulltext_search_2(name_fantasy, description)');
        DB::statement('ALTER TABLE companies ADD FULLTEXT fulltext_search_3(name_fantasy, description, tags)');

    }


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('companies');
	}

}
