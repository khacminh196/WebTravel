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
                'image_link' => 'images/place-1.jpg',
                'display' => 1
            ],
            [
                'name' => 'Singapore',
                'image_link' => 'images/place-1.jpg',
                'display' => 1
            ],
            [
                'name' => 'Lao',
                'image_link' => 'images/place-1.jpg',
                'display' => 1
            ],[
                'name' => 'Campuchia',
                'image_link' => 'images/place-1.jpg',
                'display' => 1
            ]
        ];

        DB::table('countries')->truncate();
        DB::table('countries')->insert($data);
    }
}
