@extends('welcome')
@section('content')

<nav aria-label="breadcrumb" class="breadcrumb-wrapper">
  <div class="container">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{URL::to('home')}}">Trang chủ</a></li>
      <li class="breadcrumb-item active" aria-current="page">Tìm kiếm sản phẩm</li>
    </ol>
  </div>
</nav>
<main class="section-padding shop-page-section">
  <div class="container">
    <div class="shop-toolbar mb--30">
      <div class="row align-items-center">
        <div class="col-5 col-md-3 col-lg-4">
          <!-- Product View Mode -->
          <div class="product-view-mode">
            <a href="#" class="sortting-btn active" data-target="list "><i class="fas fa-list"></i></a>
            <a href="#" class="sortting-btn" data-target="grid"><i class="fas fa-th"></i></a>
          </div>
        </div>
        <div class="col-12 col-md-9 col-lg-7 offset-lg-1 mt-3 mt-md-0  pr-md-0">
          <div class="sorting-selection">
            <div class="row align-items-center pl-md-0 pr-md-0 no-gutters">
              <h2>Kết quả tìm kiếm</h2>
            </div>
          </div>
        </div>

      </div>
    </div>
    <div class="shop-product-wrap grid with-pagination row border grid-four-column  mr-0 ml-0 no-gutters">
      @foreach($search_product as $key => $product)
      <div class="col-lg-3 col-sm-6">
        <div class="pm-product  ">
          <a href="{{URL::TO('/product-detail/'.$product->product_id)}}" class="image" tabindex="0">
            <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="">
          </a>
          <div class="hover-conents">
            <ul class="product-btns">

              <li><a href="#" data-toggle="modal" data-target="#quickModal" tabindex="0"><i class="ion-ios-search"></i></a></li>
            </ul>
          </div>
          <div class="content">
            <h3 class="font-weight-500"><a href="{{URL::TO('/product-detail/'.$product->product_id)}}">{{$product->product_name}}</a></h3>
            <div class="price text-red">
              <span class="old">{{$product->price_old}}</span>
              <span>{{$product->product_price}}</span>
            </div>
            <div class="btn-block grid-btn">
              <a href="cart.html" class="btn btn-outlined btn-rounded btn-mid" tabindex="0">Thêm vào giỏ</a>
            </div>
            <div class="card-list-content ">
              <div class="rating-widget mt--20">
                <a href="#" class="single-rating"><i class="fas fa-star"></i></a>
                <a href="#" class="single-rating"><i class="fas fa-star"></i></a>
                <a href="#" class="single-rating"><i class="fas fa-star"></i></a>
                <a href="#" class="single-rating"><i class="fas fa-star-half-alt"></i></a>
                <a href="#" class="single-rating"><i class="far fa-star"></i></a>
              </div>
              <article>
                <h3 class="d-none sr-only">Article</h3>
                <p>{{$product->product_desc}}</p>
              </article>
              <div class="btn-block d-flex">
                <a href="cart.html" class="btn btn-outlined btn-rounded btn-mid" tabindex="0">Thêm vào giỏ</a>

              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <div class="mt--30">
      <div class="pagination-widget">
        <div class="site-pagination">
          <a href="#" class="single-pagination">|&lt;</a>
          <a href="#" class="single-pagination">&lt;</a>
          <a href="#" class="single-pagination active">1</a>
          <a href="#" class="single-pagination">2</a>
          <a href="#" class="single-pagination">&gt;</a>
          <a href="#" class="single-pagination">&gt;|</a>
        </div>
      </div>

    </div>
  </div>
</main>

@endsection