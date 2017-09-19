<?php

namespace App\Console\Commands\api1;

use Illuminate\Console\Command;

class CombineHotelData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api1:hotels-experiment';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Loads all hotels located in storage/app/hotels in a Collection for expermintation';

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
        
    }
}
