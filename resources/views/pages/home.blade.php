@extends('welcome')
@section('content')

<section>
  <div class=" petmark-slick-slider  home-slider dot-position-1" data-slick-setting='{
        "autoplay": true,
        "autoplaySpeed": 8000,
        "slidesToShow": 1,
        "dots": true
    }'>
    <div class="single-slider home-content bg-image" style="background-image: url(public/frontend/image/slider-1.jpg);">
      <div class="container position-relative">
        <div class="row">
          <div class="col-lg-6">
            <h2>CHẤT LƯỢNG<br> TỐT NHẤT</h2>
            <h4 class="mt--30">100% chính chủ</h4>
            <div class="slider-btn mt--30">
              <a href="{{URL::TO('shop_detail')}}" class="btn btn-outlined--primary btn-rounded">Mua ngay</a>
            </div>

          </div>
        </div>

      </div>
      <span class="herobanner-progress"></span>
    </div>
    <div class="single-slider home-content bg-image" style="background-image: url(public/frontend/image/slider-2.jpg);">
      <div class="container position-relative">
        <div class="row">
          <div class="col-lg-6">
            <h3>Bạn bè & Gia đình</h3>
            <h1 class="text-primary">TIẾT KIỆM ĐẾN 25%</h1>
            <div class="slider-btn mt--30">
              <a href="{{URL::TO('shop_detail')}}" class="btn btn-outlined--primary btn-rounded">Mua ngay</a>
            </div>
          </div>
        </div>
      </div>
      <span class="herobanner-progress"></span>
    </div>
  </div>
</section>
<div class="container pt--50">
  <div class="policy-block border-four-column">
    <div class="row">
      <div class="col-lg-4 col-sm-6">
        <div class="policy-block-single">
          <div class="icon">
            <span class="ti-truck"></span>
          </div>
          <div class="text">
            <h3>Giao hàng miễn phí</h3>
            <p>Với đơn hàng trên 500.000đ</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6">
        <div class="policy-block-single">
          <div class="icon">
            <span class="ti-credit-card"></span>
          </div>
          <div class="text">
            <h3>Thanh toán</h3>
            <p>Thanh toán khi giao hàng</p>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-sm-6">
        <div class="policy-block-single">
          <div class="icon">
            <span class="ti-headphone-alt"></span>
          </div>
          <div class="text">
            <h3>Hỗ trợ miễn phí 24/7</h3>
            <p>Trực tuyến 24 giờ một ngày</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Slider One / Normal Two Column Slider -->
<section class="pt--50">
  <div class="container">
    <div class="block-title">
      <h2>SẢN PHẨM MỚI</h2>
    </div>
    <div class="petmark-slick-slider border normal-two-column-slider" data-slick-setting='{
                "autoplaySpeed": 3000,
                "slidesToShow": 2,
                "arrows": true
            }' data-slick-responsive='[
                {"breakpoint":991, "settings": {"slidesToShow": 1} },
                {"breakpoint":575, "settings": {"slidesToShow": 1} }
            ]'>
      @foreach($all_product as $key => $product)
      <div class="single-slide">
        <div class="pm-product product-type-list">
          <a href="{{URL::TO('/product-detail/'.$product->product_id)}}" class="image">
            <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="">
          </a>
          <div class="content">
            <h3 class="font-weight-500"> <a href="{{URL::TO('/product-detail/'.$product->product_id)}}">{{$product->product_name}}</a></h3>
            <div class="price text-red mb-3">
              <span class="old">{{$product->price_old}}</span>
              <span>{{$product->product_price}}</span>
            </div>
            <p>{{$product->product_desc}}</p>
            <div class="count-down-block">
              <div class="product-countdown" data-countdown="2020/05/01">
                <div class="single-countdown"><span class="single-countdown__time">00</span><span class="single-countdown__text">Days</span></div>
                <div class="single-countdown"><span class="single-countdown__time">00</span><span class="single-countdown__text">Hrs</span></div>
                <div class="single-countdown"><span class="single-countdown__time">00</span><span class="single-countdown__text">mins</span></div>
                <div class="single-countdown"><span class="single-countdown__time">00</span><span class="single-countdown__text">Secs</span></div>
              </div>
            </div>
          </div>
        </div>

      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- Promotion Block 1 -->
