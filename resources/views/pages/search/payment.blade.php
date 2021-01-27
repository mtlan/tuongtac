@extends('welcome')
@section('content')

<nav aria-label="breadcrumb" class="breadcrumb-wrapper">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL::TO('home')}}">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Payment</li>
        </ol>
    </div>
</nav>

<!-- Cart Page Start -->

   
    <div class="cart_area cart-area-padding sp-inner-page--top">
        <div class="container">
            <div class="page-section-title">
                <h1>GIỎ HÀNG</h1>
            </div>
            <div class="row">
                <div class="col-12">
                        <!-- Cart Table -->
                        <?php
                            use Gloudemans\Shoppingcart\Facades\Cart;
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
                
                <!-- Cart Summary -->
                <div class="col-lg-6 col-12 mb--15">
                    <div class="cart-summary">
                        <div class="cart-summary-wrap">
                            <h4><span>Tóm Tắt Giỏ Hàng</span></h4>
                            <p>Tổng <span class="text-primary">{{Cart::subtotal(0,'.','.').'₫'}}</span></p>
                            <p>Giá vận chuyển <span class="text-primary">Miễn phí</span></p>
                            <h2>Thành tiền <span class="text-primary">{{Cart::subtotal(0,'.','.').'₫'}}</span></h2>
                        </div>


                    </div>
                    
                </div>
                <div class="col-lg-5">
                                <div class="row">

                                    <!-- Cart Total -->
                                    
                                    <div class="col-12">
                                        
                                        <div class="checkout-cart-total">
                                            <form action="{{URL::TO('/order-place')}}" method="POST">
                                            {{csrf_field()}}
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
                                                echo number_format($subtotal,0,'.','.');
                                                ?></span></li>
                                                @endforeach
                                            </ul>
                                    
                                            <p>Tổng sản phẩm <span>{{Cart::subtotal(0,'.','.').'₫'}}</span></p>
                                            <p>Phí vận chuyển <span>Miễn phí</span></p>

                                            <h4>Tổng cộng <span>{{Cart::subtotal(0,'.','.').'₫'}}</span></h4>
                                            <div class="method-notice mt--25">
                                            
                                                <div class="check-box">
                                                    <input type="checkbox" id="shiping_address" name="payment_option" value="1">
                                                    <label for="shiping_address">Trả bằng thẻ ATM</label>
                                                </div>
                                                <div class="check-box">
                                                    <input type="checkbox" id="shiping_address" name="payment_option" value="2">
                                                    <label for="shiping_address">Nhận hàng và trả tiền</label>
                                                </div>
                                                <div class="check-box">
                                                    <?php
                                                        // echo $vnd_to_usd = $content->price /23071;
                                                       
                                                        $vnd_to_usd =  Cart::subtotal(2,'.','')/23071;
                                                    ?>
                                                    <div id="paypal-button" name="payment_option" value="3"></div>
                                                    <input type="hidden" id="vnd_to_usd" value="{{$vnd_to_usd}}">
                                                    
                                                </div>
                                            
                                            </div>
                                            <div class="term-block">
                                                <input type="checkbox" id="accept_terms2">
                                                <label for="accept_terms2">Tôi đã đọc và chấp nhận các điều khoản & điều kiện</label>
                                            </div>
                                            <button type="submit" name="sender_place" class="place-order w-100">Đặt hàng</button>
                                        </form> 
                                        </div>
                                       
                                    </div>
                                    
                                </div>
                            </div>
            </div>
        </div>
    </div>
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <script>
        paypal.Button.render({
            env: 'sandbox', // sandbox | production

            client: {
            sandbox:    'AR2x_AwUJC_zLKAF5zuObfHSThwIcTd5OYcH8A_iqaJq4Ol3HlabKe8C39SVXGJFj9gVDp1UXIMITOkY',
            production: 'xxxxxxxxxx'
            },

            locale: 'en_US',
            style: {
                size: 'small',
                color: 'gold',
                shape: 'pill',
            },

        // Show the buyer a 'Pay Now' button in the checkout flow
            commit: true,

        // payment() is called when the button is clicked
            payment: function(data, actions) {
            // Make a call to the REST API to set up the payment
                return actions.payment.create({
                    transactions: [{
                        amount: { 
                            total: `{{ round($vnd_to_usd,2) }}`, 
                            currency: 'USD' }        
                    }]  
                });
            },

            // onAuthorize() is called when the buyer approves the payment
            onAuthorize: function(data, actions) {
                // Make a call to the REST API to execute the payment
                return actions.payment.execute().then(function() {
                    <?php
                        Cart::destroy();    
                    ?>
                    location.href="{{URL::TO('home')}}";
                    window.alert('Cảm ơn bạn đã mua hàng của chúng tôi!');
                    
            });
        }
    }, '#paypal-button');
    </script>
    <script>
        var usd = document.getElementById("vnd_to_usd").value;
    </script>
@endsection