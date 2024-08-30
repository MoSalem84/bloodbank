<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

	public function up()
	{
		Schema::create('posts', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title', 2500);
			$table->string('image')->nullable();
			$table->longText('content');
			$table->integer('category_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('posts');
	}
}