<section class="pt--50 space-db--30">
  <h2 class="d-none">Promotion Block
  </h2>
  <div class="container">
    <a class="promo-image overflow-image">
      <img src="{{('public/frontend/image/promo-product-image-huge.jpg')}}" alt="">
    </a>
  </div>
</section>
<!-- Slider Block Two -->
<div class="pt--50">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="block-title">
          <h2>SẢN PHẨM TRONG TUẦN</h2>
        </div>
        <!-- Two row Three Column Slider -->
        <div class="petmark-slick-slider border grid-column-slider" data-slick-setting='{
                            "autoplay": true,
                            "autoplaySpeed": 3000,
                            "slidesToShow": 3,
                            "rows" :2,
                            "arrows": true
                        }' data-slick-responsive='[
                            {"breakpoint":991, "settings": {"slidesToShow": 3} },
                            {"breakpoint":768, "settings": {"slidesToShow": 2} },
                            {"breakpoint":480, "settings": {"slidesToShow": 1,"rows" :1} }
                        ]'>
          @foreach($week_product as $key => $week)
          <div class="single-slide">
            <div class="pm-product">
              <div class="image">
                <a href="{{URL::TO('/product-detail/'.$week->product_id)}}"><img src="{{URL::to('public/uploads/product/'.$week->product_image)}}" alt=""></a>

                <span class="onsale-badge">Giảm giá!</span>
              </div>
              <div class="content">
                <h3>{{$week->product_name}}</h3>
                <div class="price text-red">
                  <span class="old">{{$week->price_old}}</span>
                  <span>{{$week->product_price}}</span>
                </div>
                <div class="btn-block">
                  <a href="cart.html" class="btn btn-outlined btn-rounded">Thêm vào giỏ</a>
                </div>
              </div>
            </div>
          </div>
          @endforeach

        </div>
      </div>
      <div class="col-lg-6 pt--50 pt-lg-0">
        <div class="block-title">
          <h2>SẢN PHẨM MỚI</h2>
        </div>
        <!--Two Row One Column Slider -->
        <div class="petmark-slick-slider border one-column-slider two-row" data-slick-setting='{
                            "autoplaySpeed": 3000,
                            "slidesToShow": 1,
                            "rows" :2,
                            "arrows": true
                        }' data-slick-responsive='[
                            {"breakpoint":991, "settings": {"slidesToShow": 1} },
                            {"breakpoint":575, "settings": {"slidesToShow": 1} }
                        ]'>
          @foreach($all_product as $key => $product)
          <div class="single-slide">
            <div class="pm-product product-type-list">
              <a href="{{URL::TO('/product-detail/'.$product->product_id)}}" class="image">
                <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="">
              </a>
              <div class="content">
                <h3>{{$product->product_name}}</h3>
                <div class="price text-red">
                  <span class="old">{{$product->price_old}}</span>
                  <span>{{$product->product_price}}</span>
                </div>
                <div class="rating-widget mt--20">
                  <a href="" class="single-rating"><i class="fas fa-star"></i></a>
                  <a href="" class="single-rating"><i class="fas fa-star"></i></a>
                  <a href="" class="single-rating"><i class="fas fa-star"></i></a>
                  <a href="" class="single-rating"><i class="fas fa-star-half-alt"></i></a>
                  <a href="" class="single-rating"><i class="far fa-star"></i></a>
                </div>
                <div class="btn-block">
                  <a href="cart.html" class="btn btn-outlined btn-rounded btn-mid">Thêm vào giỏ</a>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Promotion Block 2 -->
