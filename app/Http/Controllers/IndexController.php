<?php

namespace App\Http\Controllers;

use App\Models\City;

class IndexController extends Controller
{
    public function index()
    {
        $cities = City::all();
        return view('index', compact('cities'));
    }

    public function show($slug)
    {
        $city = City::where('slug', $slug)->firstOrFail();
        $news = $city->news;
        return view('news', compact('city', 'news'));
    }
}
