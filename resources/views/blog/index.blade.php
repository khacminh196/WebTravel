@extends('main')
@section('content')
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_1.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">{{ __('common.sidebar.home') }} <i class="fa fa-chevron-right"></i></a></span> <span>Blog <i class="fa fa-chevron-right"></i></span></p>
                <h1 class="mb-0 bread">Blog</h1>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section">
    <div class="container">
        @if ($data->isEmpty())
            <h1>No data</h1>
        @endif
        <div class="row d-flex">
            @foreach ($data as $item)
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry justify-content-end">
                        <a href="{{ route('blog.detail', ['id' => $item->id]) }}" class="block-20" style="background-image: url(<?php echo $item->image_link ?>);">
                        </a>
                        <div class="text">
                            <div class="d-flex align-items-center mb-4 topp">
                                <div class="one mr-1">
                                    <span class="day">{{ \Carbon\Carbon::parse($item->created_at)->format('d') }}</span>
                                </div>
                                <div class="two">
                                    <span class="yr">{{ \Carbon\Carbon::parse($item->created_at)->format('Y') }}</span>
                                    <span class="mos">{{ \Carbon\Carbon::parse($item->created_at)->format('M') }}</span>
                                </div>
                            </div>
                            <h3 class="heading"><a href="{{ route('blog.detail', ['id' => $item->id]) }}">{{ $item->title }}</a></h3>
                            <p>{{ $item->description }}</p>
                            <p><a href="{{ route('blog.detail', ['id' => $item->id]) }}" class="btn btn-primary">Read more</a></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $data->links() }}
    </div>
</section>
@endsection