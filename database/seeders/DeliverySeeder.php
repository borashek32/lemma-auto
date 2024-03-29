<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeliverySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('deliveries')->insert([
            [
                'title'         => 'транспортной компанией',
                'description'   => 'Крупногабаритные заказы доставляются только транспортными компаниями. Бесплатная доставка до транспортной компании.',
            ],

            [
                'title'         => 'курьером',
                'description'   => 'Доставка в пределах МКАД и по ближайшему Подмосковью осуществляется курьерской службой "Достависта". С актуальными тарифами вы можете ознакомиться на сайте Dostavista.ru. Вы всегда можете вызвать к нам курьера через данный сервис',
            ],
            [
                'title'         => 'самовывозом',
                'description'   => '1.

                11:00 - 20:00 - часы работы
                
                офис, пункт выдачи по предварительному согласованию с менеджером
                
                142 770, Москва, посёлок Коммунарка, 317Ю
                
                +7 916 917 46 30 - менеджер
                
                Карта проезда
                
                2.
                
                11:00 - 20:00
                
                офис, пункт выдачи по предварительному согласованию с менеджером
                
                 
                
                105 082, Москва, Переведеновский переулок 21с9
                
                Карта проезда
                
                3.
                
                11:00 - 20:00
                
                офис, пункт выдачи по предварительному согласованию с менеджером
                
                142 770, Москва, Калужское шоссе, 34/2
                
                +7 916 917 46 30 - менеджер
                
                Карта проезда',
            ],
        ]);
    }
}
