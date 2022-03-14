<?php

namespace Tests\Unit\Admin;

use Tests\TestCase;
use App\Models\User;
use App\Models\ModelHasRoles;
use App\Models\Faq;
use App\Models\Role;
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
}