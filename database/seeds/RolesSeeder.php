<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Admin',
            'slug' => 'admin',
            'permissions' => json_encode(
                [
                    'create' => true,
                    'update' => true,
                    'delete' => true,
                    'view' => true,
                ]
            ),
        ]);

        DB::table('roles')->insert([
            'name' => 'Helpdesk',
            'slug' => 'helpdesk',
            'permissions' => json_encode(
                [
                    'view' => true,
                ]
            ),
        ]);

    }
}
