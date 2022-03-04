<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use App\Models\Law;
use App\Models\Faq;
use App\Models\User;

class SitePagesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_main_page()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_get_contacts_page()
    {
        $response = $this->get('/contact');
        $response->assertStatus(200);
    }

    public function test_get_partners_page()
    {
        $response = $this->get('/partners');
        $response->assertStatus(200);
    }

    public function test_get_laws_page()
    {
        $response = $this->get('/laws');
        $response->assertStatus(200);
    }

    public function test_get_one_law_page()
    {
        $law = Law::make([
            'title'        => 'alias in modi perferendis',
            'description'  => 'alias in modi perferendis alias in modi perferendis alias in modi perferendis',
            'link'         => 'http://127.0.0.1:8000/laws/ducimus-minus-possimus-facere',
            'slug'         => 'alias-in-modi-perferendis'
        ]);
        $law = Law::where('slug', $law->slug);
        if($law) {
            $response = $this->get('/laws/alias-in-modi-perferendis');
            $response->assertStatus(200);
        }
    }

    public function test_get_about_us_page()
    {
        $response = $this->get('/about-us');
        $response->assertStatus(200);
    }

    public function test_get_reviews_page()
    {
        $response = $this->get('/reviews');
        $response->assertStatus(200);
    }

    public function test_get_reviews_write_page()
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
        $user->assignRole('user');
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
            $response = $this->post('/reviews');
            $response->assertStatus(200);
        }
    }

    public function test_get_requisites_page()
    {
        $response = $this->get('/requisites');
        $response->assertStatus(200);
    }
    
    public function test_get_delivery_page()
    {
        $response = $this->get('/delivery');
        $response->assertStatus(200);
    }
    
    public function test_get_payment_page()
    {
        $response = $this->get('/payment');
        $response->assertStatus(200);
    }

    public function test_get_faq_page()
    {
        $response = $this->get('/faq');
        $response->assertStatus(200);
    }

    public function test_get_faq_write_page()
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
        $user->assignRole('user');
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
            $response = $this->post('/faq');
            $response->assertStatus(200);
        }
    }

    public function test_get_one_faq_page()
    {
        $faq = Faq::make([
            'user_id'    => '3',
            'question'   => 'alias in modi perferendis',
            'answer'     => 'dd($law->title);',
            'slug'       => 'alias-in-modi-perferendis'
        ]);
        $faq = Faq::where('slug', $faq->slug);
        if($faq) {
            $response = $this->get('/faq/alias-in-modi-perferendis');
            $response->assertStatus(200);
        }
    }
}
