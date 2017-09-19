@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{asset('tempassets/css/home.css')}}">
@endsection
@section('content')

    <div id="app">
        <div class="container">
            <div class="jumbotron">
                <div class="row">
                    <div class="col-md-4">
                        <label class=>Where to</label>
                        <input placeholder="Destination or Country" autocomplete="off" id="search"
                               class="form-control" data-url="example">
                        <div id="search_suggestions" class="list-group hidden">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label>Checkin Date</label>
                        <input type="date" autocomplete="off" class="form-control" id="checkin">
                    </div>
                    <div class="col-md-3">
                        <label>Checkout Date</label>
                        <input disabled type="date" autocomplete="off" class="form-control" id="checkout">
                    </div>
                    <div class="col-md-2">
                        <label class="invisible">Search</label>
                        <button id="submit" disabled class="btn btn-success btn-block">Search</button>
                    </div>
                </div>
                <hr>
                <div id="rooms">

                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <button id="add_room" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Templates -->

    <div class="hidden">
        <div id="templates_room">
            <div class="row room" id="room_1">
                <div class="col-md-12 text-center">
                    <h5>room #1</h5>
                </div>
                <div class="col-md-2">
                    <label>Adults</label>
                    <select class="form-control" name="adults">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label>Children</label>
                    <select class="form-control" name="children">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <div class="hidden child_age">
                        <label>Child 1 Age</label>
                        <select class="form-control" data-index="0">
                            <option value="0"><1</option>
                            @for($i=1;$i<18;$i++)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="hidden child_age">
                        <label>Child 2 Age</label>
                        <select class="form-control" data-index="1">
                            <option value="0"><1</option>
                            @for($i=1;$i<18;$i++)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="col-md-1 hidden remove_room_container">
                    <label class="invisible">Remove</label>
                    <button class="btn btn-danger form-control remove_room pull-right">X</button>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script>
        window.urls = {
            suggestions: "{{route('main.search.suggestions')}}",
            top_suggestions: "{{route('main.search.top_suggestions')}}",
            results: "{{route('main.results')}}"
        };
        window.commonData = {
            topSuggestions: {!! $topSuggestions !!}
        }
    </script>
    <script src="{{asset('tempassets/js/home.js')}}"></script>
@endsection