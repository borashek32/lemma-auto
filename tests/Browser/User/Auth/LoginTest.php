<?php

namespace Tests\Browser\User\Auth;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Dusk\Browser;
use App\Models\User;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    // public function setUp(): void
    // {
    //     parent::setUp();

    //     $user = User::factory()->create();
    // }

    public function test_user_can_not_login_with_wrong_credentials()
    {
        $user_email = User::OrderBy('id', 'DESC')->first()->email;
        $user_name  = User::OrderBy('id', 'DESC')->first()->name;
        
        $this->browse(function (Browser $browser) use($user_name, $user_email) {
            $browser->visit('/login')
                    ->type('#email', $user_email)
                    ->type('#password', 'passwordWrong')
                    ->assertSee('Электронная почта')
                    ->press('ВОЙТИ')
                    ->assertSee('Whoops! Something went wrong.')
                    ->assertPathIs('/login');
        });
    }

    public function test_user_can_login_with_correct_credentials()
    {
        $user_id       = random_int(1, 12);
        $user_email    = User::where('id', $user_id)->first()->email;
        $user_name     = User::where('id', $user_id)->first()->name;
        
        $this->browse(function (Browser $browser) use($user_name, $user_email) {
            $browser->visit('/login')
                    ->type('#email', $user_email)
                    ->type('#password', 'password')
                    ->press('ВОЙТИ')
                    ->assertPathIs('/dashboard')
                    ->assertSee($user_name);
        });
    }

    public function test_user_can_logout()
    {
        $user_id = random_int(1, 12);
        
        $this->browse(function ($browser) use($user_id) {
            $browser->loginAs(User::find($user_id))
                    ->visit('/logout')
                    ->logout()
                    ->assertGuest();
        });
    }
}
