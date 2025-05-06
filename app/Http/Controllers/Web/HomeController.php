<?php

namespace App\Http\Controllers\Web;

use App\Models\Content;

class HomeController extends Controller
{
    public function index()
    {
        $contents = Content::all();
        return view('home', compact('contents'));
    }
}
