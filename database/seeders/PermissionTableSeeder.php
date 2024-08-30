<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{


/*** Run the database seeds.** @return void*/

public function run(){

    $permissions =
    [
        'اضافة محافظة',
        'تعديل محافظة',
        'حذف محافظة',
        'اضافة مدينة',
        'تعديل مدينة',
        'حذف مدينة',
        'اضافة مقال',
        'تعديل مقال',
        'حذف مقال',
        'اضافة مدير',
        'تعديل مدير',
        'حذف مدير',
        'اضافة رتبة',
        'تعديل رتبة',
        'حذف رتبة',
        'اضافة صلاحية',
        'تعديل صلاحية',
        'حذف صلاحية',
        'اضافة مستخدم',
        'تعديل مستخدم',
        'حذف مستخدم',
        'تعديل اعدادات الموقع',
];

    foreach ($permissions as $permission) {

        Permission::create(['name' => $permission]);

    }}}
