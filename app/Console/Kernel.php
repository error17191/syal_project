<?php

namespace App\Console;

use App\Console\Commands\ArrangeDestinationsApi1;
use App\Console\Commands\ArrangeHotelsApi1;
use App\Console\Commands\CheckHotelImages;
use App\Console\Commands\CombineCountriesDestinations;
use App\Console\Commands\CombineHotelData;
use App\Console\Commands\MoveSuggestionsToRedis;
use App\Console\Commands\PrepareCache;
use App\Console\Commands\SearchDestinationsApi1;
use App\Console\Commands\SearchDestniations;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \App\Console\Commands\api1\ArrangeDestinationsApi1::class,
        \App\Console\Commands\api1\SearchDestinationsApi1::class,
        \App\Console\Commands\api1\ArrangeHotelsApi1::class,
        \App\Console\Commands\api1\CombineCountriesDestinations::class,
        \App\Console\Commands\api1\SearchDestniations::class,
        \App\Console\Commands\api1\CombineHotelData::class,
        \App\Console\Commands\api1\MoveSuggestionsToRedis::class,
        \App\Console\Commands\api1\CheckHotelImages::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