<section class="pt--50 space-db--30">
  <h2 class="d-none">Promotion Block
  </h2>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-4 col-md-4">
        <a class="promo-image overflow-image">
          <img src="{{('public/frontend/image/promo1.jpg')}}" alt="">
        </a>
      </div>
      <div class="col-lg-4 col-md-4">
        <a class="promo-image overflow-image  promo-small ">
          <img src="{{('public/frontend/image/promo2.jpg')}}" alt="">
        </a>
        <a class="promo-image overflow-image  promo-small ">
          <img src="{{('public/frontend/image/promo3.jpg')}}" alt="">
        </a>
      </div>
      <div class="col-lg-4 col-md-4">
        <a class="promo-image overflow-image">
          <img src="{{('public/frontend/image/promo4.jpg')}}" alt="">
        </a>
      </div>
    </div>
  </div>
</section>
<!-- Slider bLock 4 -->
<div class="pt--50">
  <div class="container">

    <div class="block-title">
      <h2>SẢN PHẨM TRONG THÁNG</h2>
    </div>
    <div class="petmark-slick-slider border grid-column-slider " data-slick-setting='{
    "autoplay": true,
    "autoplaySpeed": 3000,
    "slidesToShow": 5,
    "rows" :2,
    "arrows": true
}' data-slick-responsive='[
    {"breakpoint":991, "settings": {"slidesToShow": 3} },
    {"breakpoint":768, "settings": {"slidesToShow": 2} },
    {"breakpoint":480, "settings": {"slidesToShow": 1,"rows" :1} }
]'>
      @foreach($month_product as $key => $month)
      <div class="single-slide">
        <div class="pm-product">
          <div class="image">
            <a href="{{URL::TO('/product-detail/'.$month->product_id)}}"><img src="{{URL::to('public/uploads/product/'.$month->product_image)}}" alt=""></a>
            <div class="hover-conents">
              <ul class="product-btns">

                <li><a href="#" data-toggle="modal" data-target="#quickModal"><i class="ion-ios-search"></i></a></li>
              </ul>
            </div>
            <span class="onsale-badge">Giảm giá!</span>
          </div>
          <div class="content">
            <h3>{{$month->product_name}}</h3>
            <div class="price text-red">
              <span class="old">{{$month->price_old}}</span>
              <span>{{$month->product_price}}</span>
            </div>
            <div class="btn-block">
              <a href="{{URL::TO('cart')}}" class="btn btn-outlined btn-rounded">Thêm vào giỏ</a>
            </div>
          </div>
        </div>
      </div>
      @endforeach

    </div>
  </div>
</div>
<!-- slide Block 5 / Normal Slider -->

<!-- slide Block 3 / Normal Slider -->
<div class="pt--50 pb--50">
  <div class="container">

    <div class="petmark-slick-slider brand-slider  border normal-slider grid-border-none" data-slick-setting='{
                            "autoplay": true,
                            "autoplaySpeed": 3000,
                            "slidesToShow": 5,
                            "arrows": true
                        }' data-slick-responsive='[
                            {"breakpoint":991, "settings": {"slidesToShow": 4} },
                            {"breakpoint":768, "settings": {"slidesToShow": 3} },
                            {"breakpoint":480, "settings": {"slidesToShow": 2} },
                            {"breakpoint":320, "settings": {"slidesToShow": 1} }
                        ]'>

      <div class="single-slide">
        <a href="#" class="overflow-image brand-image">
          <img src="{{('public/frontend/image/brand.png')}}" alt="">
        </a>
      </div>
      <div class="single-slide">
        <a href="#" class="overflow-image brand-image">
          <img src="{{('public/frontend/image/brand-2.png')}}" alt="">
        </a>
      </div>
      <div class="single-slide">
        <a href="#" class="overflow-image brand-image">
          <img src="{{('public/frontend/image/brand-3.png')}}" alt="">
        </a>
      </div>
      <div class="single-slide">
        <a href="#" class="overflow-image brand-image">
          <img src="{{('public/frontend/image/brand-4.png')}}" alt="">
        </a>
      </div>
      <div class="single-slide">
        <a href="#" class="overflow-image brand-image">
          <img src="{{('public/frontend/image/brand-5.png')}}" alt="">
        </a>
      </div>
      <div class="single-slide">
        <a href="#" class="overflow-image brand-image">
          <img src="{{('public/frontend/image/brand-6.png')}}" alt="">
        </a>
      </div>
    </div>

  </div>
</div>

@endsection