@extends('index')

@section('main')
    {{-- slogan --}}
    <div class="slogan">
        <img src="{{ asset('image/slogan.png') }}" alt="">
    </div>
    {{-- end slogan --}}
    {{-- gird layout1 --}}
    <div class="container text-center">
        <div class="d-flex flex-wrap section-grid">
            <div class="item p-3 text-while">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">CÁC NGÀNH ĐÀO TẠO</h5>
                        <p class="card-text">Với chương trình đào tạo được công nhận và kiểm định theo các tiêu chuẩn
                            nghiêm
                            ngặt, Trường Đại học FPT không ngừng nỗ lực nâng cao uy tín và chất lượng đào
                            tạo
                            thông qua việc kết nối và mở rộng hợp tác với các quốc gia có hệ thống giáo
                            dục
                            tiên tiến, hiện đại. Giáo trình được trường “nhập khẩu” từ những nhà xuất bản nổi tiếng ở
                            Mỹ
                            và các quốc gia phát triển trên thế giới như Mc Graw Hill, Cengage, Wiley, Pearson, Jones &
                            Bartlett Learning,..</p>
                    </div>
                </div>
            </div>
            <div class="item p-3 nn">
                <figcaption>
                    <h4>&nbsp;</h4>
                    <h4 class="text-item pt-5">Ngôn ngữ</h4>
                    <ul class="ul-grid">
                        <li><a href="https://cantho.fpt.edu.vn/nganh-dao-tao/nganh-ky-thuat-phan-mem">Kỹ thuật phần
                                mềm</a>
                        </li>
                        <li><a href="https://cantho.fpt.edu.vn/nganh-dao-tao/an-toan-thong-tin">An toàn thông tin</a>
                        </li>
                        <li><a href="https://cantho.fpt.edu.vn/nganh-dao-tao/tri-tue-nhan-tao-1">Trí tuệ nhân tạo</a>
                        </li>
                    </ul>
                </figcaption>
            </div>
            <div class="item p-3 tt">
                <figcaption>
                    <h4>&nbsp;</h4>
                    <h4 class="text-item pt-5">Công nghệ thông tin</h4>
                    <ul class="ul-grid">
                        <li><a href="https://cantho.fpt.edu.vn/nganh-dao-tao/nganh-ky-thuat-phan-mem">Kỹ thuật phần
                                mềm</a>
                        </li>
                        <li><a href="https://cantho.fpt.edu.vn/nganh-dao-tao/an-toan-thong-tin">An toàn thông tin</a>
                        </li>
                        <li><a href="https://cantho.fpt.edu.vn/nganh-dao-tao/tri-tue-nhan-tao-1">Trí tuệ nhân tạo</a>
                        </li>
                    </ul>
                </figcaption>
            </div>
            <div class="item p-3 pt">
                <figcaption>
                    <h4>&nbsp;</h4>
                    <h4 class="text-item pt-5">Truyền thông</h4>
                    <ul class="ul-grid">
                        <li><a href="https://cantho.fpt.edu.vn/nganh-dao-tao/nganh-ky-thuat-phan-mem">Kỹ thuật phần
                                mềm</a>
                        </li>
                        <li><a href="https://cantho.fpt.edu.vn/nganh-dao-tao/an-toan-thong-tin">An toàn thông tin</a>
                        </li>
                        <li><a href="https://cantho.fpt.edu.vn/nganh-dao-tao/tri-tue-nhan-tao-1">Trí tuệ nhân tạo</a>
                        </li>
                    </ul>
                </figcaption>
            </div>
            <div class="item p-3 kd">
                <figcaption>
                    <h4>&nbsp;</h4>
                    <h4 class="text-item pt-5">Digital marketing</h4>
                    <ul class="ul-grid">
                        <li><a href="https://cantho.fpt.edu.vn/nganh-dao-tao/nganh-ky-thuat-phan-mem">Kỹ thuật phần
                                mềm</a>
                        </li>
                        <li><a href="https://cantho.fpt.edu.vn/nganh-dao-tao/an-toan-thong-tin">An toàn thông tin</a>
                        </li>
                        <li><a href="https://cantho.fpt.edu.vn/nganh-dao-tao/tri-tue-nhan-tao-1">Trí tuệ nhân tạo</a>
                        </li>
                    </ul>
                </figcaption>
            </div>
            <div class="item p-3 ks">
                <figcaption>
                    <h4>&nbsp;</h4>
                    <h4 class="text-item pt-5"> Nhà hàng khách sạn</h4>
                    <ul class="ul-grid">
                        <li><a href="https://cantho.fpt.edu.vn/nganh-dao-tao/nganh-ky-thuat-phan-mem">Kỹ thuật phần
                                mềm</a>
                        </li>
                        <li><a href="https://cantho.fpt.edu.vn/nganh-dao-tao/an-toan-thong-tin">An toàn thông tin</a>
                        </li>
                        <li><a href="https://cantho.fpt.edu.vn/nganh-dao-tao/tri-tue-nhan-tao-1">Trí tuệ nhân tạo</a>
                        </li>
                    </ul>
                </figcaption>
            </div>
            <div class="item p-3 dh">
                <figcaption>
                    <h4>&nbsp;</h4>
                    <h4 class="text-item pt-5"> Thiệt kế đồ họa</h4>
                    <ul class="ul-grid">
                        <li><a href="https://cantho.fpt.edu.vn/nganh-dao-tao/nganh-ky-thuat-phan-mem">Kỹ thuật phần
                                mềm</a>
                        </li>
                        <li><a href="https://cantho.fpt.edu.vn/nganh-dao-tao/an-toan-thong-tin">An toàn thông tin</a>
                        </li>
                        <li><a href="https://cantho.fpt.edu.vn/nganh-dao-tao/tri-tue-nhan-tao-1">Trí tuệ nhân tạo</a>
                        </li>
                    </ul>
                </figcaption>
            </div>
        </div>
    </div>
    {{-- end gird layout1 --}}
    {{-- 4 box icon --}}
    <section class="container section-i">
        <div class="box-text text-center">
            <h2 class="title">Xin Chào Mừng Bạn Đến với Xưởng thực hành</h2>
        </div>
        <div class="row layout-i">
            <div class="col-md-3 col-sm-6 col-xs-16">
                <div class="card primary disabled">
                    <div class="card-body">
                        <h5 class="card-title">
                            <img class="icon-i" src="{{ asset('image/i1.png') }}" alt="Nhiệt huyết">
                        </h5>
                        <p class="card-text">Nhiệt huyết</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="card organ">
                    <div class="card-body">
                        <h5 class="card-title">
                            <img class="icon-i" src="{{ asset('image/i2.png') }}" alt="Chăm chỉ">
                        </h5>
                        <p class="card-text">Chăm chỉ</p>
                    </div>
                </div>
            </div>
            {{-- <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="card success">
              <div class="card-body">
                <h5 class="card-title">
                  <img class="icon-i" src="{{ asset('image/i3.png') }}" alt="Đồng đội">
                </h5>
                <p class="card-text">Đồng đội</p>
              </div>
            </div>
          </div> --}}
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="card purpel">
                    <div class="card-body">
                        <h5 class="card-title">
                            <img class="icon-i" src="{{ asset('image/i4.png') }}" alt="Sáng tạo">
                        </h5>
                        <p class="card-text">Sáng tạo</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- end 4 box icon --}}
    {{-- img project --}}
    <section id="slider">
        <input type="radio" name="slider" id="s1" checked>
        <input type="radio" name="slider" id="s2">
        <input type="radio" name="slider" id="s3">
        <input type="radio" name="slider" id="s4">
        <input type="radio" name="slider" id="s5">

        <label for="s1" class="slide" id="slide1">
            <img src="https://i.ytimg.com/vi/hDzkUdatrcI/maxresdefault.jpg" alt="">

        </label>
        <label for="s2" class="slide" id="slide2">
            <img
                src="https://photo-cms-giaoduc.epicdn.me/w1000/Uploaded/2024/juznus/2022_03_25/gdvn-pho-thong-cao-dang-fpt-234-6909-8085.jpg"
                alt="">
        </label>
        <label for="s3" class="slide" id="slide3">
            <img
                src="https://caodang.fpt.edu.vn/wp-content/uploads/2024/01/1900x750-2.png?__cf_chl_tk=VSFuc5eV3DmKX0btyAZ0vsQgcAOn98vzBfQZVKCNiXA-1709800810-0.0.1.1-1386https://via.placeholder.com/300"
                alt="">
        </label>
        <label for="s4" class="slide" id="slide4">
            <img
                src="https://caodang.fpt.edu.vn/wp-content/uploads/2024/01/1200x628-FPT-Polytechnic-Hoc-Bong-1536x806.jpg"
                alt="">
        </label>
        <label for="s5" class="slide" id="slide5"></label>
    </section>
    {{-- end img project --}}
    {{-- section event --}}
    <section class="home-event-layout">
        <div class="layout-event">
            <div class="event-img row">
                @foreach ($events as $event)
                    <div class="col-12 col-xl-4 col-md-6">
                        <div class="card">
                            <img src="storage/{{ $event->image }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-title">Ngày bắt đầu :<br> {{ $event->start_time }}</p>
                                <p class="card-text">{{ $event->name }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="btn-event">
            <a class="btn bn1" href="#">Xem sự kiện <i class="bi bi-caret-right-fill icon-start"></i></a>
        </div>
    </section>
    {{-- end event --}}
    {{-- layout youtobe --}}
    <div class="content-youtobe container pt-5">
        <div class="form-youtobe row">
            <div class="col-lg-6 box-content">
                <div class="box-title">
                    <h2 class="title font-normal">Cao đẳng FPT Polytechnic đào tạo theo triết lý
                        <br>
                        <strong>"Thực học - Thực nghiệp"</strong>
                    </h2>
                </div>
                <div class="button">
                    <button class="btn organ"><a href="" class="btn">Dang ky</a></button>
                </div>
            </div>
            <div class="col-lg-6 ">
                <iframe width="100%" height="315" src="https://www.youtube.com/embed/UgvCmSCF7q4?si=VBATX0jltWJBpRJS"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
            </div>
        </div>
    </div>
    {{-- end layout youtobe  --}}
    <div class="text-project">
        <h2>
            CÁC DỰ ÁN XƯỞNG
        </h2>
    </div>
    {{--  layout (pages project) --}}
    <div class="project mt-3">
        <div class="container">
            <div class="row ">
                @foreach ($projects as $itemp)
                    <div class="col-md-6 col-lg-4 boder-0">
                        <div class="item-project">
                            <div class="card shadow-sm mb-5 bg-body rounded-0">
                                <div class="box-img overflow-hidden">
                                    <!--  -->
                                    <a data-fancybox="gallery" class="image-container"
                                       href="https://r2.nucuoimekong.com/wp-content/uploads/tour-ca-mau-2-ngay-1-dem.jpg">
                                        <img class="image" src="storage/{{ $itemp->banner }}" alt=""/>
                                    </a>
                                    <div class="light-overlay"></div>
                                    <div style="display:none">
                                        <a data-fancybox="gallery"
                                           href="https://r2.nucuoimekong.com/wp-content/uploads/tour-du-lich-ca-mau-2-ngay-1-dem.jpg">
                                            <img
                                                src="https://r2.nucuoimekong.com/wp-content/uploads/tour-du-lich-ca-mau-2-ngay-1-dem.jpg"/>
                                        </a>
                                        <a data-fancybox="gallery"
                                           href="https://r2.nucuoimekong.com/wp-content/uploads/tour-can-tho-ca-mau-2-ngay-1-dem-chua-som-rong.jpg">
                                            <img
                                                src="https://r2.nucuoimekong.com/wp-content/uploads/tour-can-tho-ca-mau-2-ngay-1-dem-chua-som-rong.jpg"/>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body p-3">
                                    <div class="card-title">
                                        <p class="text-uppercase text-secondary mb-3">{{ $itemp->ProjectType->name }}</p>
                                        <p class="fs-5 text-title">{{ $itemp->name }}</p>
                                    </div>

                                    <div class="card-text">
                                        <p class="start"><i class="fa-solid fa-clock"></i>Thời gian bắt đầu</p>
                                        <p class="end">{{ $itemp->start_date }}</p>
                                    </div>
                                    <div class="card-text">
                                        <p class="start"><i class="fa-solid fa-hourglass-half"></i>Thời gian kết thúc
                                        </p>
                                        <p class="end">{{ $itemp->end_date }}</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    {{-- end pages project  --}}
@endsection
