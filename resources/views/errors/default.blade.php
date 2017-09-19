@extends('page',['page_title' => trans('main.404.title'),
'title' => trans('main.404.title'),
'meta_desc' => trans('main.404.meta_desc'),
'meta_keywords' => trans('main.404.meta_keywords')])
@section('pcontent')
<!-- SECTION -->
<section class="section ">
    <div class="page-section-content overflow-hidden">
        <div class="container text-center not-found">
            <h6>{{trans('main.404.head')}}</h6>
            <p>{{trans('main.404.paragraph')}}</p>
            <div class="double-clear"></div>
            <h1>404</h1>
            <div class="double-clear"></div>
        </div>
    </div>
</section>
<!--! SECTION -->
@stop