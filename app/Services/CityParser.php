<?php

namespace App\Services;

use App\Models\City;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class CityParser
{
    public function parseAndSaveCitiesFromAPI(): void
    {
        $response = Http::withOptions(['verify' => false])->get(config('services.hh_api.url'));

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
            throw new BadRequestHttpException(message: 'Failed to fetch data from API');
        }
    }

    protected function saveCities($areas): void
    {
        foreach ($areas as $area) {
            if (isset($area['name'])) {
                City::query()->create([
                    'name' => $area['name'],
                    'slug' => $this->generateSlug($area['name'])
                ]);
            }

            if (isset($area['areas'])) {
                $this->saveCities($area['areas']);
            }
        }
    }

    protected function generateSlug(string $name): string
    {
        return Str::slug($name);
    }
}
