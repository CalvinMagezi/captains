<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {                
        $this->call(UserSeeder::class);
        $this->call(TableSeeder::class);
        $this->call(SectionSeeder::class);
        $path = public_path('sql/items.sql');
        $sql = file_get_contents($path);
        DB::unprepared($sql);        
    }
}
