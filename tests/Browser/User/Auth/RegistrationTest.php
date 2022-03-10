<?php

namespace Tests\Browser\User\Auth;

// use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class RegistrationTest extends DuskTestCase
{
    // нельзя мигрировать бд после теста, потому что при регистрации уже
    // должна существовать таблица со статусами физ. или юр. лицо

    // use DatabaseMigrations;

    public function test_user_can_not_register_with_wrong_credentials()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                    ->type('#name', 'nataly')
                    ->type('#email', 'nataly')
                    ->type('#phone', '00000000000')
                    ->type('#password', '00000000')
                    ->type('#password_confirmation', '00000000')
                    ->assertSee('Электронная почта')
                    ->check('#status', '1')
                    ->press('РЕГИСТРАЦИЯ')
                    ->assertPathIs('/register');
        });
    }

    public function test_user_can_register_with_valid_credentials()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                    ->type('#name', 'Polina')
                    ->type('#email', Str::random(4) . '@' . Str::random(3) . '.' . Str::random(2))
                    ->type('#phone', rand(10000000, 1010000000))
                    ->type('#password', '00000000')
                    ->type('#password_confirmation', '00000000')
                    ->assertSee('Электронная почта')
                    ->check('#status', '1')
                    ->press('РЕГИСТРАЦИЯ')
                    ->assertPathIs('/dashboard');
        });
    }
}
