<?php

namespace Auth\Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use App\Models\User;

class RegisterTest extends DuskTestCase
{
    public function test_user_cannot_register_with_empty_email()
    {
        $faker      = Faker::create();
        $password   = $faker->password;
        $firstName  = $faker->name;

        $this->browse(function (Browser $browser) use($faker, $firstName, $password) {
            $browser->visit('/register')
                    ->type('#name', $firstName)
                    ->type('#email', '')
                    ->type('#phone', random_int(10000000000, 99999999999))
                    ->type('#password', $password)
                    ->type('#password_confirmation', $password)
                    ->check('#status', '1')
                    ->press('РЕГИСТРАЦИЯ')
                    ->assertPathIs('/register');   
        });
    }

    public function test_user_cannot_register_with_invalid_email()
    {
        $faker      = Faker::create();
        $password   = $faker->password;
        $firstName  = $faker->name;

        $this->browse(function (Browser $browser) use($faker, $firstName, $password) {
            $browser->visit('/register')
                    ->type('#name', $firstName)
                    ->type('#email', 'mail.ru')
                    ->type('#phone', random_int(10000000000, 99999999999))
                    ->type('#password', $password)
                    ->type('#password_confirmation', $password)
                    ->check('#status', '1')
                    ->press('РЕГИСТРАЦИЯ')
                    ->assertPathIs('/register');   
        });
    }

    public function test_user_can_register_with_valid_credentials()
    {
        $faker      = Faker::create();
        $password   = $faker->password;
        $firstName  = $faker->name;

        $this->browse(function (Browser $browser) use($faker, $firstName, $password) {
            $browser->visit('/register')
                    ->type('#name', $firstName)
                    ->type('#email', $faker->email)
                    ->type('#phone', random_int(10000000000, 99999999999))
                    ->type('#password', $password)
                    ->type('#password_confirmation', $password)
                    ->check('#status', '1')
                    ->press('РЕГИСТРАЦИЯ')
                    ->assertSee('Панель управления')
                    ->assertSee($firstName);
                    
        });
    }
}
