<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        .sbutton {
            border: none;
            color: #e84118;
            float: right;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: white;
            display: flex;
            justify-content: center;
            align-items: center;
            text-decoration: none;
            transition: 0.4s;
        }
        .stext {
            border: none;
            background: gainsboro;
            outline: none;
            float: left;
            padding: 0;
            color: #555;
            font-size: 15px;
            transition: 0.4s;
            line-height: 40px;
            width: 0;
        }
        .sbox:hover > .stext {
            width: 200px;
            padding: 0 5px;
            border-radius: 50px;
        }
        .sbox:hover > .sbutton {
            background: #fff;
        }

        .fa-search {
            color: #001EFF;
        }

        .card {
            overflow: hidden;
            position: relative;
            transition: background-color 0.3s ease;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card:hover {
            background-color: white;
            border: 2px solid red; /* Màu đỏ khi hover */
        }

        .card-img {
            position: relative;
            overflow: hidden;
        }

        .card-img img {
            transition: transform 0.3s ease;
        }

        .card:hover .card-img img {
            transform: scale(1.1);
        }

        .favorite-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 2;
            color: white;
            background-color: transparent;
            border: 1px solid white;
            padding: 5px;
            width: 35px; /* Đảm bảo kích thước là bằng nhau */
            height: 35px; /* Đảm bảo kích thước là bằng nhau */
            border-radius: 50px;
            transition: color 0.3s ease, background-color 0.3s ease;
        }

        .favorite-btn:hover {
            color: white;
            background-color: red;

        }

        .Shop-Icons {
            position: absolute;
            bottom: 10px;
            left: 10px;
            z-index: 2;
            color: white;

            border: none;
            transition: color 0.3s ease, background-color 0.3s ease;
        }

        .card-body {
            padding: 10px;
        }

        .equal-width {
            display: inline-block;
            width: 50%;
            text-align: center;
        }

    </style>
</head>
<body>

<div class="container-fluid">
    <div class="header text-center my-4">
        <div class="d-flex justify-content-between align-items-center">
            <h4>PLUGIN BÁN CHẠY NHẤT</h4>
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
                        <button class="btn btn-outline-danger Shop-Icons"><i class="fas fa-shopping-cart"></i></button>
                        <img src="{{Storage::url($wordpres->thumbnail)}}" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-center">
                            <div class="badge bg-primary bg-warning rounded p-1 mx-1 "><i class="fas fa-calendar-alt text-light"> {{$wordpres->created_at}}</i></div>
                            <div class="badge bg-primary text-white rounded p-1 mx-1"><i class="fas fa-code-branch text-light"> {{$wordpres->version}}</i></div>
                        </div>
                        <h3 class="text-secondary text-align-center text-center fs-6">{{$wordpres->type}}</h3>
                        <span class="text-center text-align-center fs-7 ">
                    <a class="text-decoration-none link-dark" href="#">{{$wordpres->name}}</a>
                </span>
                        <a href="{{ route('download-file', $wordpres->file) }}" class="badge bg-primary text-decoration-none text-white">Download</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $("#searchForm").submit(function (event) {
            event.preventDefault();
            var searchValue = $("#searchInput").val().toLowerCase();
            $.ajax({
                type: "GET",
                url: "{{ route('search') }}",
                data: { search: searchValue },
                success: function (data) {
                    $(".search-card").hide();
                    $.each(data, function (index, item) {
                        var productName = item.name.toLowerCase();
                        if (productName.includes(searchValue)) {
                            $(".search-card[data-name='" + productName + "']").show();
                        }
                    });
                },
                error: function (error) {
                    console.log("Error:", error);
                }
            });
        });
    });
</script>

</body>
</html>
