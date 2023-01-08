<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
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
                'name' => 'Travel'
            ],
            [
                'name' => 'Tour'
            ],
            [
                'name' => 'Destination'
            ],
            [
                'name' => 'Drinks'
            ],
            [
                'name' => 'Foods'
            ],
        ];
        DB::table('categories')->truncate();
        DB::table('categories')->insert($data);
    }
}
