<?php

namespace Auth\Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class LoginTest extends DuskTestCase
{
    public function test_user_cannot_login_with_invalid_email()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('#email', '')
                    ->type('#password', 'password')
                    ->press('ВОЙТИ')
                    ->assertPathIs('/login');
        });
    }
    
    public function test_user_can_login_with_invalid_password()
    {
        $user_id       = random_int(2, 12);
        $user_email    = User::where('id', $user_id)->first()->email;

        $this->browse(function (Browser $browser) use($user_email) {
            $browser->visit('/login')
                    ->type('#email', $user_email)
                    ->type('#password', '')
                    ->press('ВОЙТИ')
                    ->assertPathIs('/login');
        });
    }
    
    public function test_user_can_login_with_valid_credentials()
    {
        $user_id       = random_int(2, 12);
        $user_name     = User::where('id', $user_id)->first()->name;
        $user_email    = User::where('id', $user_id)->first()->email;

        $this->browse(function (Browser $browser) use($user_email, $user_name) {
            $browser->visit('/login')
                    ->type('#email', $user_email)
                    ->type('#password', 'password')
                    ->press('ВОЙТИ')
                    ->assertSee('Панель управления')
                    ->assertSee($user_name);
        });
    }
}
