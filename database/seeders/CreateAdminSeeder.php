<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminSeeder extends Seeder{

    /*** Run the database seeds.** @return void*/

    public function run(){
        $user = User::create([

        'name' => 'Mohamed Salem',
        'phone' => '01127697199',
        'email' => 'salem@bb.com',
        'roles_name'=>['Super Admin'],
        'status'=>'مفعل',
        'password' => bcrypt('123456')]);

        // $role = Role::create(['name' => 'Assistant']);
        // $permissions = Permission::pluck('id','id')->all();
        // $role->syncPermissions($permissions);
        // $user->assignRole([$role->id]);

    }}
