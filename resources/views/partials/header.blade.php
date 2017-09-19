<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--><html class="no-js"><!--<![endif]-->

<head>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>{{$title or trans('main.name')}}</title>
    <meta name="title" content="{{$title or trans('main.name')}}">
    <meta name="author" content="{{$meta_author or trans('main.author')}}">
    <meta name="description" content="{{$meta_desc or trans('main.description')}}">
    <meta name="keywords" content="{{trans('main.keywords')}} {{$meta_keywords or ''}}">

    <meta property="og:url" content="{{$fc_url or 'http://syal.com.sa/'}}"/>
    <meta property="og:title" content="{{$fc_title or trans('main.name')}}"/>
    <meta property="og:image" content="{{$fc_image or asset('frontend/images/logo-sm.png')}}"/>
    <meta property="og:image:width" content="{{$fc_image_width or '512' }}"/>
    <meta property="og:image:height" content="{{$fc_image_height or '512'}}"/>
    <meta property="og:site_name" content="{{$fc_site_name or trans('main.name')}}"/>
    <meta property="og:type" content="{{$fc_type or 'blog'}}"/>
    <meta property="og:description" content="{{$fc_description or trans('main.name')}} "/>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black"/>
    @include('partials.css')
    @yield('custom_css')
</head>
