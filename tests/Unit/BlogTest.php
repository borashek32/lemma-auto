<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Tag;
use App\Models\Post;
use Illuminate\Support\Str;
use App\Models\Category;

class BlogTest extends TestCase
{
    public function test_get_blog_page()
    {
        $posts = Post::all();

        $response = $this->get('/blog', [
            'posts' => $posts
        ]);
        $response->assertSee('Автоблог');
        $response->assertOk();
    }

    public function test_user_can_get_one_post_page()
    {
        $post_id  = random_int(1, Post::count());
        $post     = Post::where('id', $post_id)->first();
        
        $response = $this->get('/blog' . '/' . $post->slug);
        $response->assertSee($post->title);
        $response->assertOk();
    }

    public function test_user_can_get_one_category_page()
    {
        $category_id  = random_int(1, Category::count());
        $category     = Category::where('id', $category_id)->first();
        
        $response = $this->get('/blog/category' . '/' . $category->slug);
        $response->assertOk();
    }

    public function test_user_can_search_blog_posts_without_results()
    {
        $search = Str::random(10);
        
        $response = $this->get('/blog');
        $response = $this->get(route('blog'), [
            'search' => $search
        ]);
        
        $posts = Post::where('page_text', 'LIKE', "%{$search}%")
                ->orWhere('title', 'LIKE', "%{$search}%");

        $response = $this->get('/blog?search=' . $search);
        $response->assertSee($search);
    }

    public function test_user_can_search_blog_posts_by_title()
    {
        $post    = Post::where('id', 5)->first();
        $search  = $post->title;
        
        $posts = Post::where('page_text', 'LIKE', "%{$search}%")
                ->orWhere('title', 'LIKE', "%{$search}%");

        $response = $this->get('/blog?search=' . $search);
        $response->assertSee($search);
    }

    public function test_user_can_search_blog_posts_by_page_text()
    {
        $post    = Post::where('id', Post::count())->first();
        $body    = $post->page_text;
        $search  = mb_substr($body, 50, 6);

        $response = $this->get('/blog');
        $response = $this->get(route('blog'), [
            'search' => $search
        ]);
        
        $posts = Post::where('page_text', 'LIKE', "%{$search}%")
                ->orWhere('title', 'LIKE', "%{$search}%");

        $response = $this->get('/blog?search=' . $search, [
            'posts' => $posts
        ]);
        $response->assertStatus(200);
    }

    // package of tags behave strange during test
    // cuz of the names in database

    public function test_user_can_get_one_tag_page()
    {
        $response = $this->get('/blog/tag/one');
        $response->assertOk();
    }
}
