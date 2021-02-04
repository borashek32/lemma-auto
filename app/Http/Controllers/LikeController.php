<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function getLike()
    {
        $this->post = Post::find($id);
    }
}
