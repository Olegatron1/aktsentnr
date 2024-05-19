<?php

namespace App\Services;

use App\Models\City;
use Illuminate\Database\Eloquent\Collection;

class CityService
{
    public function findBySlugOrFail(string $slug): City
    {
        return City::where('slug', $slug)->firstOrFail();
    }

    public function getAllCities(): Collection
    {
        return City::all();
    }

}
