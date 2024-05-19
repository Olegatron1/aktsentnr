<?php

namespace App\Http\Controllers;

use App\Services\CityService;
use Illuminate\Contracts\View\View;

final class NewsController extends Controller
{
    protected CityService $cityService;

    public function __construct(CityService $cityService)
    {
        $this->cityService = $cityService;
    }

    public function index(string $slug): View
    {
        $city = $this->cityService->findBySlugOrFail($slug);
        $news = $city->news;

        return view('news', compact('city', 'news'));
    }

}
