<?php

namespace App\Http\Controllers\Guests;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function index()
    {
        $comics = config('comics');

        return view('home', compact('comics'));
    }

    public function comics()
    {
        $comics = config('comics.php');

        return view('comics', compact('comics'));
    }
}
