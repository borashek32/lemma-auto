<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Delivery;
use App\Models\Member;
use App\Models\Payment;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SiteTest extends TestCase
{
    public function test_user_can_get_delivery_page()
    {
        $deliveries = Delivery::all();

        $response = $this->get('/delivery', [
            'deliveries' => $deliveries
        ]);
        $response->assertSee('Доставка запасных частей:');
        $response->assertOk();
    }

    public function test_user_can_get_payment_page()
    {
        $payments = Payment::all();

        $response = $this->get('/payment', [
            'payments' => $payments
        ]);
        $response->assertSee('Оплата запасных частей:');
        $response->assertOk();
    }

    public function test_user_can_get_about_us_page()
    {
        $members = Member::get();

        $response = $this->get('/about-us', [
            'members' => $members
        ]);
        $response->assertSee('Наша команда');
        $response->assertOk();
    }

    public function test_only_authentificated_user_can_subscribe()
    {
        $response = $this->get('/');
        $response = $this->post(route('mailings.store'), [
            'email'   => 'mail@mail.ru'
        ]);
        $response->assertLocation('/login');
        $response->assertRedirect('/login');
    }

    public function test_any_user_can_order_call()
    {
        $response = $this->get('/faq');
        $response = $this->post(route('order-call'), [
            'name'   => 'Mike',
            'phone'  => '1111110011'
        ]);
        $response->assertValid(['name', 'phone']);
        $response->assertStatus(302);
        $response->assertRedirect('/faq')->with('success', 'Обратный звонок успешно заказан.');
        $response->assertLocation('/faq');
    }

    public function test_any_user_can_order_call_from_any_page()
    {
        $response = $this->get('/reviews');
        $response = $this->post(route('order-call'), [
            'name'   => 'Vadim',
            'phone'  => '44444477444'
        ]);
        $response->assertValid(['name', 'phone']);
        $response->assertStatus(302);
        $response->assertRedirect('/reviews')->with('success', 'Обратный звонок успешно заказан.');
        $response->assertLocation('/reviews');
    }

    public function test_any_user_can_ask_for_help()
    {
        $response = $this->get('/');
        $response = $this->post(route('contact-form'), [
            'name'     => 'Dave',
            'email'    => 'nataly@mail.ru',
            'message'  => '33300333399'
        ]);
        $response->assertValid(['name', 'email', 'message']);
        $response->assertStatus(302);
        $response->assertRedirect('/')->with('success', 'Ваше сообщение успешно отправлено.');
        $response->assertLocation('/');
    }

    public function test_any_user_can_ask_for_help_from_any_page()
    {
        $response = $this->get('/reviews');
        $response = $this->post(route('contact-form'), [
            'name'     => 'Jane',
            'email'    => 'nataly@mail.ru',
            'message'  => 'the first message'
        ]);
        $response->assertValid(['name', 'email', 'message']);
        $response->assertStatus(302);
        $response->assertRedirect('/reviews')->with('success', 'Ваше сообщение успешно отправлено.');
        $response->assertLocation('/reviews');
    }
}
