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
        for($i=0; $i<=20; $i++){

            if($i % 2 == 0){
                DB::table('tables')->insert([            
                    'table_number' => $i+1,
                    'table_id' => $i.Str::random(4),
                    'section' => '1',
                    'position' => 'outside',
                    'status' => 'active',               
                ]);
            }else{
                DB::table('tables')->insert([            
                    'table_number' => $i+1,
                    'table_id' => $i.Str::random(4),
                    'section' => '1',
                    'position' => 'inside',
                    'status' => 'in-active',               
                ]);
            }

            
        }
        
    }
}
