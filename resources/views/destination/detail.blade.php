@extends('main')
@section('content')
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url({{asset('images/bg_1.jpg')}});">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span> <span>Tour List <i class="fa fa-chevron-right"></i></span></p>
                <h1 class="mb-0 bread">Tour Detail</h1>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section ftco-no-pb">
    <div class="container">
        <div class="wrapper-tour-title" style="text-align: center;">
            <h1 style="font-size: 3rem;">{{ $data->name }}</h1>
        </div>
        <div class="wrapper-tour-images mt-5">
            <h3>1. Thư viện ảnh</h3>
            <div class="carousel-destination owl-carousel ftco-animate">
                @foreach ($data->images as $item)
                    <div class="item" title="Click to zoom">
                        <div class="project-destination">
                            <a href="#" class="img" style="background-image: url({{ asset($item->link) }});">
                                <div class="text">
                                    <!-- <h3>Vietnam</h3> -->
                                    <span>Dia diem</span>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="wrapper-tour-body mt-5 mb-5 row">
            <div class="col-lg-8">
                <h3>2. Chi tiết tour</h3>
                <p style="font-size: 1.5rem;">{{ $data->description }}</p>
                <div class="ck-content">
                    {!! $data->content !!}
                </div>
                <div class="sidebar-box ftco-animate">
                    <h3>Tag Cloud</h3>
                    <div class="tagcloud">
                        @foreach (explode(",", $data->tag) as $tag)
                            <a href="#" class="tag-cloud-link">{{ $tag }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-4 sidebar ftco-animate bg-light py-md-5">
                <div class="sidebar-box ftco-animate">
                    <div class="categories">
                        <h2>Booking tour</h2>
                    </div>
                </div>
                <div class="sidebar-box">
                    <form method="POST" action="{{ route('booking-tour.store') }}" class="search-form">
                        @csrf
                        <input type="hidden" name="tour_id" value="{{ $data->id }}">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input name="name" type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input name="phone" type="text" name="title" class="form-control" maxlength="12">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input name="email" type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Number of people</label>
                            <input name="number_of_people" type="number" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Expected travel time</label>
                            <input name="expected_travel_time" type="text" class="form-control checkin_date" placeholder="Check In Date">
                        </div>
                        <button class="align-self-stretch form-control btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="sidebar-box ftco-animate">
                    <h3>Paragraph</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection