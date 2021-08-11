<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

        //Staff Seeder

        DB::table('users')->insert([
            'first_name' => 'Sharon',
            'last_name' => 'Adhiambo Oduor',
            'staff_number' => '42',
            'pin' => '8721',
            'position' => 'cashier',
            'role' => 'staff',
            'email' => 'sharon'.'@captains.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'first_name' => 'Anita',
            'last_name' => 'Oneya Omuruli',
            'staff_number' => '40',
            'pin' => '1537',
            'color_code'   => '#7D3C98',
            'position' => 'waitress',
            'role' => 'staff',
            'email' => 'anita'.'@captains.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'first_name' => 'George',
            'last_name' => 'Morigo Mwangi',
            'staff_number' => '39',
            'position' => 'bartender',
            'pin' => '5111',
            'color_code' => '#F1C40F',
            'role' => 'staff',
            'email' => 'george'.'@captains.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'first_name' => 'Marylin',
            'last_name' => 'Aluoch Odhiambo',
            'staff_number' => '38',
            'pin' => '1142',
            'position' => 'cashier',
            'role' => 'staff',
            'email' => 'marylin'.'@captains.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'first_name' => 'Moses',
            'last_name' => 'Mbue Njoroge',
            'staff_number' => '35',
            'pin' => '8931',
            'position' => 'bartender',
            'role' => 'staff',
            'email' => 'mbae'.'@captains.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'first_name' => 'Esther Muya',
            'last_name' => 'Esther Muya',
            'staff_number' => '34',
            'pin' => '6125',
            'position' => 'asst. accountant',
            'role' => 'staff',
            'email' => 'esther'.'@captains.com',
            'password' => Hash::make('password'),
        ]);
     

        DB::table('users')->insert([
            'first_name' => 'Shamim',
            'last_name' => 'Aseda Onyango',
            'staff_number' => '29',
            'pin' => '5615',
            'position' => 'waitress',
            'color_code' => '#16A085',
            'role' => 'staff',
            'email' => 'shamim'.'@captains.com',
            'password' => Hash::make('password'),
        ]);


        DB::table('users')->insert([
            'first_name' => 'Kevin',
            'last_name' => 'Otieno Olele',
            'staff_number' => '16',
            'pin' => '5251',
            'position' => 'restaurant manager',
            'role' => 'admin',
            'email' => 'kevin'.'@captains.com',
            'password' => Hash::make('password'),
        ]);       

        DB::table('users')->insert([
            'first_name' => 'Shadrack',
            'last_name' => 'Kilei Mweu',
            'staff_number' => '3',
            'position' => 'stockist',
            'pin' => '1212',
            'role' => 'admin',
            'email' => 'shadrack'.'@captains.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'first_name' => 'Mary',
            'last_name' => 'Wambui Maingi',
            'staff_number' => '1',
            'pin' => '5252',
            'position' => 'restaurant supervisor',
            'role' => 'admin',
            'email' => 'mary'.'@captains.com',
            'password' => Hash::make('password'),
        ]);

        //Tech Team

        DB::table('users')->insert([
            'first_name' => 'Calvin',          
            'last_name' => 'Msimbo',          
            'role' => 'admin',
            'position' => 'Tech',
            'pin' => '0800',
            'email' => 'calvinmagezi@ymail.com',
            'password' => Hash::make('password'),
        ]);       

        DB::table('users')->insert([
            'first_name' => 'Jack',          
            'last_name' => 'Msimbo',          
            'role' => 'admin',
            'position' => 'Tech',
            'pin' => '1800',
            'email' => 'jack@captains.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'first_name' => 'Clinton',          
            'last_name' => 'Msimbo',          
            'role' => 'admin',
            'position' => 'Tech',
            'pin' => '2800',
            'email' => 'clinton@captains.com',
            'password' => Hash::make('password'),
        ]);
       
    }
    
}
