<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class HasmanyThroughRelController extends Controller
{
    public function  index()
    {
        dd(auth()->user()->goals);
    }

    public function show(Team $team)
    {
        dd($team, $team->goals);
    }
}
