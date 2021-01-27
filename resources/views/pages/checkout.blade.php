@extends('welcome')
@section('content')

<nav aria-label="breadcrumb" class="breadcrumb-wrapper">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL::TO('home')}}">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Thanh toán</li>
        </ol>
    </div>
</nav>

<main id="content" class="page-section sp-inner-page checkout-area-padding space-db--20">
    <div class="container">
        <div class="row">
            <div class="col-12">

                <!-- Checkout Form s-->
                <div class="checkout-form">
                    <form action="{{URL::TO('/save-checkout-customer')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="row row-40">
                            <div class="col-12">
                                <h1 class="quick-title">THANH TOÁN</h1>
                                <!-- Slide Down Trigger  -->
                                <div class="checkout-quick-box">
                                    <p><i class="far fa-sticky-note"></i>Bạn không thể thanh toán nếu chưa đăng nhập <a href="javascript:" class="slide-trigger" data-target="#quick-login"> Nhấn vào đây để đăng nhập </a></p>
                                </div>
                                <!-- Slide Down Blox ==> Login Box  -->


                                <!-- Slide Down Trigger  -->

                            </div>
                            <div class="col-lg-7 mb--20">
                                <!-- Billing Address -->
                                <div id="billing-form" class="mb-40">
                                    <h4 class="checkout-title">ĐỊA CHỈ THANH TOÁN</h4>

                                    <div class="row">

                                        <div class="col-md-6 col-12 mb--20">
                                            <label>Họ *</label>
                                            <input type="text" placeholder="First Name" name="shipping_firstname">
                                        </div>

                                        <div class="col-md-6 col-12 mb--20">
                                            <label>Tên *</label>
                                            <input type="text" placeholder="Last Name" name="shipping_lastname">
                                        </div>

                                        <div class="col-12 col-12 mb--20">
                                            <label>Quốc gia*</label>
                                            <select class="nice-select" name="shipping_country">
                                                <option>Việt Nam</option>

                                            </select>
                                        </div>
                                        <div class="col-md-6 col-12 mb--20">
                                            <label>Địa chỉ Email *</label>
                                            <input type="email" placeholder="Email Address" name="shipping_email">
                                        </div>
                                        <div class="col-md-6 col-12 mb--20">
                                            <label>Số điện thoại*</label>
                                            <input type="text" placeholder="Phone number" name="shipping_phone">
                                        </div>



                                        <div class="col-12 mb--20">
                                            <label>Địa chỉ*</label>
                                            <input type="text" placeholder="Address line 1" name="shipping_addressone">
                                            <input type="text" placeholder="Address line 2" name="shipping_addresstwo">
                                        </div>


                                        <div class="col-md-6 col-12 mb--20">
                                            <label>Thành phố*</label>
                                            <input type="text" placeholder="Town/City" name="shipping_city">
                                        </div>

                                        <div class="col-12 mb--20 order-note-block mt--30">
                                            <label for="order-note">Ghi chú</label>
                                            <textarea id="order-note" name="shipping_note" cols="30" rows="10" class="order-note" placeholder="Note"></textarea>
                                        </div>

                                    </div>

                                </div>

                                <!-- Shipping Address -->

                            </div>
                            <?php
                            $content = Cart::content();
                            ?>
                            
                            <div class="col-lg-5">
                                <div class="row">

                                    <!-- Cart Total -->
                                    
                                    <div class="col-12">
                                        
                                        <div class="checkout-cart-total">
                                            <h2 class="checkout-title">ĐƠN HÀNG CỦA BẠN</h2>
                                            <h4>Sản phẩm <span>Tổng</span></h4>
                                            <?php
                                                $content = Cart::content();
                                            ?>
                                        
                                            <ul>
                                                @foreach($content as $v_content)
                                                <li><span class="left">{{$v_content->name}} x {{$v_content->qty}}</span><span class="right">
                                                <?php
                                                $subtotal = $v_content->price * $v_content->qty;
                                                echo number_format($subtotal,0,'.','.').'₫';
                                                ?></span></li>
                                                @endforeach
                                            </ul>

                                            <p>Tổng sản phẩm <span>{{Cart::subtotal(0,'.','.').'₫'}}</span></p>
                                            <p>Vận chuyển <span>Miễn phí</span></p>

                                            <h4>Tổng cộng <span>{{Cart::subtotal(0,'.','.').'₫'}}</span></h4>
                                            <div class="method-notice mt--25">
                                                
                                            </div>
                                            
                                            <button type="submit" name="sender" class="place-order w-100">Lưu thông tin</button>
                                        
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection