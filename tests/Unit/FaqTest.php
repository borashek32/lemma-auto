<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Faq;
use Illuminate\Support\Facades\Hash;

class FaqTest extends TestCase
{
    public function test_user_can_get_review_page()
    {
        $faqs = Faq::all();

        $response = $this->get('/faq', [
            'faqs' => $faqs
        ]);
        $response->assertStatus(200);
    }

    public function test_only_authentificated_user_can_post_faq_question()
    {
        $response = $this->get('/faq');
        $response = $this->assertGuest($guard = null);
        $response = $this->post(route('reviews-form'), array(
            'body'   => 'the first question about work of this site here'
        ));
        $response = $this->post('/login', [
            'email'    => 'borashek88@gmail.com',
            'password' => '22222222'
        ]);
        $response->assertLocation('/faq');
    }

    public function test_user_can_post_review()
    {
        $user = User::find(4);

        $response = $this->actingAs($user);
        $response = $this->post(route('faq-form'), [
            'user_id'     => $user->id,
            'question'    => 'the first question about work of this site here'
        ]);
        $response->assertLocation('/faq');
    }

    public function test_user_can_get_one_question_page()
    {
        $faq_id  = random_int(1, 10);
        $faq     = Faq::where('id', $faq_id)->first();
        
        $response = $this->get(route('faq') . '/' . $faq->slug);
        $response->assertOk();
    }
}
