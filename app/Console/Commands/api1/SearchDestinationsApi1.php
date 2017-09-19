<?php

namespace App\Console\Commands\api1;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class SearchDestinationsApi1 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'search:destinations1 {search}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $content = Storage::get('destinations.json');
        $destinations = collect(json_decode($content));
        $results = $destinations->filter(function ($destination, $key) use ($search) {
            return str_contains($destination->name, $search);
        })->take(5);
        dd($results);
    }
}
