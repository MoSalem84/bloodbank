<?php

use \Database\Seeders\CreateAdminSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Database\Seeders\PermissionTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // \App\Models\Governorate::factory(2)
        // ->create()
        // ->each(function ($governorate) {
        // \App\Models\City::factory(2)
        // ->create([
        //   'governorate_id' => $governorate->id,
        //   'governorates_name' => \APP\Models\Governorate::all()->random()->name
		// ]);
        // });

        //  \App\Models\Governorate::factory(2)->create();

    $this->call(PermissionTableSeeder::class);
    $this->call(CreateAdminSeeder::class);

    }
}
