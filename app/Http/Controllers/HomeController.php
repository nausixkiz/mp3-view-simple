<?php

namespace App\Http\Controllers;

use App\Music;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $musics = Music::all();
        return view('content.home', compact('musics'));
    }
}
