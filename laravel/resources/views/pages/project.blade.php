@extends('index')

@section('main')
    {{--  layout (pages project) --}}
    <div class="project mt-3  bg-transparent">
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
