@extends('welcome')
@section('content')

<nav aria-label="breadcrumb" class="breadcrumb-wrapper">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL::TO('home')}}">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Shop</li>
        </ol>
    </div>
</nav>

<main class="section-padding shop-page-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-xl-9 order-lg-2 mb--40">
                <div class="shop-toolbar mb--30">
                    <div class="row align-items-center">
                        <div class="col-5 col-md-3 col-xl-4">
                            <!-- Product View Mode -->
                            <div class="product-view-mode">
                                <a href="#" class="sortting-btn" data-target="list "><i class="fas fa-list"></i></a>
                                <a href="#" class="sortting-btn  active" data-target="grid"><i class="fas fa-th"></i></a>
                            </div>
                        </div>
                        <div class="col-12 col-md-9 col-xl-8 mt-3 mt-md-0  pr-md-0">
                            <div class="sorting-selection">
                                <div class="row align-items-center pl-md-0 pr-md-0 no-gutters">
                                    <div class="col-sm-6 col-md-7 col-xl-8 d-flex align-items-center justify-content-md-end">

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="shop-product-wrap grid with-pagination row border grid-four-column  mr-0 ml-0 no-gutters">
                    @foreach($all_product as $key => $product)
                    <div class="col-lg-4 col-sm-6">
                        <div class="pm-product">
                            <a href="{{URL::TO('/product-detail/'.$product->product_id)}}">
                                <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="">
                            </a>

                            <div class="content">
                                <h3 class="font-weight-500"><a href="{{URL::TO('product-detail')}}">{{$product->product_name}}</a></h3>
                                <div class="price text-red">
                                    <span class="old">{{number_format($product->price_old,0,'.','.').'₫'}}</span>
                                    <span>{{number_format($product->product_price,0,'.','.').'₫'}}</span>
                                </div>
                                <div class="btn-block grid-btn">
                                    <a href="{{URL::TO('cart')}}" class="btn btn-outlined btn-rounded btn-mid">Thêm vào giỏ</a>
                                </div>
                                <div class="card-list-content ">
                                    <div class="rating-widget mt--20">
                                        <a href="#" class="single-rating"><i class="fas fa-star"></i></a>
                                        <a href="#" class="single-rating"><i class="fas fa-star"></i></a>
                                        <a href="#" class="single-rating"><i class="fas fa-star"></i></a>
                                        <a href="#" class="single-rating"><i class="fas fa-star"></i></a>
                                        <a href="#" class="single-rating"><i class="far fa-star"></i></a>
                                    </div>
                                    <article>
                                        <h2 class="sr-only d-none">Shop Post Articles</h2>
                                        <p>{{$product->product_desc}}</p>
                                    </article>
                                    <div class="btn-block d-flex">
                                        <a href="{{URL::TO('cart')}}" class="btn btn-outlined btn-rounded btn-mid">Thêm vào giỏ</a>
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
            <div class="col-lg-4 col-xl-3 order-lg-1">
                <div class="sidebar-widget">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">DANH MỤC</h2>
                        <ul class="sidebar-filter-list">
                            @foreach($category as $key => $cate)
                            <li><a href="{{URL::TO('/danh-muc-shop/'.$cate->category_id)}}" data-count="(5)">{{$cate->category_name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">LỌC GIÁ</h2>
                        <div class="range-slider pt--10">
                            <div class="pm-range-slider"></div>
                            <div class="slider-price">
                                <p>
                                    <input type="text" id="amount" readonly>
                                    <a href="#" class="btn btn--primary">Lọc</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">LỌC THEO GIÁ</h2>
                        @foreach($filter as $key => $product)
                        <a href="{{URL::TO('/product-detail/'.$product->product_id)}}" class="sidebar-product pm-product product-type-list">
                            <div class="image">
                                <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="">
                            </div>
                            
                            <div class="content">
                                <h3>{{$product->product_name}}</h3>
                                <div class="rating-widget">
                                    <span class="single-rating"><i class="fas fa-star"></i></span>
                                    <span class="single-rating"><i class="fas fa-star"></i></span>
                                    <span class="single-rating"><i class="fas fa-star"></i></span>
                                    <span class="single-rating"><i class="fas fa-star-half-alt"></i></span>
                                    <span class="single-rating"><i class="far fa-star"></i></span>
                                </div>
                                <div class="price text-red">
                                    <span class="old">{{number_format($product->price_old,0,'.','.').'₫'}}</span>
                                    <span>{{number_format($product->product_price,0,'.','.').'₫'}}</span>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>


                </div>
            </div>
        </div>
    </div>
</main>

@endsection