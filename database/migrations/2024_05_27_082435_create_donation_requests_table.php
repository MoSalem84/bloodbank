<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonationRequestsTable extends Migration {

	public function up()
	{
		Schema::create('donation_requests', function(Blueprint $table) {
			$table->increments('id');
			$table->string('patient_name');
			$table->string('patient_phone')->unique();
			$table->integer('patient_age');
			$table->string('hospital_name');
			$table->text('hospital_address');
			$table->integer('blood_type_id')->unsigned();
			$table->integer('city_id')->unsigned();
			$table->integer('bags_num');
			$table->longText('details');
			$table->integer('client_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('donation_requests');
	}
}
