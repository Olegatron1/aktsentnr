<?php

namespace App\Http\Controllers;

use App\Models\City;

class AboutController extends Controller
{
    public function about()
    {
        $city = City::find(1);
        return view('about', compact('city'));
    }
}
