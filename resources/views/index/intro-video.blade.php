<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"><!--<![endif]-->
<head>
    <meta charset="utf-8">
    <!--[if IE]>
    <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>{{$title or trans('main.name')}}</title>
    <meta name="title" content="{{$title or trans('main.name')}}">
    <meta name="author" content="{{$meta_author or trans('main.author')}}">
    <meta name="description" content="{{$meta_desc or trans('main.description')}}">
    <meta name="keywords" content="{{trans('main.keywords')}} {{$meta_keywords or ''}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black"/>
    <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!--[if lt IE 9]>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
    <!-- Googl Font -->
    <link href="http://fonts.googleapis.com/css?family=Droid+Arabic+Naskh" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Droid+Arabic+Kufi" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:100,400,600,700,300" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,300italic,400italic" rel="stylesheet"
          type="text/css">
    <link rel="stylesheet" type="text/css" href="{{url('assets/frontend/css/reset.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/frontend/css/intro-style.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/frontend/css/style-video.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/frontend/css/video.css')}}"/>
</head>
<body class="responsive preload" style="direction: rtl;">
    <div class="all_content">
        <section class="cd-intro video">
            <div class="cd-intro-content video">
                <div class="cd-bg-video-wrapper" data-video="assets/videos/hendawy_hd">
                    <!-- video element will be loaded using jQuery -->
                </div>
            </div>
            <a style="padding: 15px;text-align: center;font-family: 'Droid Arabic Kufi', Helvetica, Georgia, Times, serif" href="{{route('frontend')}}" class="super-button">{{trans('main.enter')}}</a>
            <div class="button-line left">
                <div class="inner"></div>
            </div>
            <div class="button-line right">
                <div class="inner"></div>
            </div>
        </section>
    </div>
{{--<div class="all_content">
    <section class="section" style="display:none;">
        <section class="cd-intro">
            <div class="cd-intro-content scale">
                <img class="intro-logo-scale" style="" src="{{url('assets/frontend/images/logo.png')}}">
            </div>
        </section>
        <a style="padding: 25px;text-align: center;font-family: 'Droid Arabic Kufi', Helvetica, Georgia, Times, serif" href="{{route('frontend')}}" class="super-button">{{trans('main.enter')}}</a>
        <div class="button-line left">
            <div class="inner"></div>
        </div>
        <div class="button-line right">
            <div class="inner"></div>
        </div>
    </section>
</div>--}}
<script src="{{url('assets/frontend/js/core/jquery-2.1.1.min.js')}}"></script>
<script src="{{url('assets/frontend/js/video.js')}}"></script>
</body>