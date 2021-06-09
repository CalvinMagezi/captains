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
            'name' => 'Sharon Adhiambo Oduor',
            'staff_number' => '42',
            'position' => 'cashier',
            'role' => 'staff',
            'email' => 'sharon'.'@captains.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Anita Oneya Omuruli',
            'staff_number' => '40',
            'position' => 'wait',
            'role' => 'staff',
            'email' => 'anita'.'@captains.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'George Morigo Mwangi',
            'staff_number' => '39',
            'position' => 'wait',
            'role' => 'staff',
            'email' => 'george'.'@captains.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Marylin Aluoch Odhiambo',
            'staff_number' => '38',
            'position' => 'cashier',
            'role' => 'staff',
            'email' => 'marylin'.'@captains.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Macdonald Ondigo Obondi',
            'staff_number' => '36',
            'position' => 'head chef',
            'role' => 'admin',
            'email' => 'macdonald'.'@captains.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Moses Mbae Njoroge',
            'staff_number' => '35',
            'position' => 'bartender',
            'role' => 'staff',
            'email' => 'mbae'.'@captains.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Esther Muya',
            'staff_number' => '34',
            'position' => 'asst. accountant',
            'role' => 'staff',
            'email' => 'esther'.'@captains.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'James Mutiso',
            'staff_number' => '33',
            'position' => 'steward',
            'role' => 'staff',
            'email' => 'james'.'@captains.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Simon Khachina Sakwa',
            'staff_number' => '32',
            'position' => 'cook',
            'role' => 'staff',
            'email' => 'simon'.'@captains.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Shamim Aseda Anyango',
            'staff_number' => '29',
            'position' => 'wait',
            'role' => 'staff',
            'email' => 'shamim'.'@captains.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Lawrence Muderema Jumba',
            'staff_number' => '27',
            'position' => 'sous-chef',
            'role' => 'staff',
            'email' => 'lawrence'.'@captains.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Benson Maingi Ndeti',
            'staff_number' => '24',
            'position' => 'steward',
            'role' => 'staff',
            'email' => 'benson'.'@captains.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Noel Imali Amolla',
            'staff_number' => '19',
            'position' => 'head waitress',
            'role' => 'admin',
            'email' => 'noel'.'@captains.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Joshua Muli Muange',
            'staff_number' => '18',
            'position' => 'steward',
            'role' => 'staff',
            'email' => 'joshua'.'@captains.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Moses Kyalo Musembi',
            'staff_number' => '17',
            'position' => 'cook',
            'role' => 'staff',
            'email' => 'moses'.'@captains.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Kevin Otieno Olele',
            'staff_number' => '16',
            'position' => 'restaurant manager',
            'role' => 'admin',
            'email' => 'kevin'.'@captains.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Eliud Maina Muthuri',
            'staff_number' => '10',
            'position' => 'cook',
            'role' => 'staff',
            'email' => 'eluid'.'@captains.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Shadrack Kilei Mweu',
            'staff_number' => '3',
            'position' => 'store keeper',
            'role' => 'admin',
            'email' => 'shadrack'.'@captains.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Mary Wambui Maingi',
            'staff_number' => '1',
            'position' => 'service supervisor',
            'role' => 'admin',
            'email' => 'mary'.'@captains.com',
            'password' => Hash::make('password'),
        ]);

        //Tech Team

        DB::table('users')->insert([
            'name' => 'Calvin Magezi',          
            'role' => 'admin',
            'email' => 'calvinmagezi@ymail.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Admin',          
            'role' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'staff',          
            'role' => 'staff',
            'email' => 'staff@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
