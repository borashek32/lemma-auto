<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('members')->insert([
            [
                'name'         => 'Зуев Вадим Вадимович',
                'photo'        => '/docs/director.png',
                'position'     => 'исполнительный директор компании ООО "Лемма-авто"',
                'phone'        => '+79267013882',
                'description'  => 'Занимается вопросами согласования поставок запасных
                                    частей, переговорами с оптовыми клиентами,
                                    а такж поиском новых поставщиков.',
            ],

            [
                'name'         => 'Баранова Наталья Петровна',
                'photo'        => '/docs/me.jpeg',
                'position'     => 'технический специалист',
                'phone'        => '+79169174630',
                'description'  => 'Занимается всеми техническими вопросами компании "Лемма-авто,
                                    а также ведением документооборота и разработкой сайта компании.',
            ],
        ]);
    }
}
