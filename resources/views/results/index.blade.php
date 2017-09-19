@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{asset('tempassets/css/results.css')}}">
@endsection
@section('content')
    <div class="container" id="app">
        <h3><a href="{{route('main.home')}}">Back</a></h3>
        <div class="row">
            @foreach($hotels as $hotel)
                <div class="col-md-4">
                    <div style="height:480px" class="thumbnail">
                        <a href="{{route('main.result'). '?s=' . $searchCode . '&h=' . $hotel['code']}}">
                            <img style="height:300px" src="{{$hotel['thumbnail']}}"
                                 alt="" style="width:100%">
                            <div class="caption">
                                <h4>{{$hotel['name']}}</h4>
                                <h5>{{$hotel['stars']}} stars</h5>
                                <h5>{{$hotel['address']}}</h5>
                                <button class="btn btn-info">{{$hotel['price']}} USD</button>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection