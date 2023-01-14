<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'role' => 0,
                'name' => 'User',
                'email' => 'user@gmail.com',
                'password' => bcrypt(123456),
                'is_deleted' => 0
            ],
            [
                'role' => 1,
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt(123456),
                'is_deleted' => 0
            ]
        ];
        DB::table('users')->truncate();
        DB::table('users')->insert($data);
    }
}
