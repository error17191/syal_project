@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{asset('tempassets/css/hotel_details.css')}}">
@endsection
@section('content')
    <div class="container" id="app">

        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                @foreach($hotel->images as $image)
                <li data-target="#myCarousel" data-slide-to="{{$loop->index}}" @if($loop->index ==0) class="active" @endif ></li>
                @endforeach
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                @foreach($hotel->images as $image)
                <div class="item @if($loop->index == 0) active @endif">
                    <img src="{{$image->original}}" alt="">
                </div>
                @endforeach
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>


        @foreach($hotel->results as $result)

        <div class="panel panel-default">
            <div class="panel-body">
                @foreach($result->rooms as $room)
                    <h5>{{$room->room_description}}</h5>
                    @if(!$loop->last)
                        <hr>
                    @endif
                @endforeach
                <a class="btn btn-success" href="{{route('main.cart').'?s=' . $result->code}}">
                    {{$result->price}}  USD
                </a>
            </div>
        </div>
        @endforeach

    </div>


@endsection