<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthTest extends TestCase
{
    public function test_user_can_register_with_valid_credentials()
    {
        $this->artisan('migrate:fresh --seed');
        $response = $this->post(route('register'), [
            'name'                  => 'nat',
            'email'                 => 'mail@mail.ru',
            'phone'                 => '10000000000',
            'password'              => '11111111',
            'password_confirmation' => '11111111',
            'status'                => '1',
        ]);
        $response = $this->assertDatabaseHas('users', [
            'name' => 'nat',
        ]);
    }

    public function test_user_can_login()
    {
        $response = $this->post(route('login'), [
            'email'     => 'mail@mail.ru',
            'password'  => '11111111'
        ]);
        $response->assertRedirect('/dashboard');
    }
}
