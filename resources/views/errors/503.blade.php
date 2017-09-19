@extends('page',['page_title' => trans('main.404.title'),
'title' => trans('main.404.title'),
'meta_desc' => trans('main.404.meta_desc'),
'meta_keywords' => trans('main.404.meta_keywords')])
@section('pcontent')
<!-- SECTION -->
<section class="section ">
    <div class="page-section-content overflow-hidden">
        <div class="container text-center not-found">
            <h3>Be right back.</h3>
            <div class="double-clear"></div>
            <h5>The web site is under maintenance</h5>
        </div>
    </div>
</section>
<!--! SECTION -->
@stop