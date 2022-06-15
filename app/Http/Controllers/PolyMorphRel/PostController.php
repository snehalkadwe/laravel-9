<?php

namespace App\Http\Controllers\PolyMorphRel;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show(Post $post)
    {
        dd($post, $post->comments);
    }
}
