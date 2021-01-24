<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('public/frontend/css/plugins.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/main.css')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('public/frontend/css/favicon.ico')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/fontawesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/themify-icons.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/ionicons.min.css')}}">

    <title>PetMark - Thú cưng mang đến niềm vui</title>
</head>

<body class="">
    <script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD"></script>

    <script>
        // Render the PayPal button into #paypal-button-container
        paypal.Buttons({

            // Set up the transaction
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '88.44'
                        }
                    }]
                });
            },

            // Finalize the transaction
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    // Show a success message to the buyer
                    alert('Transaction completed by ' + details.payer.name.given_name + '!');
                });
            }


        }).render('#paypal-button-container');
    </script>
    <div class="site-wrapper">
        <header class="header petmark-header-1">
            <div class="header-wrapper">
                <!-- Site Wrapper Starts -->
                <div class="header-top bg-ash">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-sm-6 text-center text-sm-left">
                                <p class="font-weight-300">Chào mừng đến shop thú cưng</p>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="header-middle">
                    <div class="container">
                        <div class="row align-items-center justify-content-center">
                            <!-- <-- Template Logo -->
                            <div class="col-lg-3 col-md-12 col-sm-4">
                                <div class="site-brand  text-center text-lg-left">
                                    <a href="{{URL::TO('home')}}" class="brand-image">
                                        <img src="{{('public/frontend/image/main-logo.png')}}" alt="">
                                    </a>
                                </div>
                            </div>
                            <!-- Category With Search -->
                            <div class="col-lg-5 col-md-7 order-3 order-md-2">
                                <form action="{{URL::to('/tim-kiem')}}" method="POST" class="category-widget">
                                    {{csrf_field()}}
                                    <input type="text" name="keywords_submit" placeholder="Tìm kiếm sản phẩm ">
                                    <button type="submit" name="search-items" class="search-submit"><i class="fas fa-search"></i></button>
                                </form>
                            </div>
                            <!-- Call Login & Track of Order -->
                            <div class="col-lg-4 col-md-5 col-sm-8 order-2 order-md-3">
                                <div class="header-widget-2 text-center text-sm-right ">
                                    <div class="call-widget">
                                        <p>GỌI CHO TÔI: <i class="icon ion-ios-telephone"></i><span class="font-weight-mid">+91-012
                                                345 678</span></p>
                                    </div>
                                    <ul class="header-links">
                                        <li><a href="{{URL::TO('show-cart')}}"><i class="fas fa-car-alt"></i> Theo dõi đơn hàng</a></li>
                                        <?php
                                            $customer_id = Session::get('customer_id');
                                            if($customer_id != NULL) {

                                        ?>
                                        <li><a href="{{URL::TO('/my-account')}}"><i class="fas fa-user"></i> Đăng xuất</a></li>
                                        <?php
                                            }else{
                                        ?>
                                        <li><a href="{{URL::TO('login-checkout')}}"><i class="fas fa-user"></i> Đăng nhập</a></li>
                                        <?php
                                            }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="header-nav-wrapper">
                <div class="container">
                    <div class="header-bottom-inner">
                        <div class="row no-gutters">
                            <!-- Category Nav -->
                            <div class="col-lg-3 col-md-8">
                                <!-- Category Nav Start -->
                                <div class="category-nav-wrapper bg-blue">
                                    <div class="category-nav">
                                        <h2 class="category-nav__title primary-bg" id="js-cat-nav-title"><i class="fa fa-bars"></i>
                                            <span>Danh mục sản phẩm</span>
                                        </h2>

                                        <ul class="category-nav__menu" id="js-cat-nav">
                                            @foreach($category as $key => $cate)
                                            <li class="category-nav__menu__item">
                                                <a href="{{URL::TO('/danh-muc-san-pham/'.$cate->category_id)}}">{{$cate->category_name}}</a>

                                            </li>

                                            @endforeach
                                        </ul>

                                    </div>
                                </div>
                                <!-- Category Nav End -->
                                <div class="category-mobile-menu"></div>
                            </div>
                            <!-- Main Menu -->
                            <div class="col-lg-7 d-none d-lg-block">
                                <nav class="main-navigation">
                                    <!-- Mainmenu Start -->
                                    <ul class="mainmenu">
                                        <!-- xóa -has-children mất icon -->
                                        <li class="mainmenu__item menu-item">
                                            <a href="{{URL::TO('home')}}" class="mainmenu__link">Trang chủ</a>
                                        </li>
                                        <li class="mainmenu__item menu-item">
                                            <a href="{{URL::TO('shop_detail')}}" class="mainmenu__link">Shop</a>

                                        </li>
                                        <li class="mainmenu__item">
                                            <a href="{{URL::TO('404')}}" class="mainmenu__link">Blog</a>
                                        </li>
                                        <li class="mainmenu__item menu-item">
                                            <a href="{{URL::TO('about')}}" class="mainmenu__link">Vê chúng tôi</a>
                                        </li>
                                        <li class="mainmenu__item menu-item">
                                            <a href="{{URL::TO('contact')}}" class="mainmenu__link">Liên hệ</a>

                                        </li>
                                    </ul>
                                    <!-- Mainmenu End -->
                                </nav>
                            </div>
                            <!-- Cart block-->
                            <div class="col-lg-2 col-6 offset-6 offset-md-0 col-md-3 order-3">
                                <div class="cart-widget-wrapper slide-down-wrapper">
                                    <div class="cart-widget slide-down--btn">
                                        <div class="cart-icon">
                                            <i class="ion-bag"></i>
                                            <span class="cart-count-badge">
                                                {{ Cart::count() }}
                                            </span>
                                        </div>
                                        <div class="cart-text">
                                            <span class="d-block">Giỏ hàng</span>
                                            <strong><span class="amount"><span class="currencySymbol">$</span>40.00</span></strong>
                                        </div>
                                    </div>
                                    <div class="slide-down--item ">
                                        <div class="cart-widget-box">
                                        <?php
                                        $content = Cart::content();
                                        ?>
                                            <ul class="cart-items">
                                                @foreach($content as $v_content)
                                                <li class="single-cart">
                                                    <a href="#" class="cart-product">
                                                        <div class="cart-product-img">
                                                            <img src="{{URL::to('public/uploads/product/'.$v_content->options->image)}}" alt="Selected Products">
                                                        </div>
                                                        <div class="product-details">
                                                            <h4 class="product-details--title">{{$v_content->qty}} x {{$v_content->name}}</h4>
                                                            <span class="product-details--price">{{number_format($v_content->price,6,'.', ' ').' '.'₫'}}</span>
                                                        </div>
                                                        <a href="{{URL::TO('/delete-cart/'.$v_content->rowId)}}" class="cart-cross">x</a>
                                                    </a>
                                                </li>
                                                @endforeach
                                                <li class="single-cart">
                                                    <div class="cart-product__subtotal">
                                                        <span class="subtotal--title">Tổng giá</span>
                                                        <span class="subtotal--price">{{number_format(Cart::subtotal(),2,'.', ' ').' '.'₫'}}</span>
                                                    </div>
                                                </li>
                                                <li class="single-cart">
                                                    <div class="cart-buttons">
                                                        <a href="{{URL::TO('/show-cart')}}" class="btn btn-outlined">Xem giỏ hàng</a>
                                                        <?php
                                                            $customer_id = Session::get('customer_id');
                                                            $shipping_id = Session::get('shipping_id');
                                                            // có đăng nhập mà không có thông tin vận chuyển tới trang checkout để điền
                                                            if($customer_id!=NULL && $shipping_id==NULL) {
                                                        ?>
                                                        <a href="{{URL::TO('/checkout')}}" class="btn btn-outlined">Thanh toán</a>
                                                        <?php
                                                            // có đăng nhập có thông tin vận chuyển
                                                            }elseif($customer_id!=NULL && $shipping_id!=NULL){
                                                        ?>
                                                        <a href="{{URL::TO('/payment')}}" class="btn btn-outlined">Thanh toán</a>
                                                        <?php
                                                            }else{
                                                        ?>
                                                        <a href="{{URL::TO('/login-checkout')}}" class="btn btn-outlined">Thanh toán</a>
                                                        <?php
                                                            }
                                                        ?>
                                                    </div>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Mobile Menu -->
                            <div class="col-12 d-flex d-lg-none order-2 mobile-absolute-menu">
                                <!-- Main Mobile Menu Start -->
                                <div class="mobile-menu"></div>
                                <!-- Main Mobile Menu End -->
                            </div>
                        </div>
                    </div>


                    <div class="row">

                    </div>
                </div>
                <div class="fixed-header sticky-init">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-3">
                                <!-- Sticky Logo Start -->
                                <a class="sticky-logo" href="{{URL::TO('home')}}">
                                    <img src="{{('public/frontend/image/main-logo.png')}}" alt="logo">
                                </a>
                                <!-- Sticky Logo End -->
                            </div>
                            <div class="col-lg-9">
                                <!-- Sticky Mainmenu Start -->
                                <nav class="sticky-navigation">
                                    <ul class="mainmenu sticky-menu">
                                        <li class="mainmenu__item">
                                            <a href="{{URL::TO('home')}}" class="mainmenu__link">Trang chủ</a>
                                        </li>
                                        <li class="mainmenu__item">
                                            <a href="{{URL::TO('shop_detail')}}" class="mainmenu__link">Shop</a>


                                        </li>
                                        <li class="mainmenu__item">
                                            <a href="{{URL::TO('404')}}" class="mainmenu__link">Blog</a>
                                        </li>
                                        <li class="mainmenu__item">
                                            <a href="{{URL::TO('about')}}" class="mainmenu__link">Về chúng tôi</a>

                                        </li>

                                        <li class="mainmenu__item">
                                            <a href="{{URL::TO('contact')}}" class="mainmenu__link">Liên hệ</a>


                                        </li>
                                    </ul>
                                    <div class="sticky-mobile-menu  d-lg-none">
                                        <span class="sticky-menu-btn"></span>
                                    </div>
                                </nav>
                                <!-- Sticky Mainmenu End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        @yield('content')


        <footer class="site-footer">
            <div class="container">
                <div class="row">
                    <!-- efs -->
                    <div class="col-lg-4 col-md-6">
                        <div class="footer-col-1">
                            <h3 class="footer-title">Tải xuống ứng dụng của chúng tôi</h3>
                            <p>Tải xuống ứng dụng cho điện thoại di động Android và iOS..</p>
                            <div class="pt-2">
                                <img src="{{('public/frontend/image/play-store.png')}}" alt="">
                                <img src="{{('public/frontend/image/app-store.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                    <!-- scsa -->
                    <div class="col-lg-4 col-md-6">
                        <div class="footer-col-1">
                            <img src="{{('public/frontend/image/main-logo.png')}}" alt="">
                            <p>Mục đích của chúng tôi là làm cho nhiều người có thể tiếp cận được niềm vui
                                và lợi ích của trao đổi một cách bền vững.</p>

                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="single-footer contact-block">
                            <h3 class="footer-title">THEO DÕI BẢN TIN CỦA CHÚNG TÔI</h3>
                            <div class="single-footer-content">
                                <p>
                                    Đăng ký danh sách gửi thư Petmark để nhận thông tin cập nhật về hàng mới, ưu đãi đặc biệt và thông tin giảm giá khác.
                                </p>
                                <div class="pt-2">
                                    <div class="input-box-with-icon">
                                        <input type="text" placeholder="Enter Your email">
                                        <button><i class="fas fa-envelope"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="footer-block-2 text-center">
                    <ul class="footer-list list-inline justify-content-center">
                        <li><a href="">Online Shopping</a></li>

                        <li><a href="">Khuyến mãi</a></li>

                        <li><a href=""> Đơn hàng của tôi</a></li>

                        <li><a href="">Giúp đỡ</a></li>

                        <li><a href="">Dịch vụ khách hàng</a></li>

                        <li><a href="">Sản phẩm đặc biệt</a></li>

                        <li><a href="">Cửa hàng của chúng tôi</a></li>
                    </ul>
                    <ul class="footer-list list-inline justify-content-center">
                        <li><a href="">Shipping</a></li>

                        <li><a href="">Thanh toán</a></li>



                        <li><a href="">Thủ tục thanh toán</a></li>

                        <li><a href="">Giảm giá</a></li>

                        <li><a href="">Điều khoản & Điều kiện</a></li>

                        <li><a href=""> Chính sách</a></li>

                        <li><a href="">Sản phẩm đặc biệt</a></li>



                        <li><a href="">Cửa hàng của chúng tôi</a></li>
                    </ul>
                    <div class="payment-block pt-3">
                        <img src="{{('public/frontend/image/payment-icons.png')}}" alt="">
                    </div>
                </div>
            </div>

        </footer>
    </div>
    <script src="{{asset('public/frontend/js/plugins.js')}}"></script>
    <script src="{{asset('public/frontend/js/ajax-mail.js')}}"></script>
    <script src="{{asset('public/frontend/js/custom.js')}}"></script>

</body>

</html>