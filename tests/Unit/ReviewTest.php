<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Review;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReviewTest extends TestCase
{
    public function test_user_can_access_review_page()
    {
        $reviews = Review::all();

        $response = $this->get('/reviews', [
            'reviews' => $reviews
        ]);
        $response->assertStatus(200);
    }

    public function test_only_authentificated_user_can_post_review()
    {
        $response = $this->get('/reviews');
        $response = $this->assertGuest($guard = null);
        $response = $this->post('/reviews', array(
            'body'   => 'the first review here'
        ));
        $response->assertRedirect('/login');
    }

    public function test_user_can_post_review()
    {
        $user_id = random_int(1, 12);
        $user    = User::where('id', $user_id)->first();
        
        $response = $this->actingAs($user);
        $response = $this->get('/reviews');
        $response = $this->post('/reviews', [
            'user_id' => $user_id,
            'body'    => 'the first review here'
        ]);
        $response->assertLocation('/reviews');
    }
}
