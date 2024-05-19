<?php

namespace App\Http\Controllers;

use App\Services\CityService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    protected CityService $cityService;

    public function __construct(CityService $cityService)
    {
        $this->cityService = $cityService;
    }

    public function redirectToCity(Request $request): View|Application|Factory|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        if (session()->has('city_slug')) {
            return redirect()->route('city.show', ['slug' => session('city_slug')]);
        }

        $cities = $this->cityService->getAllCities();

        return view('index', compact('cities'));
    }

    public function show(string $slug): View
    {
        $cities = $this->cityService->getAllCities();
        $city = $this->cityService->findBySlugOrFail($slug);

        return view('city', compact('cities', 'city'));
    }

}

