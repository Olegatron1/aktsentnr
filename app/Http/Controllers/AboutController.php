<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

final class AboutController extends Controller
{
    public function about(): View
    {
        return view('about');
    }

}

