<?php

namespace App\Services;

use App\Models\City;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class CityParser
{
    public function parseAndSaveCitiesFromAPI()
    {
        $response = Http::withOptions(['verify' => false])->get('https://api.hh.ru/areas');

        if ($response->successful()) {
            $areas = $response->json();
            foreach ($areas as $area) {
                if (isset($area['areas'])) {
                    $this->saveCities($area['areas']);
                } else {
                    $this->saveCities([$area]);
                }
            }
        } else {
            return 'error: Failed to fetch data from API';
        }
    }

    protected function saveCities($areas): void
    {
        foreach ($areas as $area) {
            if (isset($area['name'])) {
                City::create([
                    'name' => $area['name'],
                    'slug' => $this->generateSlug($area['name'])
                ]);
            }

            if (isset($area['areas'])) {
                $this->saveCities($area['areas']);
            }
        }
    }

    protected function generateSlug($name): string
    {
        return Str::slug($name);
    }
}

//php artisan cities:parse  запуск
