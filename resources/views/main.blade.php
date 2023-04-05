<!DOCTYPE html>
<html lang="en">

<head>
    <title>ASIAN DREAM</title>
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
    <link rel="stylesheet" href="{{ url('css/intlTelInput.css') }}"/>
    <script src="{{ url('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/intlTelInput.min.js') }}"></script>
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

                <!-- Messenger Plugin chat Code -->
                <div id="fb-root"></div>
                    <!-- Your Plugin chat code -->
                    <div id="fb-customer-chat" class="fb-customerchat">
                </div>

                @if (!is_null(session('dataError')))
                    <div id="show-toast-error" data-msg="{{ session('dataError')['msg'] }}"></div>
                @endif
                <div class="wrapper-toast" id="wrapper-toast">
                    <div class="toast-content">
                        <div id="toast-image">
                            <div class="close-btn">
                                <img id="close-btn" style="width: 100%;" src="{{ asset('images/cancel.png') }}">
                            </div>
                            <img id="file-content" src="https://localhost/images/bg_5.jpg" alt="">
                        </div>
                    </div>
                </div>
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

        function viewImage(url) {
            $("#file-content").attr("src", url);
            $("#wrapper-toast").addClass("open");
        }
        
        $('#close-btn').click(function () {
            $("#file-content").attr("src", "");
            $("#wrapper-toast").removeClass("open");
        });

        window.addEventListener('click', function(e){
            let checkOpenToastFile = $("#wrapper-toast").hasClass('open');
            if (
                checkOpenToastFile &&
                document.getElementById('wrapper-toast').contains(e.target) &&
                !document.getElementById('toast-image').contains(e.target)
            ) {
                $("#file-content").attr("src", "");
                $("#wrapper-toast").removeClass("open");
            }
        });
    </script>
    <script>
        var chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", "105789935269882");
        chatbox.setAttribute("attribution", "biz_inbox");
        </script>

        <!-- Your SDK code -->
        <script>
        window.fbAsyncInit = function() {
            FB.init({
            xfbml            : true,
            version          : 'v16.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
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
    <script src="{{ asset('js/utils.js') }}"></script>
    <script>
        const form = document.querySelector("form");
        const phoneInputField = document.querySelector("#phone");
        const phoneInput = window.intlTelInput(phoneInputField, {
            initialCountry: "auto",
            geoIpLookup: function (callback) {
            fetch('https://ipinfo.io/json?token=12ae468aa9a145', { headers: { 'Accept': 'application/json' }})
                .then((resp) => resp.json())
                .catch(() => {
                    return {
                        country: 'us',
                    };
                })
                .then((resp) => callback(resp.country));
            },
            separateDialCode: true,
            utilsScript:
            "{{ asset('js/utils.js') }}",
        });
        const iti = window.intlTelInputGlobals.getInstance(phoneInputField);

        phoneInputField.addEventListener('input', function() {
            var fullNumber = iti.getNumber();
            document.getElementById('fullNumber').value = fullNumber;
        });

        form.addEventListener('submit', function(event) {
            if (phoneInputField && phoneInputField.value.trim()) {
                if (phoneInput.isValidNumber()) {
                    document.getElementById('span_error_phone').innerHTML = '';
                } else {
                    document.getElementById('span_error_phone').innerHTML = 'Invalid phone number.';
                    event.preventDefault();
                }
            }
        });
    </script>
</body>

</html>