<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name'      => 'Nataly Zueva',
                'email'     => 'borashek@inbox.ru',
                'password'  => Hash::make('11111111'),
                'phone'     => '11111111111'
            ],
            [
                'name'      => 'Vadim Zuev',
                'email'     => 'borashek88@gmail.com',
                'password'  => Hash::make('22222222'),
                'phone'     => '22222222222'
            ],
        ]);
    }
}
