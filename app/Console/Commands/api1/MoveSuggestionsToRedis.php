<?php

namespace App\Console\Commands\api1;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;

class MoveSuggestionsToRedis extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api1:search-redis';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Loads all the data in storage/app/results1.json into redis for faster search suggestions';

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
        $records = collect(json_decode(Storage::get('results1.json')));
        $records = $records->where('hotels_count', '>', 0)->sortByDesc('hotels_count');
        $top = $records->take(10);
        foreach ($top as $record) {
            Redis::zadd('top_suggestions', $record->hotels_count, $record->destination_code);
        }
        foreach ($records as $record) {
            for ($i = 0; $i <= mb_strlen($record->destination_name); $i++) {
                $prefix = mb_substr($record->destination_name, 0, $i);
                Redis::zadd('suggestions.' . mb_strtolower($prefix), $record->hotels_count, $record->destination_code);
                if (!Redis::hexists('destinations', $record->destination_code)) {
                    Redis::hset('destinations', $record->destination_code, json_encode($record));
                }
            }
            for ($i = 0; $i <= mb_strlen($record->country_name); $i++) {
                $prefix = mb_substr($record->country_name, 0, $i);
                Redis::zadd('suggestions.' . mb_strtolower($prefix), $record->hotels_count, $record->destination_code);
                if (!Redis::hexists('destinations', $record->destination_code)) {
                    Redis::hset('destinations', $record->destination_code, $record);
                }
            }
        }
    }
}
