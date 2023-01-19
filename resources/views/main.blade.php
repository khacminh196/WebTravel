<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pacific - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Arizonia&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    
    <link rel="stylesheet" href="{{ url('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/magnific-popup.css') }}">
    
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/jquery.timepicker.css') }}">

    <link rel="stylesheet" href="{{ url('assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('css/toastr.min.css') }}">
    <script src="{{ url('assets/js/jquery.min.js') }}"></script>
</head>

<body>
    <div class="wrapper">
        <div class="wrapper_main show_sidebar">
            <div class="wrapper_header">
                @include('layouts.header')
            </div>

            <div class="wrapper_content">
                @if (!is_null(session('dataSuccess')))
                    <div id="show-toast-success" data-msg="{{ session('dataSuccess')['msg'] }}"></div>
                @endif

                @if (!is_null(session('dataError')))
                    <div id="show-toast-error" data-msg="{{ session('dataError')['error']['msg'] }}"></div>
                @endif
                @yield('content')
            </div>
            
            <div class="wrapper_footer">
                @include('layouts.footer')
            </div>
        </div>
    </div>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script src="{{ url('assets/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ url('assets/js/popper.min.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('assets/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ url('assets/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ url('assets/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ url('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ url('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ url('assets/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ url('assets/js/scrollax.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="{{ url('assets/js/google-map.js') }}"></script>
    <script src="{{ url('assets/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
</body>

</html>