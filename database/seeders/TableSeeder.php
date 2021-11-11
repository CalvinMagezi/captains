<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\Table;

class TableSeeder extends Seeder



{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $path = public_path('sql/tables.sql');
        $sql = file_get_contents($path);
        DB::unprepared($sql);

    }
}
