@extends('welcome')
@section('content')

<nav aria-label="breadcrumb" class="breadcrumb-wrapper">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL::TO('home')}}">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tài khoản của tôi</li>
        </ol>
    </div>
</nav>

<div class="page-section sp-inner-page">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <!-- My Account Tab Menu Start -->
                    <div class="col-lg-3 col-12">
                        <div class="myaccount-tab-menu nav" role="tablist">
                            <a href="#dashboad" class="active" data-toggle="tab"><i class="fas fa-tachometer-alt"></i>
                                Bảng điều khiển</a>

                            <a href="#orders" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Đơn hàng</a>

                            <a href="#download" data-toggle="tab"><i class="fas fa-download"></i> Tải hóa đơn</a>

                            <a href="#payment-method" data-toggle="tab"><i class="fa fa-credit-card"></i> Phương thức thanh toán</a>

                            <a href="#address-edit" data-toggle="tab"><i class="fa fa-map-marker"></i> Địa chỉ</a>

                            <a href="#account-info" data-toggle="tab"><i class="fa fa-user"></i> Chi tiết tài khoản</a>

                            <a href="{{URL::TO('logout-checkout')}}"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
                        </div>
                    </div>
                    <!-- My Account Tab Menu End -->

                    <!-- My Account Tab Content Start -->
                    <div class="col-lg-9 col-12 mt--30 mt-lg-0">
                        <div class="tab-content" id="myaccountContent">
                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Bảng điều khiển</h3>

                                    <div class="welcome mb-20">
                                        <p>Xin chào, <strong>Admin</strong> (If Not <strong>Admin !</strong><a href="{{URL::TO('logout-checkout')}}" class="logout"> Đăng xuất</a>)</p>
                                    </div>

                                    <p class="mb-0">Từ trang tổng quan tài khoản của bạn. bạn có thể dễ dàng kiểm tra và xem các đơn đặt hàng gần đây, quản lý địa chỉ giao hàng và thanh toán cũng như chỉnh sửa mật khẩu và chi tiết tài khoản của mình.</p>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->

                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade" id="orders" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Đơn hàng</h3>

                                    <div class="myaccount-table table-responsive text-center">
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Tên</th>
                                                    <th>Ngày</th>
                                                    <th>Trạng thái</th>
                                                    <th>Tổng</th>
                                                    <th>Hoạt động</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach($all_order as $key => $order)
                                                <tr>
                                                    <td>{{ $order->order_id }}</td>
                                                    <td>{{ $order->customer_name }}</td>
                                                    <td>{{ $order->created_at }}</td>
                                                    <td>{{ $order->order_status }}</td>
                                                    <td>{{ $order->order_total }}</td>
                                                    <td><a href="{{URL::TO('show-cart')}}" class="btn">View</a></td>
                                                </tr>
                                                @endforeach
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->

                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade" id="download" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Tải xuống</h3>

                                    <div class="myaccount-table table-responsive text-center">
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Sản phẩm</th>
                                                    <th>Ngày</th>
                                                    <th>Hết hiệu lực</th>
                                                    <th>Tải xuống</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                
                                                <tr>
                                                    <td>Đắc Nhân Tâm</td>
                                                    <td>2021-01-23 20:39:56</td>
                                                    <td>Yes</td>
                                                    <td><a href="#" class="btn">Tải tập tin</a></td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->

                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade" id="payment-method" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Phương thức thanh toán</h3>

                                    <p class="saved-message">Bạn chưa thể lưu Phương thức thanh toán của mình.</p>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->

                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade" id="address-edit" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Địa chỉ thanh toán</h3>

                                    <address>
                                        <p><strong>Admin</strong></p>
                                        <p>Nam Kỳ Khởi Nghĩa <br>
                                            Đại học Đà Nẵng Khoa Công Nghệ Thông Tin - Truyền Thông</p>
                                        <p>Số điện thoại: (123) 456-7890</p>
                                    </address>

                                    <a href="#" class="theme-btn"><i class="fa fa-edit"></i>Sửa địa chỉ</a>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->

                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade" id="account-info" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Tài khoản</h3>

                                    <div class="account-details-form">
                                        <form action="#">
                                            <div class="row">
                                                <div class="col-lg-6 col-12 mb-30">
                                                    <input id="first-name" placeholder="Họ" type="text">
                                                </div>

                                                <div class="col-lg-6 col-12 mb-30">
                                                    <input id="last-name" placeholder="Tên" type="text">
                                                </div>

                                                <div class="col-12 mb-30">
                                                    <input id="display-name" placeholder="Tên hiển thị" type="text">
                                                </div>

                                                <div class="col-12 mb-30">
                                                    <input id="email" placeholder="Địa chỉ email" type="email">
                                                </div>

                                                <div class="col-12 mb-30">
                                                    <h4>Thay đổi mật khẩu</h4>
                                                </div>

                                                <div class="col-12 mb-30">
                                                    <input id="current-pwd" placeholder="Mật khẩu hiện tại" type="password">
                                                </div>

                                                <div class="col-lg-6 col-12 mb-30">
                                                    <input id="new-pwd" placeholder="Mật khẩu mới" type="password">
                                                </div>

                                                <div class="col-lg-6 col-12 mb-30">
                                                    <input id="confirm-pwd" placeholder="Xác nhận mật khẩu" type="password">
                                                </div>

                                                <div class="col-12">
                                                    <button class="theme-btn">Lưu thay đổi</button>
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->
                        </div>
                    </div>
                    <!-- My Account Tab Content End -->
                </div>

            </div>
        </div>
    </div>
</div>

@endsection