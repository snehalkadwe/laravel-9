<?php

namespace App\Http\Controllers\PolyMorphRel;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function show(Video $video)
    {
        dd($video, $video->comments);
    }
}
