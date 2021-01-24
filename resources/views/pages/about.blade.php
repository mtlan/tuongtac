@extends('welcome')
@section('content')

<nav aria-label="breadcrumb" class="breadcrumb-wrapper">
  <div class="container">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{URL::TO('home')}}">Trang chủ</a></li>
      <li class="breadcrumb-item active" aria-current="page">Về chúng tôi</li>
    </ol>
  </div>
</nav>

<!-- Main Wrapper Start -->
<main id="content" class="main-content-wrapper overflow-hidden">
  <div class="about-area bg--white about-two-sp sec-1">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-10">
          <div class="about-text about-text-2 text-center pb--40 pb-sm--30">
            <h2 class="heading-secondary mb--40 mb-sm--30">
              <strong>VỀ TRANG WEB</strong>
            </h2>
            <p>PetMark không chỉ mang đến cho bạn thú cưng mà bạn yêu thích. Đến với Siêu Pet bạn sẽ tìm cho mình
              được một người bạn trung thành. Từ người bạn này, chúng ta thêm yêu thương cuộc sống và những người xung
              quanh. Hơn thế nữa, người bạn mới còn giúp bạn rèn luyện tính kiên trì, chăm chỉ, có trách nhiệm, giàu
              tình yêu thương, nhân ái,... từ những việc cho thú cưng ăn, huấn luyện thú cưng, đi thể dục cùng thú cưng và đi cafe
              cùng thú cưng . . . Tôi tin chắc rằng bạn sẽ có cuộc sống ý nghĩa hơn khi có người bạn này bên cạnh. Sẽ thật
              thú vị biết bao khi luôn có “người” vẫy đuôi chờ bạn về nhà mỗi ngày. Với sứ mệnh Gắn Kết Yêu Thương.
              PetMark Hân Hạnh Và Cảm Ơn!</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="img-box about-img-2 text-center">
            <img src="{{('public/frontend/image/about.jpg')}}" alt="about image">
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="fact-area">
    <div class="container-fluid p-0">
      <div class="row no-gutters">
        <div class="col-lg-3 col-sm-6">
          <div class="fact">
            <div class="fact__icon">
              <img src="{{('public/frontend/image/about-us-icon1.png')}}" alt="about icon">
            </div>
            <div class="fact__content">
              <h3><span class="counter">2169</span></h3>
              <p>KHÁCH HÀNG</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="fact">
            <div class="fact__icon">
              <img src="{{('public/frontend/image/about-us-icon2.png')}}" alt="about icon">
            </div>
            <div class="fact__content">
              <h3><span class="counter">869</span></h3>
              <p>TRUY CẬP</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="fact">
            <div class="fact__icon">
              <img src="{{('public/frontend/image/about-us-icon3.png')}}" alt="about icon">
            </div>
            <div class="fact__content">
              <h3><span class="counter">689</span></h3>
              <p>SỐ GIỜ LÀM VIỆC</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="fact">
            <div class="fact__icon">
              <img src="{{('public/frontend/image/about-us-icon4.png')}}" alt="about icon">
            </div>
            <div class="fact__content">
              <h3><span class="counter">2500</span></h3>
              <p>TRAO ĐỔI</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="skill-area bg--white">
    <div class="container-fluid p-0">
      <div class="row align-items-center no-gutters">
        <div class="col-xl-6 order-2 order-xl-1">
          <div class="row">
            <div class="col-sm-9 offset-sm-2 col-10 offset-1">
              <div class="skill-progress">
                <h2 class="heading-secondary heading-secondary--2 mb--30">
                  CHÚNG TÔI CAM KẾT SẢN PHẨM ĐÁP ỨNG NHU CẦU QUÝ KHÁCH
                </h2>
                <div class="skill-progress__single">
                  <span class="skill-progress__title">Về hàng hóa</span>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"><span>90%</span></div>
                  </div>
                </div>
                <div class="skill-progress__single">
                  <span class="skill-progress__title">Về giá cả</span>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 85%;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"><span>85%</span></div>
                  </div>
                </div>
                <div class="skill-progress__single">
                  <span class="skill-progress__title">Dịch vụ</span>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"><span>70%</span></div>
                  </div>
                </div>
                <div class="skill-progress__single">
                  <span class="skill-progress__title">Giao hàng</span>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 95%;" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"><span>95%</span></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 order-1 order-xl-2">
          <div class="img-box text-center">
            <img src="{{('public/frontend/image/about-us-sec-4.jpg')}}" alt="about image" class="d-block w-100">
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

@endsection