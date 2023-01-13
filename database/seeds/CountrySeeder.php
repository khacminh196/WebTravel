<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
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
                'name' => 'Vietnam',
                'display' => 1
            ],
            [
                'name' => 'Singapore',
                'display' => 1
            ],
            [
                'name' => 'Lao',
                'display' => 1
            ],[
                'name' => 'Campuchia',
                'display' => 1
            ]
        ];

        DB::table('countries')->truncate();
        DB::table('countries')->insert($data);
    }
}
