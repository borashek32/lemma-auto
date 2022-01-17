<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->insert([
            [
                'address' => '142 770, Москва, посёлок Коммунарка, 317Ю',
                'phone'   => '+7 999 999 99 99',
                'map'     => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2255.733078547433!2d37.47421281592352!3d55.57184598050533!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x414aacdb4d5f27f3%3A0x4a342c607881ac7!2z0L_QvtGBLiDQmtC-0LzQvNGD0L3QsNGA0LrQsCwg0JzQvtGB0LrQstCwLCAxNDI3NzA!5e0!3m2!1sru!2sru!4v1622551770623!5m2!1sru!2sru" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy',
                'time'    => '11:00 - 20:00',
                'desc'    => 'офис, пункт выдачи по предварительному согласованию с менеджером'
            ],

            [
                'address' => '105 082, Москва, Переведеновский переулок 21с9',
                'phone'   => '+7 999 999 99 99',
                'map'     => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2243.689177094951!2d37.69037231580453!3d55.78126999726368!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46b53570b3066f0b%3A0x3e227912cc3cd007!2z0J_QtdGA0LXQstC10LTQtdC90L7QstGB0LrQuNC5INC_0LXRgC4sIDIx0YExLCDQnNC-0YHQutCy0LAsIDEwNTA4Mg!5e0!3m2!1sru!2sru!4v1622551888997!5m2!1sru!2sru" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy',
                'time'    => '11:00 - 20:00',
                'desc'    => 'офис, пункт выдачи по предварительному согласованию с менеджером'
            ],

            [
                'address'  => '142 770, Москва, Калужское шоссе, 34/2',
                'phone'    => '+7 999 999 99 99',
                'map'      => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2256.1850278452903!2d37.43713701579684!3d55.563977114006946!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x414aacb14190d569%3A0x3eb37db7ec80228f!2z0JrQsNC70YPQttGB0LrQvtC1INGILiwgMzQsINCh0L7RgdC10L3QutC4LCDQnNC-0YHQutC-0LLRgdC60LDRjyDQvtCx0LsuLCAxNDI3NzA!5e0!3m2!1sru!2sru!4v1622552037817!5m2!1sru!2sru" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy',
                'time'     => '11:00 - 20:00',
                'desc'     => 'офис, пункт выдачи по предварительному согласованию с менеджером'
            ]
        ]);
    }
}
