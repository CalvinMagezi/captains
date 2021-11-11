<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'pin'            => '9999',
                'locale'         => '',
                'role'           => 'admin',
                'position'       => '',
                'unique_key'     => '',
                'phone_number'   => '',
            ],
        ];

        User::insert($users);

        //Staff Seeder

        DB::table('users')->insert([
            'name' => 'Sharon Adhiambo Oduor',
            'staff_number' => '42',
            'pin' => '8721',
            'position' => 'cashier',
            'role' => 'staff',

            'email' => 'sharon'.'@captains.com',
            'password' => bcrypt('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Anita Oneya Omuruli',
            'staff_number' => '40',
            'pin' => '1537',
            'color_code'   => '#7D3C98',
            'position' => 'waitress',
            'role' => 'staff',

            'email' => 'anita'.'@captains.com',
            'password' => bcrypt('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'George Morigo Mwangi',
            'staff_number' => '39',
            'position' => 'bartender',
            'pin' => '5111',
            'color_code' => '#F1C40F',
            'role' => 'staff',

            'email' => 'george'.'@captains.com',
            'password' => bcrypt('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Marylin Aluoch Odhiambo',
            'staff_number' => '38',
            'pin' => '1142',
            'position' => 'cashier',
            'role' => 'staff',

            'email' => 'marylin'.'@captains.com',
            'password' => bcrypt('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Moses Mbue Njoroge',
            'staff_number' => '35',
            'pin' => '8931',
            'position' => 'bartender',
            'role' => 'staff',

            'email' => 'mbae'.'@captains.com',
            'password' => bcrypt('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Esther Muya',
            'staff_number' => '34',
            'pin' => '6125',
            'position' => 'asst. accountant',
            'role' => 'staff',

            'email' => 'esther'.'@captains.com',
            'password' => bcrypt('password'),
        ]);


        DB::table('users')->insert([
            'name' => 'Shamim Aseda Onyango',
            'staff_number' => '29',
            'pin' => '5615',
            'position' => 'waitress',
            'color_code' => '#16A085',
            'role' => 'staff',

            'email' => 'shamim'.'@captains.com',
            'password' => bcrypt('password'),
        ]);


        DB::table('users')->insert([
            'name' => 'Kevin Otieno Olele',
            'staff_number' => '16',
            'pin' => '5251',
            'position' => 'restaurant manager',
            'role' => 'admin',

            'email' => 'kevin'.'@captains.com',
            'password' => bcrypt('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Shadrack Kilei Mweu',
            'staff_number' => '3',
            'position' => 'stockist',
            'pin' => '1212',

            'role' => 'admin',
            'email' => 'shadrack'.'@captains.com',
            'password' => bcrypt('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Mary Wambui Maingi',
            'staff_number' => '1',
            'pin' => '5252',

            'position' => 'restaurant supervisor',
            'role' => 'admin',
            'email' => 'mary'.'@captains.com',
            'password' => bcrypt('password'),
        ]);

        //Tech Team

        DB::table('users')->insert([
            'name' => 'Calvin',
            'role' => 'admin',
            'position' => 'Tech',
            'pin' => '0800',

            'email' => 'calvinmagezi@ymail.com',
            'password' => bcrypt('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Jack',
            'role' => 'admin',
            'position' => 'Tech',
            'pin' => '1800',

            'email' => 'jack@captains.com',
            'password' => bcrypt('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Clinton',
            'role' => 'admin',
            'position' => 'Tech',
            'pin' => '2800',

            'email' => 'clinton@captains.com',
            'password' => bcrypt('password'),
        ]);
    }
}
