<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sections')->insert([
            'name' => 'main bar',
            'slug' => 'main-bar'
        ]);
        DB::table('sections')->insert([
            'name' => 'cocktail bar',
            'slug' => 'cocktail-bar'
        ]);
        DB::table('sections')->insert([
            'name' => 'kitchen',
            'slug' => 'kitchen'
        ]);
    }
}
