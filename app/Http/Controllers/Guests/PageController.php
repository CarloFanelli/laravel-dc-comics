<?php

namespace App\Http\Controllers\Guests;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $comics = config('comics');

        return view('index', compact('comics'));
    }

    public function comics()
    {
        $comics = config('comics.php');

        return view('comics', compact('comics'));
    }
}
