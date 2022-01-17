<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            [
                'name'      => '{"ru": "one"}',
                'slug'      => '{"ru": "one"}'
            ],
            [
                'name'      => '{"ru": "two"}',
                'slug'      => '{"ru": "two"}'
            ],
            [
                'name'      => '{"ru": "three"}',
                'slug'      => '{"ru": "three"}'
            ],
            [
                'name'      => '{"ru": "four"}',
                'slug'      => '{"ru": "four"}'
            ],
            [
                'name'      => '{"ru": "five"}',
                'slug'      => '{"ru": "five"}'
            ],
            [
                'name'      => '{"ru": "six"}',
                'slug'      => '{"ru": "six"}'
            ],
            [
                'name'      => '{"ru": "seven"}',
                'slug'      => '{"ru": "seven"}'
            ],
            [
                'name'      => '{"ru": "eight"}',
                'slug'      => '{"ru": "eight"}'
            ],
            [
                'name'      => '{"ru": "nine"}',
                'slug'      => '{"ru": "nine"}'
            ],
            [
                'name'      => '{"ru": "ten"}',
                'slug'      => '{"ru": "ten"}'
            ],
        ]);
    }
}
