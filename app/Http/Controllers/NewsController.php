<?php

namespace App\Http\Controllers;

use App\Models\City;

class NewsController extends Controller
{
    public function news($slug)
    {
        $city = City::where('slug', $slug)->firstOrFail();
        $news = $city->news;
        return view('news', compact('city', 'news'));
    }
}
