<?php

namespace App\Console\Commands\api1;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ArrangeDestinationsApi1 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api1:combine-destinations';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Combines all the destination files located at storage/app/destinations into a single file storage/app/destinations.json';

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
        $fileNames = Storage::files('destinations');
        $destinations = [];
        foreach ($fileNames as $fileName) {
            $content = Storage::get($fileName);
            $fileDestinations = json_decode($content, 1);
            foreach ($fileDestinations as $destination) {
                $destinations[] = $destination;
            }
        }
        Storage::put('destinations.json', json_encode($destinations, JSON_PRETTY_PRINT));
    }
}
