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
            'password' => 'D@igoro88',
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
    }
}
