<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

class AboutController
{

    public function index()
    {
        return view('about');
    }

    public function contact(){
        return view('contact');
    }


}
