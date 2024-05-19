<?php

namespace App\Http\Middleware;

use App\Services\CityService;
use Closure;
use Illuminate\Http\Request;

class SetCity
{
    protected $cityService;

    public function __construct(CityService $cityService)
    {
        $this->cityService = $cityService;
    }

    public function handle(Request $request, Closure $next)
    {
        $citySlug = $request->route('slug') ?? session('city_slug');

        if ($citySlug) {
            $city = $this->cityService->findBySlugOrFail($citySlug);
            session(['city_slug' => $city->slug]);
            view()->share('currentCity', $city);
        }

        return $next($request);
    }

}
