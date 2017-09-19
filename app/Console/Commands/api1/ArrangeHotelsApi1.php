<?php

namespace App\Console\Commands\api1;

use Illuminate\Console\Command;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class ArrangeHotelsApi1 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api1:store-hotels';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Stores the hotels data in storage/app/hotels into mysql table hotels';

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
        $t = time();
        $fileNames = Storage::files('hotels');
        $insert = [];
        foreach ($fileNames as $fileName) {
            $content = Storage::get($fileName);
            $fileHotels = json_decode($content);
            foreach ($fileHotels as $hotel) {
                $record = [];
                $record['code'] = $hotel->code;
                $record['data'] = json_encode($hotel);
                $insert[] = $record;
            }
        }
        $total = count($insert);
        Schema::dropIfExists('hotels');
        Schema::create('hotels', function (Blueprint $table) {
            $table->string('code');
            $table->longText('data');
            $table->primary('code');
        });
        $hotelsSplited = collect($insert)->split(50);
        $count = 0;
        foreach ($hotelsSplited as $hotelsGroup) {
            DB::table('hotels')->insert($hotelsGroup->toArray());
            $count += $hotelsGroup->count();
            echo "{$count}/{$total} Hotels Inserted\n";
        }
        echo "Total time: ", (time() - $t), " sec";
    }
}
