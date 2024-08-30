<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('settings', function (Blueprint $table) {

            $table->longText('notifications_settings_text')->nullable(true)->change();
			$table->text('about_app')->nullable(true)->change();
			$table->integer('phone')->nullable(true)->change();
			$table->string('email')->nullable(true)->change();
			$table->string('fb_link')->nullable(true)->change();
			$table->string('tw_link')->nullable(true)->change();
			$table->string('insta_link')->nullable(true)->change();
			$table->string('yt_link')->nullable(true)->change();
			$table->string('wts_link')->nullable(true)->change();

        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {

            Schema::drop('settings');
        });
    }
};
