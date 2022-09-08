<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles=[
            [
                'id' => 1,
                'role' => 'admin',
            ],
            [
                'id' => 2,
                'role' => 'user',
            ]
            ];
            DB::table('roles')->insert($roles);
    }
}
