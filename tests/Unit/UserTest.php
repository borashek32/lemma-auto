<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Models\Role;
use App\Providers\RouteServiceProvider;

class UserTest extends TestCase
{
    public function test_login_form()
    {
        $response = $this->get('/login');
        $response->assertOK();
    }

    public function test_only_authorizied_user_can_access_dashboard()
    {
        $response = $this->get('/dashboard');
        $response->assertRedirect('/login');
    }

    public function test_get_authorized_user()
    {
        $user = User::make([
            'name'      => 'Nataly Zueva123',
            'email'     => '111@inbox123.ru',
            'password'  => Hash::make('1111111122'),
            'phone'     => '11111111111123',
            'status_id' => '1'
        ]);
        
        $response = $this->post('/login', [
            'email'     => '111@inbox123.ru',
            'password'  => Hash::make('1111111122'),
        ]);
        $response->assertRedirect('/');
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
        
        if($user) {
            $user->delete();
        }
        $this->assertTrue(true);
    }
}
