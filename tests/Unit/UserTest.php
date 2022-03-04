<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_login_form()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    public function test_user_duplication()
    {
        $user1 = User::make([
            'name'                => 'nataly',
            'email'               => '123@inbox.ru',
            'password'            => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'phone'               => '11111111111',
            'status_id'           => 1
        ]);

        $user2 = User::make([
            'name'                => 'polina',
            'email'               => '456@inbox.ru',
            'password'            => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/ig2',
            'phone'               => '22222222222',
            'status_id'           => 1
        ]);

        $this->assertTrue($user1 != $user2);
    }

    public function test_user_delete()
    {
        $user = User::make([
            'name'                => 'polina',
            'email'               => '456@inbox.ru',
            'password'            => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/ig2',
            'phone'               => '22222222222',
            'status_id'           => 1
        ]);
        $user = User::where('id', $user->id);
        if($user) {
            $user->delete();
        }
        $this->assertTrue(true);
    }

    public function test_store_new_user()
    {
        $response = $this->post('/register', [
            'name'                => 'polina',
            'email'               => '456456@inbox.ru',
            'password'            => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/ig0',
            'phone'               => '22222222222',
            'status_id'           => 1
        ]);

        $response->assertRedirect('/');
    }
}
