@if(Request::route()->getName() == 'tours.show')
<section class="parallax-window" style='background:url("{{ $image }}") !important;' data-parallax="scroll" data-image-src="{{$image or 'img/single_hotel_bg_1.jpg'}}" data-natural-width="1000" data-natural-height="470">
    <div class="parallax-content-2">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8">
                    <!--<span class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class=" icon-star-empty"></i></span>-->
                    <h1>{{ $page_title or 'صفحة'}}</h1>
                    <!--<span>Champ de Mars, 5 Avenue Anatole, 75007 Paris.</span>-->
                </div>
                @if(!empty($price))
                <div class="col-md-4 col-sm-4">
                    <div id="price_single_main" class="hotel">
                        @if($sale == 1)
                            <span>{{$sale_price}}<sup>{{trans('main.currency')}}</sup></span>
                            <span style="font-size: 30px;text-decoration: line-through;">{{$price}}<sup>{{trans('main.currency')}}</sup></span> للفرد
                        @else
                            <span>{{$price}}<sup>{{trans('main.currency')}}</sup></span> للفرد
                        @endif
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section><!-- End section -->
@else
    <section class="parallax-window" data-parallax="scroll" data-image-src="{{$image or 'img/single_hotel_bg_1.jpg'}}" data-natural-width="1400" data-natural-height="470">
        <div class="parallax-content-1">
            <div class="animated fadeInDown">
                <h1>{{ $page_title or 'صفحة'}}</h1>
                <p>{{ $page_desc or 'الوصف'}}</p>
            </div>
        </div>
    </section><!-- End section -->
@endif