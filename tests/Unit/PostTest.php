<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PostTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_get_all_posts_admin()
    {
        $user = User::make([
            'name'                => 'polina',
            'email'               => '456@inbox.ru',
            'password'            => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/ig2',
            'phone'               => '22222222222',
            'provider_id'         => '',
            'avatar'              => '',
            'status_id'           => 1,
            'margin'              => '',
            'email_verified_at'   => now(),
            'remember_token'      => Str::random(10),
        ]);
        $user->assignRole('super-admin');
        $response = $this->post('/login', [
            'name'                => 'polina',
            'email'               => '456@inbox.ru',
            'password'            => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/ig2',
            'phone'               => '22222222222',
            'provider_id'         => '',
            'avatar'              => '',
            'status_id'           => 1,
            'margin'              => '',
            'email_verified_at'   => now(),
            'remember_token'      => Str::random(10),
        ]);

        $hasUser = $user ? true : false;

        if($this->assertTrue($hasUser)) {
            $response = $this->get('/dashboard/posts');
            $response->assertStatus(200);
        }
    }
}
