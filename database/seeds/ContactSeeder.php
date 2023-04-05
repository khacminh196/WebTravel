<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'address' => '25H1 Floor, Apartment of Le Huu Trac Burn Institute, Tan Trieu Ward, Thanh Tri District, Hanoi City, Vietnam',
            'phone' => '+84 362 525 299',
            'email' => 'contact@suenoasiatico.com',
            'website' => 'http://suenoasiatico.com/',
        ];

        DB::table('contact')->truncate();
        DB::table('contact')->insert($data);
    }
}
