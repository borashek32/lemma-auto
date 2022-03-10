<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class UserLodinWrongCredentialsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create();
    }

    public function test_user_login_with_wrong_credentials()
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
}
