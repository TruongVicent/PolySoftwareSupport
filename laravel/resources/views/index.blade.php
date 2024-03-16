<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PolySoftwareSupport</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"/>
    <link rel="stylesheet" href="{{ asset('css/wordpress.css') }}">
</head>

<body>
@include('layouts.header')
{{-- @include('pages.bodyHome') --}}
@yield('main')
{{-- @include('pages.bodyHome') --}}
@include('layouts.footer')


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<script>
    // scroll chuột hiện header
    window.addEventListener('scroll', function () {

        var scrollPosition = window.scrollY;
        var scrollThreshold = 20; // lấy px

        var headerElement = document.getElementById('header-sticky');
        if (scrollPosition > scrollThreshold) {
            headerElement.classList.add('sticky');
        } else {
            headerElement.classList.remove('sticky');
        }

    });

    // setinterval
    // fancybox
    Fancybox.bind('[data-fancybox]', {
        //
    });
    //window index
    const myLink = document.getElementById('index');

    myLink.addEventListener('click', () => {
        // Sử dụng JavaScript để thao tác với các đối tượng DOM
        window.location.href = "/"; // Thay thế "#" bằng URL mong muốn
    });

    // ajax wordpress
    $(document).ready(function () {
        $("#searchForm").submit(function (event) {
            event.preventDefault();
            var searchValue = $("#searchInput").val().toLowerCase();
            $.ajax({
                type: "GET",
                url: "{{ route('search') }}",
                data: {
                    search: searchValue
                },
                success: function (data) {
                    $(".search-card").hide();
                    $.each(data, function (index, item) {
                        var productName = item.name.toLowerCase();
                        if (productName.includes(searchValue)) {
                            $(".search-card[data-name='" + productName + "']")
                                .show();
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
