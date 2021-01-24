@extends('welcome')
@section('content')

<nav aria-label="breadcrumb" class="breadcrumb-wrapper">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL::TO('home')}}">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Đăng nhập</li>
        </ol>
    </div>
</nav>
<!--=============================================
    =            Login Register page content         =
    =============================================-->

<main class="page-section pb--10 pt--50">
    <div class="container">
        <header class="entry-header">
            <h1 class="entry-title">Tài khoản của tôi</h1>
        </header>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
                <!-- Login Form s-->
                <form action="{{URL::to('login-customer')}}" method="POST">
                    {{ csrf_field() }}
                    <h4 class="login-title">Đăng nhập</h4>
                    <div class="login-form">
                        <div class="row">
                            <div class="col-md-12 col-12 mb--20">
                                <label>Tên người dùng hoặc địa chỉ email *</label>
                                <input class="mb-0" type="email" name="customer_email">
                            </div>
                            <div class="col-12 mb--20">
                                <label>Mật khẩu</label>
                                <input class="mb-0" type="password" name="customer_password">
                            </div>
                            <div class="col-md-12">
                                <div class="d-flex align-items-center flex-wrap">
                                    <input type="submit" class="btn btn-black mr-3" value="Đăng nhập" name="btn_login">
                                    <div class="d-inline-flex align-items-center">
                                        <input type="checkbox" id="accept_terms" class="mb-0 mr-1">
                                        <label for="accept_terms" class="mb-0 font-weight-400">Nhớ tôi</label>
                                    </div>
                                </div>
                                <p><a href="#" class="pass-lost mt-3">Quên mật khẩu?</a></p>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                <form action="{{URL::TO('/add-customer')}}" method="POST">
                    {{ csrf_field() }}
                    <h4 class="login-title">Đăng kí</h4>
                    <div class="login-form">
                        <div class="row">
                            <div class="col-md-12 col-12 mb--20">
                                <label>Họ và tên*</label>
                                <input class="mb-0" type="text" name="customer_name">
                            </div>
                            <div class="col-md-12 col-12 mb--20">
                                <label>Địa chỉ Email*</label>
                                <input class="mb-0" type="email" name="customer_email">
                            </div>
                            <div class="col-12 mb--20">
                                <label>Mật khẩu</label>
                                <input class="mb-0" type="password" name="customer_password">
                            </div>
                            <div class="col-12 mb--20">
                                <label>Số điện thoại</label>
                                <input class="mb-0" type="text" name="customer_phone">
                            </div>
                            <div class="col-md-12">
                                <input type="submit" name="btn_register" value="Đăng kí" class="btn btn-black">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<!--=====  End of Login Register page content  ======-->

@endsection