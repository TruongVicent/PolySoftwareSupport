@extends('index')

@section('main')
    <main class="event mb-5">
        <div class="header container text-center my-4">
            <div class="d-flex justify-content-between align-items-center">
                <h4>Sự kiện</h4>
                <div class="box">
                    <form class="sbox" id="searchForm" method="get">
                        <input class="stext" type="text" name="q" id="searchInput" placeholder="Tìm kiếm file...">
                        <button class="sbutton" type="submit" id="searchButton">
                            <i class="text-dark fa fa-search"></i>
                        </button>
                    </form>
                </div>

            </div>
            <hr style="border: 1px solid red;">
        </div>
        <div class="small row">
            @foreach ($events as $event)
                <div class="card col-3" id="six" style="width: 23rem;">
                    <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        <div class="img-card">
                            <img src="{{ asset('image/hot.png') }}" class="hot">
                            <img src="storage/{{ $event->image }}" class="card-img-top" width="360px" height="210px">
                        </div>
                        <div class="card-body mb-2">
                            <p class="card-title">{{ $event->EventType->name }}</p>
                            <h6 class="card-content">
                                {{ $event->name }}
                            </h6>
                            <div class="card-text">
                                <p class="start"><i class="fa-regular fa-clock icon"></i> Thời gian bắt đầu:</p>
                                <p class="end">
                                    {{ $event->start_time }}
                                </p>
                            </div>
                            <div class="card-text mb-2">
                                <p class="start">
                                    <i class="fa-solid fa-clock icon"></i>
                                    Thời gian kết thúc:
                                </p>
                                <p class="end">
                                    {{ $event->end_time }}
                                </p>
                            </div>
                        </div>
                    </button>
                </div>
            @endforeach
        </div>
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
             aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Đăng ký sự kiện</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="text-modal">Bạn có muốn đăng ký</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <form action="{{ route('event.register') }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-primary">Đăng ký</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end modal -->
    </main>
@endsection
