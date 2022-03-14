<?php

namespace Tests\Unit\Admin;

use Tests\TestCase;
use App\Models\User;
use App\Models\ModelHasRoles;
use App\Models\Faq;
use App\Models\Role;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class FaqTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $role       = Role::where('name', 'super-admin')->first();
        $admin_id   = ModelHasRoles::where('role_id', $role->id)->first()->model_id;
        $admin      = User::where('id', $admin_id)->first();

        $response = $this->actingAs($admin);
    }

    public function test_admin_can_get_review_page_on_dashboard()
    {
        $faqs = Faq::all();

        $response = $this->get('/dashboard/faqs', [
            'faqs' => $faqs
        ]);
        $response->assertStatus(200);
    }

    public function test_admin_can_get_create_faq_page()
    {
        $response = $this->get('/dashboard/faqs/create');
        $response->assertStatus(200);
    }

    public function test_admin_can_store_faq()
    {
        $faker      = Faker::create();
        $question   = $faker->words(5, true);
        $answer     = $faker->words(20, true);

        $response = $this->post(route('faqs.store'), [
            'question'       => $question,
            'answer'         => $answer,
            'user_id'        => 1
        ]);
        $response->assertLocation('/dashboard/faqs');
    }

    public function test_admin_can_get_edit_faq_page()
    {
        $faq_id = random_int(1, Faq::count());
        $faq    = Faq::where('id', $faq_id)->first();

        $response = $this->get(route('faqs.edit', $faq_id));
        $response->assertOk();
    }

    public function test_admin_can_update_faq()
    {
        $faqs   = Faq::all();
        $faq_id = random_int(1, Faq::count());
        $faq    = Faq::where('id', $faq_id)->first();

        $faker      = Faker::create();
        $question   = $faker->words(5, true);
        $answer     = $faker->words(20, true);

        $response = $this->put('/dashboard/faqs' . '/' . $faq->id, [
            'question'       => $question,
            'answer'         => $answer,
            'user_id'        => 1
        ]);
        // dd($response->status());
        $response->assertLocation('/dashboard/faqs');
        $response->assertRedirect(route('faqs.index'), [
            'faqs' => $faqs
        ]);
    }

    public function test_admin_can_delete_faq()
    {
        $faq_id = random_int(1, Faq::count());
        $faq    = Faq::where('id', $faq_id)->first();
        
        $faqs = Faq::all();

        $response = $this->delete(route('faqs.destroy', $faq->id));
        $response->assertLocation('/dashboard/faqs', [
            'faqs' => $faqs
        ]);
    }

    public function test_admin_can_search_faqs_by_question()
    {
        $faq_id    = random_int(1, Faq::count());
        $faq       = Faq::where('id', $faq_id)->first();
        $question  = $faq->question;
        $search    = mb_substr($question, 10, 10);
        
        $faqs = Faq::where('question', 'LIKE', "%{$search}%")
                ->orWhere('answer', 'LIKE', "%{$search}%");

        $response = $this->get('/dashboard/faqs?search=' . $search, [
            'faqs' => $faqs
        ]);
        $response->assertStatus(200);
        $response->assertSee($search);
    }

    public function test_admin_can_search_faqs_by_answer()
    {
        $faq_id    = random_int(1, Faq::count());
        $faq       = Faq::where('id', $faq_id)->first();
        $answer    = $faq->answer;
        $search    = mb_substr($answer, 10, 10);
        
        $faqs = Faq::where('question', 'LIKE', "%{$search}%")
                ->orWhere('answer', 'LIKE', "%{$search}%");

        $response = $this->get('/dashboard/faqs?search=' . $search, [
            'faqs' => $faqs
        ]);
        $response->assertStatus(200);
    }
}