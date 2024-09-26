<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
            ['name' => 'Colombia'],
            ['name' => 'Argentina'],
            ['name' => 'Brasil'],
            ['name' => 'Chile'],
            ['name' => 'Perú'],
            ['name' => 'Ecuador'],
            ['name' => 'Venezuela'],
            ['name' => 'Uruguay'],
            ['name' => 'Paraguay'],
            ['name' => 'Bolivia'],
            ['name' => 'México'],
            ['name' => 'Panamá'],
            ['name' => 'Costa Rica'],
            ['name' => 'Guatemala'],
            ['name' => 'Honduras'],
            ['name' => 'El Salvador'],
            ['name' => 'Nicaragua'],
            ['name' => 'Cuba'],
            ['name' => 'República Dominicana'],
            ['name' => 'Puerto Rico']
        ]);
    }
}
