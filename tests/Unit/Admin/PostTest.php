<?php

namespace Tests\Unit\Admin;

use Tests\TestCase;
use App\Models\User;
use App\Models\ModelHasRoles;
use App\Models\Post;
use App\Models\Role;
use App\Models\Category;
use Faker\Factory as Faker;

class PostTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $role       = Role::where('name', 'super-admin')->first();
        $admin_id   = ModelHasRoles::where('role_id', $role->id)->first()->model_id;
        $admin      = User::where('id', $admin_id)->first();

        $response = $this->actingAs($admin);
    }

    public function test_admin_can_get_posts_page_on_dashboard()
    {
        $posts = Post::all();

        $response = $this->get('/dashboard/posts', [
            'posts' => $posts
        ]);
        $response->assertStatus(200);
    }

    public function test_admin_can_get_create_posts_page()
    {
        $response = $this->get('/dashboard/posts/create');
        $response->assertSee('Добавление нового поста');
        $response->assertStatus(200);
    }

    // public function test_admin_can_store_post()
    // {
    //     $faker       = Faker::create();
    //     $title       = $faker->words(5, true);
    //     $page_text   = $faker->words(20, true);
    //     $url         = $faker->word();
    //     $status      = $faker->randomElement(['active', 'inactive']);
    //     $category_id = $faker->randomElement(Category::pluck('id')->toArray());
        
    //     $post = $this->post(route('posts.store'), [
    //         'title'          => $title,
    //         'page_text'      => $page_text,
    //         'img'            => '/img/blog.jpg',
    //         'category_id'    => $category_id,
    //         'status'         => $status,
    //         'link'           => $url
    //     ]);
        
    //     $tags = [1,2,3,4,5,6,7,8,9,10];
    //     $post->attach($tags);
        
    //     $response->assertRedirect('/dashboard/posts');
    //     $response->assertSee('Управление постами');
    // }

    public function test_admin_can_delete_post()
    {
        $post_id = random_int(1, Post::count());
        $post    = Post::where('id', $post_id)->first();
        
        $posts = Post::all();

        $response = $this->delete(route('posts.destroy', $post->id));
        $response->assertLocation('/dashboard/posts', [
            'posts' => $posts
        ]);
    }

    public function test_admin_can_search_posts_by_title()
    {
        $post_id    = random_int(1, Post::count());
        $post       = Post::where('id', $post_id)->first();
        $title      = $post->title;
        $search     = mb_strstr($title, ' ', true);
        
        $posts = Post::where('title', 'LIKE', "%{$search}%")
                ->orWhere('page_text', 'LIKE', "%{$search}%");

        $response = $this->get('/dashboard/posts?search=' . $search, [
            'posts' => $posts
        ]);
        $response->assertStatus(200);
        $response->assertSee($search);
    }

    public function test_admin_can_search_posts_by_page_text()
    {
        $post_id    = random_int(1, Post::count());
        $post       = Post::where('id', $post_id)->first();
        $page_text  = $post->page_text;
        $search     = mb_substr($page_text, 2, 8);
        $url        = str_replace(' ', '+', $search);

        $posts = Post::where('title', 'LIKE', "%{$search}%")
                ->orWhere('page_text', 'LIKE', "%{$search}%");

        $response = $this->get('/dashboard/posts?search=' . $url, [
            'posts' => $posts
        ]);
        $response->assertStatus(200);
    }
}
