@extends('index')

@section('main')

    <div class="container container-fluid">
        <div class="header text-center my-4">
            <div class="d-flex justify-content-between align-items-center">
                <h4>THEME / PLUGIN WORDPRESS</h4>
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
        <div class="row" id="pluginList">
            @foreach($wordpress as $wordpres)
                <div class="col-lg-3 col-md-4 col-6 mb-3 search-card" data-name="{{strtolower($wordpres->name)}}">
                    <div class="card rounded-end ">
                        <div class="card-img">
                            <button class="btn btn-outline-danger favorite-btn"><i class="far fa-heart"></i></button>
                            <button class="btn btn-outline-danger Shop-Icons"><i class="fas fa-shopping-cart"></i>
                            </button>
                            <img src="storage/{{ $wordpres->thumbnail }}" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-center">
                                <div class="badge bg-primary bg-warning rounded p-1 mx-1 "><i
                                        class="fas fa-calendar-alt text-light"> {{$wordpres->created_at}}</i></div>
                                <div class="badge bg-primary text-white rounded p-1 mx-1"><i
                                        class="fas fa-code-branch text-light"> {{$wordpres->version}}</i></div>
                            </div>
                            <h3 class="text-secondary text-align-center text-center fs-6">{{$wordpres->type}}</h3>
                            <span class="text-center text-align-center fs-7 ">
                    <a class="text-decoration-none link-dark " href="#">{{$wordpres->name}}</a>
                </span>
                            <a href="{{ route('download', $wordpres->file) }}"
                               class="badge bg-primary text-decoration-none text-white">Download</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
