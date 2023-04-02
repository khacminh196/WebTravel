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
                'code' => 'vi',
                'name' => 'Vietnam',
                'image_link' => 'images/place-1.jpg',
                'display' => 1
            ],
            [
                'code' => 'thai',
                'name' => 'Thailand',
                'image_link' => 'images/place-1.jpg',
                'display' => 1
            ],
            [
                'code' => 'lao',
                'name' => 'Lao',
                'image_link' => 'images/place-1.jpg',
                'display' => 1
            ],[
                'code' => 'cam',
                'name' => 'Campuchia',
                'image_link' => 'images/place-1.jpg',
                'display' => 1
            ]
        ];

        DB::table('countries')->truncate();
        DB::table('countries')->insert($data);
    }
}
