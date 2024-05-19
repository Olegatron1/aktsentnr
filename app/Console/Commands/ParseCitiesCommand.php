<?php

namespace App\Console\Commands;

use App\Services\CityParser;
use Illuminate\Console\Command;

final class ParseCitiesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cities:parse';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse and save cities from hhAPI';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $cityParser = new CityParser();
        $cityParser->parseAndSaveCitiesFromAPI();

        $this->info('Cities have been successfully parsed and saved.');

    }

}
