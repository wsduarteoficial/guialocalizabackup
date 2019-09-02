<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePlanContractsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('plan_contracts', function(Blueprint $table)
		{

			$table->increments('id');
			$table->unsignedInteger('client_id')->index();
			$table->foreign('client_id')->references('id')->on('clients')->onDelete('CASCADE');
			$table->unsignedInteger('coupon_id')->nullable()->index();
			$table->unsignedInteger('company_id')->nullable()->index();
			$table->unsignedInteger('plan_id')->nullable()->index();
			$table->unsignedInteger('configuration_payment_id')->nullable()->index();
			$table->unsignedInteger('situation_payment_id')->nullable()->index();
			$table->string('transaction_code')->nullable();
			$table->float('discount', 10)->nullable();
			$table->string('discount_type')->nullable();
			$table->float('payment_value', 10)->nullable();
			$table->text('note')->nullable();
			$table->boolean('active')->default(1);
			$table->date('paymented_at')->nullable();
			$table->date('start_at')->nullable();
			$table->date('expired_at')->nullable();
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
		Schema::drop('plan_contracts');
	}

}
