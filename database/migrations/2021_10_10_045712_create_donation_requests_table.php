<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDonationRequestsTable extends Migration {

	public function up()
	{
		Schema::create('donation_requests', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('patient_name');
			$table->integer('patient_age');
			$table->integer('blood_type_id')->unsigned();
			$table->integer('client_id')->unsigned();
			$table->integer('bags_num')->nullable();
			$table->string('hospital_name');
			$table->text('hospital_address');
			$table->integer('city_id')->unsigned();
			$table->string('patient_phone');
			$table->decimal('longitude', 10,8);
			$table->decimal('latitude', 10,8);
			$table->text('additional_notes')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('donation_requests');
	}
}