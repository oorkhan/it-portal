<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class InitialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Super Admin',
            'email' => 'o.orkhan@gmail.com',
            'password' => Hash::make('D@igoro88'),
        ]);

        DB::table('roles')->insert([
            'name' => 'admin',
            'guard_name' => 'web',
        ]);

        DB::table('permissions')->insert([
            'name' => 'create',
            'guard_name' => 'web',
        ]);
        DB::table('permissions')->insert([
            'name' => 'update',
            'guard_name' => 'web',
        ]);
        DB::table('permissions')->insert([
            'name' => 'delete',
            'guard_name' => 'web',
        ]);
        DB::table('permissions')->insert([
            'name' => 'view',
            'guard_name' => 'web',
        ]);
        DB::table('model_has_roles')->insert([
            'role_id' => 1,
            'model_type' => 'App\User',
            'model_id' => 1,
        ]);

        DB::table('role_has_permissions')->insert([
            'permission_id' => 1,
            'role_id' => 1,
        ]);
        DB::table('role_has_permissions')->insert([
            'permission_id' => 2,
            'role_id' => 1,
        ]);
        DB::table('role_has_permissions')->insert([
            'permission_id' => 3,
            'role_id' => 1,
        ]);
        DB::table('role_has_permissions')->insert([
            'permission_id' => 4,
            'role_id' => 1,
        ]);
        DB::table('campuses')->insert([
            'name' => 'Qərbi Kaspi Universitetinin Əsas Binası, Filologiya və Tərcümə Məktəbi',
            'address' => 'Azərbaycan, Bakı, İstiqlaliyyət küçəsi, 31',
        ]);
        DB::table('campuses')->insert([
            'name' => 'Siyasi Elmlər Məktəbi, İctimai Elmlər Məktəbi, Biznes Məktəbi, İqtisadiyyat Məktəbi',
            'address' => 'Azərbaycan, Bakı, Əhməd Rəcəbli küçəsi, III Paralel, 21',
        ]);
        DB::table('campuses')->insert([
            'name' => 'Dizayn Məktəbi, Yüksək Texnologiyalar və İnnovativ Mühəndislik Məktəbi, Tətbiqi və Təbiət Elmləri Məktəbi',
            'address' => 'Azərbaycan, Bakı, Əhməd Rəcəbli küçəsi, III Paralel, 17A',
        ]);
        DB::table('rooms')->insert([
            'id' => 1,
            'campus_id' => 1,
            'name' => 'm 101',
            'type' => 'office',
            'numberOfPeople' => 5,
        ]);
        DB::table('rooms')->insert([
            'id' => 2,
            'campus_id' => 2,
            'name' => 'ar1 101',
            'type' => 'office',
            'numberOfPeople' => 5,
        ]);
        DB::table('rooms')->insert([
            'id' => 3,
            'campus_id' => 3,
            'name' => 'ar2 101',
            'type' => 'office',
            'numberOfPeople' => 5,
        ]);
        DB::table('equipmenttypes')->insert([
            'name' => 'system unit',
        ]);
        DB::table('equipmenttypes')->insert([
            'name' => 'monitor',
        ]);
        DB::table('equipmenttypes')->insert([
            'name' => 'printer',
        ]);
        DB::table('equipmenttypes')->insert([
            'name' => 'keyboard',
        ]);
        DB::table('equipmenttypes')->insert([
            'name' => 'mouse',
        ]);
        DB::table('equipmenttypes')->insert([
            'name' => 'laptop',
        ]);
        DB::table('equipmenttypes')->insert([
            'name' => 'projector',
        ]);


    }
}
