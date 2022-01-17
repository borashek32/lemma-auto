<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RequisiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('requisites')->insert([
            [
                'title'           => 'ООО «ЛЕММА-АВТО»',
                'legal_address'   => '111673, Москва г, Суздальская ул, дом № 12, корпус 1, квартира 35',
                'real_address'    => '111673, Москва г, Суздальская ул, дом № 12, корпус 1, квартира 35',
                'inn_kpp'         => '7720447162/772001001',
                'r_s'             => '40702810902410003279 в АО «АЛЬФА-БАНК»',
                'k_s'             => 'к\с 30101810200000000593',
                'bik'             => '044525593'
            ],
        ]);
    }
}
