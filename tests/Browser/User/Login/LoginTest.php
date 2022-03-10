<?php

namespace Tests\Browser\User\Login;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use App\Models\User;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create();
    }

    public function test_user_login_with_correct_credentials()
    {
        $user_email = User::OrderBy('id', 'DESC')->first()->email;
        $user_name  = User::OrderBy('id', 'DESC')->first()->name;
        
        $this->browse(function (Browser $browser) use($user_name, $user_email) {
            $browser->visit('/login')
                    ->type('#email', $user_email)
                    ->type('#password', 'password')
                    ->assertSee('Электронная почта')
                    ->press('ВОЙТИ')
                    ->assertSee('Добро пожаловать')
                    ->assertPathIs('/dashboard')
                    ->assertSee($user_name);
        });
    }
}
