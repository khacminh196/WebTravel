<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
        <meta name="csrf-token" value="{{ csrf_token() }}" />
        <link rel="stylesheet" href="{{ url('assets/admin/admin.css') }}">
    </head>
    <body>
        <div>
            <div class="wrapper-container">
                @include('admin.layouts.sidebar')
                <div class="wrapper-layout">
                    @include('admin.layouts.header')
                    <transition name="fade">
                        @yield('content')
                    </transition>
                </div>
            </div>
        </div>
    </body>
</html>