<?php

namespace App\Console\Commands\api1;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CheckHotelImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api1:check-images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Prints the codes of hotels with no images and prints their count';

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
        $hotels = DB::table('hotels')->get();
        $count = 0;
        foreach ($hotels as $hotel) {
            $images = json_decode($hotel->data)->images;
            if (count($images) == 0) {
                echo $hotel->code, PHP_EOL;
                $count++;
            }
        }
        echo $count;
    }
}
