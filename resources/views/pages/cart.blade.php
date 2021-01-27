@extends('welcome')
@section('content')

<nav aria-label="breadcrumb" class="breadcrumb-wrapper">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL::TO('home')}}">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
        </ol>
    </div>
</nav>

<!-- Cart Page Start -->
<form action="{{URL::TO('/update-cart')}}" method="POST">
    {{ csrf_field() }}
    <div class="cart_area cart-area-padding sp-inner-page--top">
        <div class="container">
            <div class="page-section-title">
                <h1>GIỎ HÀNG</h1>
            </div>
            <div class="row">
                <div class="col-12">
                    
                        <!-- Cart Table -->
                        <?php
                        $content = Cart::content();
                        
                        ?>
                        {{-- echo '<pre>';
                                print_r($content);
                                echo '</pre>'; --}}
                        <div class="cart-table table-responsive mb--40">
                            <table class="table">
                                <!-- Head Row -->
                                <thead>
                                    <tr>
                                        <th class="pro-remove"></th>
                                        <th class="pro-thumbnail">Hình ảnh</th>
                                        <th class="pro-title">Sản phẩm</th>
                                        <th class="pro-price">Giá</th>
                                        <th class="pro-quantity">Số lượng</th>
                                        <th class="pro-subtotal">Tổng</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    @foreach($content as $v_content)
                                    <!-- Product Row -->
                                    <tr>
                                        <td class="pro-remove"><a href="{{URL::TO('/delete-cart/'.$v_content->rowId)}}"><i class="far fa-trash-alt"></i></a></td>
                                        <td class="pro-thumbnail"><a href="#"><img src="{{URL::to('public/uploads/product/'.$v_content->options->image)}}" alt="Product"></a></td>
                                        <td class="pro-title"><a href="#">{{$v_content->name}}</a></td>
                                        <td class="pro-price"><span>{{number_format($v_content->price,0,'.','.').'₫'}}</span></td>
                                        <td class="pro-quantity">
                                            <div class="pro-qty">

                                                    <input type="number" class="form-control text-center" name="quantity_cart" value="{{$v_content->qty}}">
                                                    <input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" class="form-control">
                                                
                                            </div>
                                        </td>
                                        <td class="pro-subtotal"><span>
                                                <?php
                                                $subtotal = $v_content->price * $v_content->qty;
                                                echo number_format($subtotal,0,'.','.').'₫';
                                                ?>
                                            </span></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    
                </div>
            </div>
        </div>
    </div>

    <div class="cart-section-2 sp-inner-page--bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12 mb--15">
                    <!-- slide Block 5 / Normal Slider -->
                    <div class="cart-block-title">
                        <h2>BẠN CÓ THỂ QUAN TÂM ĐẾN…</h2>
                    </div>
                    <div class="petmark-slick-slider border normal-slider arrow-type-two" data-slick-setting='{
                                    "autoplay": true,
                                    "autoplaySpeed": 3000,
                                    "slidesToShow": 3,
                                    "arrows": true
                            }' data-slick-responsive='[
                                    {"breakpoint":991, "settings": {"slidesToShow": 2} },
                                    {"breakpoint":768, "settings": {"slidesToShow": 1} }
                            ]'>
                        @foreach($all_product as $key => $product)
                        <div class="single-slide">
                            <div class="pm-product">
                                <div class="image">
                                    <a href="{{URL::TO('/product-detail/'.$product->product_id)}}"><img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt=""></a>

                                    <span class="onsale-badge">Giảm giá!</span>
                                </div>
                                <div class="content">
                                    <h3>{{$product->product_name}}</h3>
                                    <div class="price text-red">
                                        <span class="old">{{number_format($product->price_old,0,'.','.').'₫'}}</span>
                                        <span>{{number_format($product->product_price,0,'.','.').'₫'}}</span>
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

                <!-- Cart Summary -->
                <div class="col-lg-6 col-12 d-flex">
                    <div class="cart-summary">
                        <div class="cart-summary-wrap">
                            <h4><span>Tóm Tắt Giỏ Hàng</span></h4>
                            <p>Tổng <span class="text-primary">{{Cart::subtotal(0,'.','.').'₫'}}</span></p>
                            <p>Vận chuyển <span class="text-primary">Miễn phí</span></p>
                            <h2>Thành tiền <span class="text-primary">{{Cart::subtotal(0,'.','.').'₫'}}</span></h2>
                        </div>


                        <div class="cart-summary-button">
                            <?php
                                $customer_id = Session::get('customer_id');
                                if($customer_id != NULL) {
                            ?>
                            <a href="{{URL::TO('checkout')}}" class="checkout-btn c-btn">Thanh toán</a>
                            <?php
                                }else{
                            ?>
                            <a href="{{URL::TO('/login-checkout')}}" class="checkout-btn c-btn">Thanh toán</a>
                            <?php
                                }
                            ?>
                            <input type="submit" value="Cập nhật" name="update_qty" class="update-btn c-btn">
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection