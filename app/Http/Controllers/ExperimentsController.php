<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Storage;

class ExperimentsController extends Controller
{
    public function testApi()
    {
        $client = new Client();
        $response = $client->get('https://api-test.hotelspro.com/api/v2/search/?currency=USD&client_nationality=id&pax=1&checkin=2017-12-25&checkout=2017-12-26&destination_code=19064', [
            'auth' => [
                'SyalTravel',
                'M1zwLEWftLwztqwL'
            ]
        ]);
        return $response->getBody()->getContents();
    }
}
