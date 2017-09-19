<?php

namespace App\Console\Commands\api1;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class CombineCountriesDestinations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api1:combine-search';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Combine the data of countries and destinations into a single file storage/app/results1.json';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $content = Storage::get('destinations.json');
        $destinations = collect(json_decode($content))->keyBy('code');
        $content = Storage::get('countries.json');
        $countries = collect(json_decode($content))->keyBy('code');
        $fileNames = Storage::files('hotels');
        $hotels = [];
        foreach ($fileNames as $fileName) {
            $content = Storage::get($fileName);
            $fileHotels = json_decode($content, 1);
            foreach ($fileHotels as $hotel) {
                $hotels[] = $hotel;
            }
        }
        $hotels = collect($hotels);
        $hotelResults = [];
        foreach ($hotels as $hotel) {
            $hotelRecord = [];
            $hotelRecord['name'] = $hotel->name;
            $hotelRecord['country_name'] = $hotel->country;
        }
        $hotels = collect($hotels)->keyBy('code')->groupBy('destination');
        $results = [];
        foreach ($destinations as $code => $destination) {
            $result = [];
            $result['destination_name'] = $destination->name;
            $result['destination_code'] = $destination->code;
            $result['country_name'] = $countries[$destination->country]->name;
            $result['country_code'] = $destination->country;
            $_hotels = $hotels->get($code);
            $result['hotels'] = $_hotels ? $_hotels->pluck('code') : [];
            $result['hotels_count'] = $_hotels ? $_hotels->count() : 0;
            $results[$code] = $result;
        }
        Storage::put('results1.json', json_encode(array_values($results), JSON_PRETTY_PRINT));
    }
}
