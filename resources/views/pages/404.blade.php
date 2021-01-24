@extends('welcome')
@section('content')

<!-- Main Wrapper Start -->
<main id="content" class="main-content-wrapper overflow-hidden">
    <div class="error-section">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-7">
                <div class="error-content">


                    <h2>OOPS! TRANG KHÔNG TÌM THẤY</h2>
                    <p>Xin lỗi nhưng trang bạn đang tìm không tồn tại, đã bị xóa, đổi tên hoặc tạm thời không có.</p>
                    <form role="search" method="get" id="blogsearchform" class="search-form" action="https://demo.hasthemes.com/petmark-v5/petmark/">
                        <div class="site-mini-search">
                            <input type="text" placeholder="Tìm kiếm">
                            <button><i class="fas fa-search"></i></button>
                        </div>
                        <a class="btn btn--primary btn-rounded" href="{{URL::TO('home')}}" title="Back to home">Quay lại trang chủ</a>
                    </form>


                </div>
            </div>
        </div>
    </div>
</main>

@endsection