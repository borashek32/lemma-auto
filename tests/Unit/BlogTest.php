<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;

class BlogTest extends TestCase
{
    public function test_get_blog_page()
    {
        $response = $this->get('/blog');
        $response->assertSee('Автоблог');
        $response->assertOk();
    }

    public function test_user_can_get_one_post_page()
    {
        $post = Post::where('id', 1)->first();
        
        $response = $this->get('/blog' . '/' . $post->slug);
        $response->assertOk();
    }

    public function test_user_can_get_one_category_page()
    {
        $category = Category::where('id', 1)->first();
        
        $response = $this->get('/blog/category' . '/' . $category->slug);
        $response->assertOk();
    }

    // public function test_user_can_get_one_tag_page()
    // {
    //     $tag_id = random_int(1, 10);
    //     $tag = Tag::where('id', $tag_id)->first();

    //     $response = $this->get('/blog/tag' . '/' . $tag->name);
    //     $response->assertOk();
    // }
}
