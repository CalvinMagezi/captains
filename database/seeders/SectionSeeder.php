<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            'name' => 'cocktail bar',
            'assigned_to' =>'free'
        ]);

        DB::table('sections')->insert([
            'name' => 'main bar',
            'assigned_to' =>'free'
        ]);

        DB::table('sections')->insert([
            'name' => 'kitchen',
            'assigned_to' =>'free'
        ]);
    }
}
