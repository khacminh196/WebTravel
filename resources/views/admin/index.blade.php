<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> -->
    <script src="{{ url('assets/js/jquery.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ url('assets/admin/admin.css') }}">
    <link rel="stylesheet" href="{{ url('css/admin.css') }}">
    <link rel="stylesheet" href="{{ url('css/toastr.min.css') }}">
</head>

<body>
    <div>
        <div class="wrapper-container">
            @include('admin.layouts.sidebar')
            <div class="wrapper-layout">
                @include('admin.layouts.header')
                <transition name="fade" style="padding: 3rem;">
                    @if (!is_null(session('dataSuccess')))
                        <div id="show-toast-success" data-msg="{{ session('dataSuccess')['msg'] }}"></div>
                    @endif

                    @if (!is_null(session('dataError')))
                        <div id="show-toast-error" data-msg="{{ session('dataError')['msg'] }}"></div>
                    @endif
                    @yield('content')
                </transition>
            </div>
        </div>
    </div>
</body>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var confirmForms = document.querySelectorAll(".confirm-form");
    confirmForms.forEach(function(form) {
        form.addEventListener("submit", function(event) {
            var confirmMessage = "Do you want submit this form?";
            if (!confirm(confirmMessage)) {
                event.preventDefault();
            }
        });
    });
</script>
<script src="{{ asset('ckeditor/ckeditor.js')}}"></script>
<script src="{{ asset('assets/js/common.js') }}"></script>
<script src="{{ asset('js/toastr.min.js') }}"></script>

</html>