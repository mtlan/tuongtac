@extends('welcome')
@section('content')
<div class="container">
        <div class="block-title">
            <h2>SẢN PHẨM MỚI</h2>
        </div>
        <!-- <div class="petmark-slick-slider border normal-two-column-slider"
            data-slick-setting='{
                "autoplaySpeed": 3000,
                "slidesToShow": 2,
                "arrows": true
            }'
            data-slick-responsive='[
                {"breakpoint":991, "settings": {"slidesToShow": 1} },
                {"breakpoint":575, "settings": {"slidesToShow": 1} }
            ]'>
            @foreach($all_product as $key => $product)
            <div class="single-slide">
                <div class="pm-product product-type-list">
                    <a href="product-details.html" class="image">
                        <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="">
                    </a>
                    <div class="content">
                       <h3 class="font-weight-500"> <a href="">{{$product->product_name}}</a></h3>
                        <div class="price text-red mb-3" >
                            <span class="old">248.000 ₫</span>
                            <span>{{$product->product_price}}</span>
                        </div>
                        <p >{{$product->product_desc}}</p>
                        <div class="count-down-block">
                            <div class="product-countdown" data-countdown="2020/05/01">
                            <div class="single-countdown"><span class="single-countdown__time">00</span><span class="single-countdown__text">Days</span></div><div class="single-countdown"><span class="single-countdown__time">00</span><span class="single-countdown__text">Hrs</span></div><div class="single-countdown"><span class="single-countdown__time">00</span><span class="single-countdown__text">mins</span></div><div class="single-countdown"><span class="single-countdown__time">00</span><span class="single-countdown__text">Secs</span></div></div>
                        </div>
                    </div>
                </div>

            </div>
            @endforeach  
        </div> -->
    </div>
@endsection
