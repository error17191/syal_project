@extends('layouts.app')
@section('styles')
@endsection

@section('content')

    <div class="container" id="app">
        <button class="btn btn-success">Book</button>
    </div>

@endsection

@section('scripts')
<script>
    $('button').click(function (){
        $.ajax({
            data: {!! json_encode($hotel) !!} ,
            method: "post",
            url : "{{route('main.book')}}",
            success: function (){
                console.log("Success");
            },
            error: function (){
                console.log("Error");
            }
        });
    })
</script>
@endsection