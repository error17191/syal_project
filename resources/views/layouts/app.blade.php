<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Syal B2B</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('tempassets/libs/bootstrap/css//bootstrap.min.css')}}" >
    <link rel="stylesheet" href="{{asset('tempassets/libs/font-awesome-4.7.0/css/font-awesome.min.css')}}" >
    @yield('styles')
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    @yield('head_scripts')
    <![endif]-->
</head>
<body>
@yield('content')
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{asset('tempassets/libs/bootstrap/js//bootstrap.min.js')}}"></script>
@yield('scripts')
</body>
</html>
