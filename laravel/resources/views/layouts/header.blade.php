<header>
    <div class="header-main" id="header-sticky">
        <div class="header-top">
            <nav class="navbar navbar-expand-lg me-5">
                <div class="container-fluid ">
                    <div class="collapse navbar-collapse" id="navbarText">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="bi bi-envelope-fill"></i>
                                    caodang@fpt.edu.vn</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="bi bi-telephone-fill"></i>
                                    0245748384</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Liên hệ</a>
                            </li>
                            <li class="nav-item"><span class="nav-link"><i class="bi bi-search"></i></span></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="header-bottom">
            <nav class="navbar navbar-expand-lg mx-lg-5 ">
                <div class="container-fluid px-0">
                    {{-- logo --}}
                    <div class="header-icon">
                        <div class="logo">
                            <a class="navbar-brand ms-3" href="#"><img class="icon-logo" style="height: 55px;"
                                                                       src="{{ asset('image/2020-FPTPolytechic.png') }}"
                                                                       alt=""></a>
                        </div>
                        <button class="navbar-toggler me-3" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarBottom" aria-controls="navbarBottom" aria-expanded="false"
                                aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="navbarBottom">
                        <ul class="navbar-nav me-auto mb-0 mb-lg-0 align-items-lg-center">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#"><i
                                        class="text-white bi bi-house-door-fill"></i></a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="index" href="{{ url('/') }}"
                                   aria-expanded="false">
                                    Trang Chủ
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="{{ route('event') }}"
                                   aria-expanded="false">
                                    Sự kiện
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="{{ route('project') }}" role="button"
                                   aria-expanded="false">
                                    Dự Án
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="{{ route('wordpress') }}" role="button"
                                   aria-expanded="false">
                                    Tài Nguyên Wordpres
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button"
                                   data-bs-toggle="dropdown" aria-expanded="false">
                                    Đăng nhập
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Đăng nhập</a></li>
                                    <li><a class="dropdown-item" href="#">Đăng ký</a></li>
                                </ul>
                            </li>
                            {{-- <li class="nav-item">
                  <a class="nav-link" href="#">
                    Tin học bổng
                  </a>

                </li> --}}
                        </ul>
                    </div>
                </div>
            </nav>

        </div>


    </div>

    <div class="slider">
        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('image/b1.png')}}"
                         class="d-block w-100" alt="image">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('image/b2.png')}}"
                         class="d-block w-100" alt="image">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('image/b4.png')}}"
                         class="d-block w-100" alt="image">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                    data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                    data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    </div>

</header>
