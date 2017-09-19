<?php

namespace App\Console\Commands\api1;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class SearchDestniations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api1:destinations {search}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Experimental Destinations search using a search token';

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
        $search = $this->argument('search');
        $content = Storage::get('results1.json');
        $data = json_decode($content);
        $records = collect($data);
        $filtered = $records->filter(function ($record, $key) use ($search) {
            return str_contains($record->destination_name, $search);
        })->sortByDesc('hotels_count')->take(5);
        if($filtered->count() < 5){
            $filteredByCountry = $records->filter(function ($record, $key) use ($search) {
                return str_contains($record->country_name, $search);
            })->sortByDesc('hotels_count')->take(5);
            $filtered = $filtered->merge($filteredByCountry);
        }
        $filtered = $filtered->where('hotels_count','>',0);
        dd($filtered);
    }
}
