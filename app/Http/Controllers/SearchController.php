<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Client;

class SearchController extends Controller
{
    public function home()
    {
        $topSuggestions = json_encode($this->getTopSuggestions());
        return view('home.home', compact('topSuggestions'));
    }

    public function suggestions(Request $request)
    {
        $prefix = mb_strtolower($request->input('query'));
        $codes = Redis::zrevrange('suggestions.' . $prefix, 0, 9);
        $records = [];
        foreach ($codes as $code) {
            $records[] = json_decode(Redis::hget('destinations', $code));
        }
        return $records;
    }

    public function topSuggestions()
    {
        return $this->getTopSuggestions();
    }

    public function results(Request $request)
    {
        $queryString = $this->buildQuery($request->all());
        $client = new Client();
        $response = $client->get('https://api-test.hotelspro.com/api/v2/search/', [
            'auth' => [
                'SyalTravel',
                'M1zwLEWftLwztqwL'
            ],
            'query' => $queryString

        ]);
        $apiData = json_decode($response->getBody()->getContents());
        $apiHotels = $apiData->results;
        $searchCode = $apiData->code;
        $hotels = [];
        foreach ($apiHotels as $apiHotel) {
            $hotelData = DB::table('hotels')->where('code', $apiHotel->hotel_code)->first();
            // Remove this line when provided with data for all hotels
            if (!$hotelData) continue;
            $hotelData = json_decode($hotelData->data);
            $product = collect($apiHotel->products)->sortBy('price')->first();
            $hotel = [];
            $hotel['price'] = $product->price;
            $hotel['code'] = $hotelData->code;
            $hotel['offer'] = $product->offer;
            $hotel['nonrefundable'] = $product->nonrefundable;
            $hotel['supports_cancellation'] = $product->supports_cancellation;
            $hotel['supports_cancellation'] = $product->supports_cancellation;
            $hotel['meal_type'] = $product->meal_type;
            $hotel['policies'] = $product->policies;
            $hotel['minimum_selling_price'] = $product->minimum_selling_price;
            $hotel['type'] = $hotelData->hotel_type;
            $hotel['name'] = $hotelData->name;
            $hotel['address'] = $hotelData->address;
            $hotel['stars'] = $hotelData->stars;
            $hotel['images'] = $hotelData->images;
            $hotel['thumbnail'] = $hotel['images'] && $hotel['images'][0] ? $hotel['images'][0]->thumbnail_images->large : '#';
            $hotels[] = $hotel;
        }
        return view('results.index', compact('hotels', 'searchCode'));
    }

    public function details(Request $request)
    {

        $searchCode = $request->input('s');
        $hotelCode = $request->input('h');

        $client = new Client();
        $response = $client->get('https://api-test.hotelspro.com/api/v2/hotel-availability/', [
            'auth' => [
                'SyalTravel',
                'M1zwLEWftLwztqwL'
            ],
            'query' => [
                'hotel_code' => $hotelCode,
                'search_code' => $searchCode
            ]

        ]);
        $apiResponse = $response->getBody()->getContents();
        $hotel = DB::table('hotels')->where('code', '=', $hotelCode)->first();
        $hotel = json_decode($hotel->data);
        if (!$hotel->images) $hotel->images = [];
        $hotel->searchCode = $searchCode;
        $hotel->results = json_decode($apiResponse)->results;
        return view('hotel.detail', compact('hotel'));
    }

    public function cart(Request $request)
    {
        $code = $request->input('s');
        $url = 'https://api-test.hotelspro.com/api/v2/provision/' . $code;
        $client = new Client();
        $response = $client->post($url, [
            'auth' => [
                'SyalTravel',
                'M1zwLEWftLwztqwL'
            ],
        ]);
        $hotel = json_decode($response->getBody()->getContents());
        return view('hotel.cart', compact('hotel'));

    }

    public function book(Request $request)
    {
        dd($request->all());
    }

    private function getTopSuggestions()
    {
        $topCodes = Redis::zrevrange('top_suggestions', 0, -1);
        $topRecords = [];
        foreach ($topCodes as $code) {
            $topRecords[] = json_decode(Redis::hget('destinations', $code));
        }
        return $topRecords;
    }

    private function buildQuery($searchData)
    {
        $searchData['currency'] = "USD";
        $searchData['client_nationality'] = 'eg';
        $searchData['destination_code'] = $searchData['destination'];
        unset($searchData['destination']);
        $pax = [];
        foreach ($searchData['rooms'] as $room) {
            $_pax = $room['adults'];
            if (isset($room['children_ages'])) {
                foreach ($room['children_ages'] as $child_age) {
                    $_pax .= ',' . $child_age;
                }
            }
            $pax[] = $_pax;
        }
        unset($searchData['rooms']);
        $searchData['pax'] = $pax;
        $query = http_build_query($searchData);
        $query = str_replace('%2C', ',', $query);
        $query = preg_replace('/%5B\d+%5D/', '', $query);
        return $query;
    }
}
