@extends('welcome')
@section('content')

<nav aria-label="breadcrumb" class="breadcrumb-wrapper">
  <div class="container">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{URL::TO('home')}}">Trang chủ</a></li>
      <li class="breadcrumb-item active" aria-current="page">Chi tiết sản phẩm</li>
    </ol>
  </div>
</nav>
<!-- Product Details Block -->
<main class="product-details-section">
  <div class="container">
    @foreach($product_details as $key => $value)
    <div class="pm-product-details">
      <div class="row">
        <!-- Blog Details Image Block -->
        <div class="col-md-6">
          <div class="image-block">
            <!-- Zoomable IMage -->
            <img id="zoom_03" src="{{URL::to('public/uploads/product/'.$value->product_image)}}" alt="" />

            <!-- Product Gallery with Slick Slider -->
            <div id="product-view-gallery" class="elevate-gallery">
              <!-- Slick Single -->
              <div class="gallary-item">
                <img src="{{URL::to('public/uploads/product/'.$value->product_image)}}" class="small-img" alt="" />
              </div>
              <!-- Slick Single -->
              <div class="gallary-item">
                <img src="{{URL::to('public/uploads/product/'.$value->product_image)}}" class="small-img" alt="" />
              </div>
              <!-- Slick Single -->
              <div class="gallary-item">
                <img src="{{URL::to('public/uploads/product/'.$value->product_image)}}" class="small-img" alt="" />
              </div>
              <!-- Slick Single -->
              <div class="gallary-item">
                <img src="{{URL::to('public/uploads/product/'.$value->product_image)}}" class="small-img" alt="" />
              </div>

            </div>
          </div>
        </div>
        <div class="col-md-6 mt-5 mt-md-0">
          <div class="description-block">
            <div class="header-block">
              <h3>{{$value->product_name}}</h3>
              <div class="navigation">
                <a href="#"><i class="ion-ios-arrow-back"></i></a>
                <a href="#"><i class="ion-ios-arrow-forward"></i></a>
              </div>
            </div>
            <!-- Rating Block -->
            <div class="rating-block d-flex  mt--10 mb--15">
              <div class="rating-widget">
                <a href="#" class="single-rating"><i class="fas fa-star"></i></a>
                <a href="#" class="single-rating"><i class="fas fa-star"></i></a>
                <a href="#" class="single-rating"><i class="fas fa-star"></i></a>
                <a href="#" class="single-rating"><i class="fas fa-star-half-alt"></i></a>
                <a href="#" class="single-rating"><i class="far fa-star"></i></a>
              </div>
              <p class="rating-text"><a href="#comment-form">(1 bình luận)</a></p>
            </div>
            <!-- Price -->
            <p class="price"><span class="old-price">{{number_format($value->price_old,0,'.','.').'₫'}}</span>{{number_format($value->product_price,0,'.','.').'₫'}}</p>
            <!-- Blog Short Description -->
            <div class="product-short-para">
              <p><span style="font-weight: bold;">Nguồn gốc:</span> {{$value->product_source}}</p>
            </div>
            <div class="product-short-para">
              <p><span style="font-weight: bold;">Đặc điểm ngoại hình:</span> {{$value->physical}}</p>
            </div>
            <div class="product-short-para">
              <p><span style="font-weight: bold;">Cân nặng:</span> {{$value->product_weight}}</p>
            </div>
            <div class="product-short-para">
              <p><span style="font-weight: bold;">Tuổi thọ:</span> {{$value->product_life}}</p>
            </div>
            <div class="product-short-para">
              <p><span style="font-weight: bold;">Giới tính:</span> {{$value->product_sex}}</p>
            </div>
            <div class="status">
              <i class="fas fa-check-circle"></i>CÒN HÀNG
            </div>
            <!-- Amount and Thêm vào giỏ -->
            <form action="{{URL::TO('/save-cart')}}" method="POST" class="add-to-cart">
              {{ csrf_field() }}
              <div class="count-input-block">
                <input type="number" min="1" name="qty" class="form-control text-center" value="1">
                <input name="productid_hidden" type="hidden" min="1" class="form-control text-center" value="{{$value->product_id}}">
              </div>
              <div class="btn-block">
                <button type="submit" class="btn btn-rounded btn-outlined--primary">Thêm vào giỏ</button>
              </div>
            </form>
            <!-- Wishlist And Compare -->

            <!-- Products Tag & Category Meta -->
            <div class="product-meta mt--30">
              <p>Danh mục: <a href="#" class="single-meta">{{$value->category_name}}</a></p>

            </div>
            <!-- Share Block 1 -->
            <div class="share-block-1">
              <ul class="social-btns">
                <li><a href="#" class="facebook"><i class="far fa-thumbs-up"></i><span>likes 1</span></a></li>
                <li><a href="#" class="twitter"><i class="fab fa-twitter"></i> <span>twitter</span></a></li>
                <li><a href="#" class="google"><i class="fas fa-plus-square"></i> <span>share</span></a></li>
              </ul>
            </div>
            <!-- Sharing Block 2 -->
            <div class="share-block-2  mt--30">
              <h4>Chia sẻ sản phẩm</h4>
              <ul class="social-btns social-btns-2">
                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <section class="review-section pt--60">
    <h2 class="sr-only d-none">Product Review</h2>
    <div class="container">

      <div class="product-details-tab">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">MÔ TẢ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">BÌNH LUẬN (1)</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <article>
              <h2 class="d-none sr-only">tab article</h2>
              <p>

                {!!$value->product_content!!}
              </p>
            </article>
          </div>
          @endforeach
          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="review-wrapper">
              <h2 class="title-lg mb--20">1 BÀI ĐÁNH GIÁ</h2>
              <div class="review-comment mb--20">
                <div class="avatar">
                  <img src="{{('public/frontend/image/author-logo.png')}}" alt="">
                </div>
                <div class="text">
                  <div class="rating-widget mb--15">
                    <span class="single-rating"><i class="fas fa-star"></i></span>
                    <span class="single-rating"><i class="fas fa-star"></i></span>
                    <span class="single-rating"><i class="fas fa-star"></i></span>
                    <span class="single-rating"><i class="fas fa-star-half-alt"></i></span>
                    <span class="single-rating"><i class="far fa-star"></i></span>
                  </div>
                  <h6 class="author">ADMIN – <span class="font-weight-400">24-01-2021</span> </h6>
                  <p>Good</p>
                </div>
              </div>
              <h2 class="title-lg mb--20 pt--15">THÊM MỘT BÀI ĐÁNH GIÁ</h2>
              <div class="rating-row pt-2">
                <p class="d-block">Xếp hạng của bạn</p>
                <span class="rating-widget-block">
                  <input type="radio" name="star" id="star1">
                  <label for="star1"></label>
                  <input type="radio" name="star" id="star2">
                  <label for="star2"></label>
                  <input type="radio" name="star" id="star3">
                  <label for="star3"></label>
                  <input type="radio" name="star" id="star4">
                  <label for="star4"></label>
                  <input type="radio" name="star" id="star5">
                  <label for="star5"></label>
                </span>
                <form action="" class="mt--15 site-form ">
                  <div class="row">
                    <div class="col-12">
                      <div class="form-group">
                        <label for="message">Bình luận</label>
                        <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label for="name">Tên *</label>
                        <input type="text" id="name" class="form-control">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label for="email">Email *</label>
                        <input type="text" id="email" class="form-control">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label for="website">Số điện thoại</label>
                        <input type="text" id="website" class="form-control">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="submit-btn">
                        <a href="#" class="btn btn-black">Đăng bình luận</a>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="pt--60">
      <div class="container">

        <div class="block-title">
          <h2>SẢN PHẨM LIÊN QUAN</h2>
        </div>
        <div class="petmark-slick-slider border normal-slider" data-slick-setting='{
                            "autoplay": true,
                            "autoplaySpeed": 3000,
                            "slidesToShow": 5,
                            "arrows": true
                        }' data-slick-responsive='[
                            {"breakpoint":991, "settings": {"slidesToShow": 3} },
                            {"breakpoint":480, "settings": {"slidesToShow": 1,"rows" :1} }
                        ]'>
          @foreach($relate as $key => $lienquan)
          <div class="single-slide">
            <div class="pm-product">
              <div class="image">
                <a href="{{URL::TO('/product-detail/'.$lienquan->product_id)}}"><img src="{{URL::to('public/uploads/product/'.$lienquan->product_image)}}" alt=""></a>
                <span class="onsale-badge">Giảm giá!</span>
              </div>
              <div class="content">
                <h3>{{$lienquan->product_name}}</h3>
                <div class="price text-red">
                  <span class="old">{{number_format($lienquan->price_old,0,'.','.').'₫'}}</span>
                  <span>{{number_format($lienquan->product_price,0,'.','.').'₫'}}</span>
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
  </section>
</main>

@endsection