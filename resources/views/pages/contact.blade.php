@extends('welcome')
@section('content')

<nav aria-label="breadcrumb" class="breadcrumb-wrapper">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL::TO('home')}}">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Liên hệ</li>
        </ol>
    </div>
</nav>

<div class="gogle_map section-padding-top">

    <div id="googleMap">

    </div>

</div>
<section class="contact-page-section overflow-hidden">
    <div class="row">
        <div class="col-md-6">
            <div class="ct-single-side">
                <div class="ct-section-title">
                    <h2>HÃY CHO CHÚNG TÔI Ý KIẾN</h2>
                </div>
                <form action="" class="site-form " id="contact-form">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" name="firstName" id="firstName" class="form-control" placeholder="Họ*">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" name="lastName" id="lastName" class="form-control" placeholder="Tên*">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email*">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Nội dung*"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="submit-btn">
                                <button type="submit" class="btn btn-black">Gửi</button>
                            </div>
                        </div>
                        <div class="form-messege"></div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-6 bg-gray">
            <div class="ct-single-side">
                <div class="section-title mb--20">
                    <h2>LIÊN LẠC VỚI TÔI</h2>
                </div>
                <div class="contact-right-description">
                    <ul class="contact-list mb--35">
                        <li><i class="fas fa-fax"></i>Địa chỉ : Đại học Đà Nẵng Khoa Công Nghệ Thông Tin - Truyền Thông</li>
                        <li><i class="fas fa-phone"></i>0(1234) 567 890</li>
                        <li><i class="far fa-envelope"></i>Admin@gmail.com</li>
                    </ul>
                    <div class="working-hour">
                        <h3>Giờ làm việc</h3>
                        <p> <strong>Thứ hai – Thứ bảy</strong>: 08AM – 22PM</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection