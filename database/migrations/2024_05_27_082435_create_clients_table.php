<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('email')->unique();
			$table->string('password', 10);
			$table->string('phone')->unique();
			$table->date('d_o_b');
			$table->integer('blood_type_id')->unsigned();
			$table->integer('city_id')->unsigned();
			$table->date('last_donation_date');
            $table->string('pin_code')->nullable();
			$table->string('api_token' , 60)->unique()->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('clients');

	}
}
