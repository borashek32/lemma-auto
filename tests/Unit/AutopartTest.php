<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Law;
use App\Models\Advertisement;
use App\Models\Article;

class AutopartTest extends TestCase
{
    public function test_user_can_get_autopart_page()
    {
        $articles = Article::all();

        $response = $this->get(route('auto-parts'), [
            'articles' => $articles 
        ]);
        $response->assertSee('Автозапчасти по каталожному номеру');
        $response->assertOk();
    }

    public function test_user_can_get_laws_page()
    {
        $laws = Law::all();

        $response = $this->get('/laws', [
            'laws' => $laws
        ]);
        $response->assertSee('Условия гарантии на запасные части');
        $response->assertOk();
    }

    public function test_user_can_get_one_law_page()
    {
        $law_id     = random_int(1, 10);
        $law        = Law::where('id', $law_id)->first();

        $response = $this->get('/laws' . '/' . $law->slug, [
            'law' => $law
        ]);
        $response->assertSee($law->title);
        $response->assertOk();
    }

    public function test_user_can_get_partners_page()
    {
        $advertisements    = Advertisement::all();
        $advertisement_id  = random_int(1, 10);
        $advertisement     = Advertisement::where('id', $advertisement_id)->first();

        $response = $this->get('/partners', [
            'advertisements' => $advertisements
        ]);
        
        $response = $this->assertDatabaseHas('advertisements', [
            'banner'  =>  $advertisement->banner
        ]);
    }
}
