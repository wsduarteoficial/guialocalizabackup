<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clients', function(Blueprint $table)
		{

			$table->increments('id');
			$table->char('cpf_cnpj')->unique();;
			$table->string('company_name');
			$table->string('contracting_name');
			$table->string('phone');
			$table->string('email_primary')->unique();
			$table->string('email_secondary')->unique()->nullable();						
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
		Schema::drop('clients');
	}

}
