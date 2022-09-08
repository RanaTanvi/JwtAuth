<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $admin=[

                'id' => 1,
                'username' => 'admin',
                'password'=>Hash::make('admin'),
                 'role_id'=>1
        ];
        DB::table('users')->insert($admin);
    }
}
