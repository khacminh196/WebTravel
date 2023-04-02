@extends('main')
@section('content')
<div class="hero-wrap js-fullheight" style="background-image: url('images/bg_5.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center" data-scrollax-parent="true">
            <div class="col-md-7 ftco-animate">
                <span class="subheading">{{ __('common.home.title.welcome') }}</span>
                <h1 class="mb-4">{{ __('common.home.title.discover-1') }}</h1>
                <p class="caps">{{ __('common.home.title.discover-2') }}</p>
            </div>
            <a href="https://vimeo.com/45830194" class="icon-video popup-vimeo d-flex align-items-center justify-content-center mb-4">
                <span class="fa fa-play"></span>
            </a>
        </div>
    </div>
</div>

<section class="ftco-section ftco-no-pb ftco-no-pt">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="ftco-search d-flex justify-content-center">
                    <div class="row">
                        <div class="col-md-12 nav-link-wrap">
                            <div class="nav nav-pills text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link active mr-md-1" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Search Tour</a>
                            </div>
                        </div>
                        <div class="col-md-12 tab-wrap">

                            <div class="tab-content" id="v-pills-tabContent">

                                <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-nextgen-tab">
                                    <form action="{{ route('destination.index') }}" class="search-property-1">
                                        <div class="row no-gutters">
                                            <div class="col-lg d-flex">
                                                <div class="form-group p-4 border-0">
                                                    <label for="#">Key word</label>
                                                    <div class="form-field">
                                                        <div class="icon"><span class="fa fa-search"></span></div>
                                                        <input name="keyword" value="{{ old('keyword', \Request::get('keyword')) ? old('keyword', \Request::get('keyword')) : '' }}" type="text" class="form-control" placeholder="Search place">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg d-flex">
                                                <div class="form-group p-4">
                                                    <label for="#">Country</label>
                                                    <div class="form-field">
                                                        <div class="select-wrap">
                                                            <div class="icon"><span class="fa fa-chevron-down"></span></div>
                                                            <select id="country-input" class="basic-multiple form-control" name="country" onchange="changeCountry()">
                                                                <option value="">-- All --</option>
                                                                @foreach ($countries as $country)
                                                                <option {{ old('country', \Request::get('country')) == $country->id ? "selected" : "" }} value="{{ $country->id }}">{{ $country->name }}</option>
                                                                @endforeach
                                                            </select><br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg d-flex">
                                                <div class="form-group p-4">
                                                    <label for="#">Prefecture</label>
                                                    <div class="form-field">
                                                        <div class="select-wrap">
                                                            <div class="icon"><span class="fa fa-chevron-down"></span></div>
                                                            <select class="basic-multiple form-control prefectures" name="prefecture">
                                                            </select><br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg d-flex">
                                                <div class="form-group p-4">
                                                    <label for="#">Sort day tour</label>
                                                    <div class="form-field">
                                                        <div class="select-wrap">
                                                            <div class="icon"><span class="fa fa-chevron-down"></span></div>
                                                            <select class="basic-multiple form-control" name="sort-day">
                                                                <option value="asc">Tăng dần</option>
                                                                <option value="desc">Giảm dần</option>
                                                            </select><br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg d-flex">
                                                <div class="form-group d-flex w-100 border-0">
                                                    <div class="form-field w-100 align-items-center d-flex">
                                                        <input type="submit" value="Search" class="align-self-stretch form-control btn btn-primary">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-performance-tab">
                                    <form action="#" class="search-property-1">
                                        <div class="row no-gutters">
                                            <div class="col-lg d-flex">
                                                <div class="form-group p-4 border-0">
                                                    <label for="#">Destination</label>
                                                    <div class="form-field">
                                                        <div class="icon"><span class="fa fa-search"></span></div>
                                                        <input type="text" class="form-control" placeholder="Search place">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg d-flex">
                                                <div class="form-group p-4">
                                                    <label for="#">Check-in date</label>
                                                    <div class="form-field">
                                                        <div class="icon"><span class="fa fa-calendar"></span></div>
                                                        <input type="text" class="form-control checkin_date" placeholder="Check In Date">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg d-flex">
                                                <div class="form-group p-4">
                                                    <label for="#">Check-out date</label>
                                                    <div class="form-field">
                                                        <div class="icon"><span class="fa fa-calendar"></span></div>
                                                        <input type="text" class="form-control checkout_date" placeholder="Check Out Date">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg d-flex">
                                                <div class="form-group p-4">
                                                    <label for="#">Price Limit</label>
                                                    <div class="form-field">
                                                        <div class="select-wrap">
                                                            <div class="icon"><span class="fa fa-chevron-down"></span></div>
                                                            <select name="" id="" class="form-control">
                                                                <option value="">$100</option>
                                                                <option value="">$10,000</option>
                                                                <option value="">$50,000</option>
                                                                <option value="">$100,000</option>
                                                                <option value="">$200,000</option>
                                                                <option value="">$300,000</option>
                                                                <option value="">$400,000</option>
                                                                <option value="">$500,000</option>
                                                                <option value="">$600,000</option>
                                                                <option value="">$700,000</option>
                                                                <option value="">$800,000</option>
                                                                <option value="">$900,000</option>
                                                                <option value="">$1,000,000</option>
                                                                <option value="">$2,000,000</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg d-flex">
                                                <div class="form-group d-flex w-100 border-0">
                                                    <div class="form-field w-100 align-items-center d-flex">
                                                        <input type="submit" value="Search" class="align-self-stretch form-control btn btn-primary p-0">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<section class="ftco-section services-section">
    <div class="container">
        <div class="row d-flex">
            <div class="col-md-6 order-md-last heading-section pl-md-5 ftco-animate d-flex align-items-center">
                <div class="w-100">
                    <span class="subheading">Welcome to ASIAN DREAM</span>
                    <h2 class="mb-4">{{ __('page-content.about.welcome.title') }}</h2>
                    <p>{{ __('page-content.about.welcome.content.1') }}</p>
                    <p>{{ __('page-content.about.welcome.content.2') }}</p>
                    <p><a href="#" class="btn btn-primary py-3 px-4">Search Destination</a></p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                        <div class="services services-1 color-1 d-block img" style="background-image: url(images/services-1.jpg);">
                            <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-paragliding"></span></div>
                            <div class="media-body">
                                <h3 class="heading mb-3">{{ __('page-content.about.media-body.1.title') }}</h3>
                                <p>{{ __('page-content.about.media-body.1.content') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                        <div class="services services-1 color-2 d-block img" style="background-image: url(images/services-2.jpg);">
                            <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-route"></span></div>
                            <div class="media-body">
                                <h3 class="heading mb-3">{{ __('page-content.about.media-body.2.title') }}</h3>
                                <p>{{ __('page-content.about.media-body.2.content') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                        <div class="services services-1 color-3 d-block img" style="background-image: url(images/services-3.jpg);">
                            <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-tour-guide"></span></div>
                            <div class="media-body">
                                <h3 class="heading mb-3">{{ __('page-content.about.media-body.3.title') }}</h3>
                                <p>{{ __('page-content.about.media-body.3.content') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                        <div class="services services-1 color-4 d-block img" style="background-image: url(images/services-4.jpg);">
                            <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-map"></span></div>
                            <div class="media-body">
                                <h3 class="heading mb-3">{{ __('page-content.about.media-body.4.title') }}</h3>
                                <p>{{ __('page-content.about.media-body.4.content') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section img ftco-select-destination" style="background-image: url(images/bg_3.jpg);">
    <div class="container">
        <div class="row justify-content-center pb-4">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">ASIAN DREAM Provide Places</span>
                <h2 class="mb-4">Select Your Destination</h2>
            </div>
        </div>
    </div>
    <div class="container container-2">
        <div class="row">
            <div class="col-md-12">
                <div class="carousel-destination owl-carousel ftco-animate">
                    @foreach ($countries as $country)
                        <div class="item">
                            <div class="project-destination">
                                <a href="{{ route('destination.index', ['country' => $country->id]) }}" class="img" style="background-image: url(<?php echo $country->image_link ?>);">
                                    <div class="text">
                                        <h3>{{ $country->name }}</h3>
                                        <span>{{ $country->number_of_tour }} Tours</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center pb-4">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">Destination</span>
                <h2 class="mb-4">Tour Destination</h2>
            </div>
        </div>
        <div class="row">
        @foreach ($data as $item)
            <div class="col-md-4 ftco-animate">
                <div class="project-wrap">
                    <a href="{{ route('destination.detail', ['id' => $item->id]) }}" class="img" style="background-image: url(<?php echo $item->image_link ?>);">
                        @if ($item->cost)
                            <span class="price">${{ $item->cost }}/person</span>
                        @else
                            <span class="price">Lien he</span>                    
                        @endif
                    </a>
                    <div class="text p-4">
                        <span class="days">{{ $item->num_of_day }} Days Tour</span>
                        <h3><a href="{{ route('destination.detail', ['id' => $item->id]) }}">{{ $item->name }} </a></h3>
                        <p class="location"><span class="fa fa-map-marker"></span> {{ $item->country->name }}</p>
                        @foreach ($item->prefectures as $prefecture)
                            <span class="flaticon-shower"></span>{{ $prefecture->name }}
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</section>

<section class="ftco-section ftco-about img" style="background-image: url(images/bg_4.jpg);">
    <div class="overlay"></div>
    <div class="container py-md-5">
        <div class="row py-md-5">
            <div class="col-md d-flex align-items-center justify-content-center">
                <a href="https://vimeo.com/45830194" class="icon-video popup-vimeo d-flex align-items-center justify-content-center mb-4">
                    <span class="fa fa-play"></span>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-about ftco-no-pt img">
    <div class="container">
        <div class="row d-flex">
            <div class="col-md-12 about-intro">
                <div class="row">
                    <div class="col-md-6 d-flex align-items-stretch">
                        <div class="img d-flex w-100 align-items-center justify-content-center" style="background-image:url(images/about-1.jpg);">
                        </div>
                    </div>
                    <div class="col-md-6 pl-md-5 py-5">
                        <div class="row justify-content-start pb-3">
                            <div class="col-md-12 heading-section ftco-animate">
                                <span class="subheading">About Us</span>
                                <h2 class="mb-4">{{ __('page-content.about.about-us.title') }}</h2>
                                <p>{{ __('page-content.about.about-us.content.1') }}</p>
                                <p><a href="#" class="btn btn-primary">Book Your Destination</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FEEDBACK -->
<!-- <section class="ftco-section testimony-section bg-bottom" style="background-image: url(images/bg_1.jpg);">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-center pb-4">
            <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
                <span class="subheading">Testimonial</span>
                <h2 class="mb-4">Tourist Feedback</h2>
            </div>
        </div>
        <div class="row ftco-animate">
            <div class="col-md-12">
                <div class="carousel-testimony owl-carousel">
                    <div class="item">
                        <div class="testimony-wrap py-4">
                            <div class="text">
                                <p class="star">
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </p>
                                <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                <div class="d-flex align-items-center">
                                    <div class="user-img" style="background-image: url(images/person_1.jpg)"></div>
                                    <div class="pl-3">
                                        <p class="name">Roger Scott</p>
                                        <span class="position">Marketing Manager</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap py-4">
                            <div class="text">
                                <p class="star">
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </p>
                                <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                <div class="d-flex align-items-center">
                                    <div class="user-img" style="background-image: url(images/person_2.jpg)"></div>
                                    <div class="pl-3">
                                        <p class="name">Roger Scott</p>
                                        <span class="position">Marketing Manager</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap py-4">
                            <div class="text">
                                <p class="star">
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </p>
                                <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                <div class="d-flex align-items-center">
                                    <div class="user-img" style="background-image: url(images/person_3.jpg)"></div>
                                    <div class="pl-3">
                                        <p class="name">Roger Scott</p>
                                        <span class="position">Marketing Manager</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap py-4">
                            <div class="text">
                                <p class="star">
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </p>
                                <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                <div class="d-flex align-items-center">
                                    <div class="user-img" style="background-image: url(images/person_1.jpg)"></div>
                                    <div class="pl-3">
                                        <p class="name">Roger Scott</p>
                                        <span class="position">Marketing Manager</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap py-4">
                            <div class="text">
                                <p class="star">
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </p>
                                <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                <div class="d-flex align-items-center">
                                    <div class="user-img" style="background-image: url(images/person_2.jpg)"></div>
                                    <div class="pl-3">
                                        <p class="name">Roger Scott</p>
                                        <span class="position">Marketing Manager</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->


<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center pb-4">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">Our Blog</span>
                <h2 class="mb-4">Recent Post</h2>
            </div>
        </div>
        <div class="row d-flex">
            @foreach ($blogs as $blog)
            <div class="col-md-4 d-flex ftco-animate">
                <div class="blog-entry justify-content-end">
                    <a href="{{ route('blog.detail', ['id' => $blog->id]) }}" class="block-20" style="background-image: url(<?php echo $blog->image_link ?>);">
                    </a>
                    <div class="text">
                        <div class="d-flex align-items-center mb-4 topp">
                            <div class="one mr-1">
                                <span class="day">{{ \Carbon\Carbon::parse($blog->created_at)->format('d') }}</span>
                            </div>
                            <div class="two">
                                <span class="yr">{{ \Carbon\Carbon::parse($blog->created_at)->format('Y') }}</span>
                                <span class="mos">{{ \Carbon\Carbon::parse($blog->created_at)->format('M') }}</span>
                            </div>
                        </div>
                        <h3 class="heading"><a href="{{ route('blog.detail', ['id' => $blog->id]) }}">{{ $blog->title }}</a></h3>
                        <p><a href="{{ route('blog.detail', ['id' => $blog->id]) }}" class="btn btn-primary">Read more</a></p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        $('.basic-multiple').select2();
        changeCountry();
    });
    function changeCountry() {
        const $input = $('#country-input');
        let country_id = $input.val() ?? 1;
        $('.prefectures').html("");
        $.ajax({
            url: '/admin/prefectures?select=' + <?php echo old('prefecture', \Request::get('prefecture')) ?? "''" ?>,
            type: 'POST',
            data: {
                country_id,
            },
            success: function(response) {
                if (response.success && response.html !== "") {
                    $('.prefectures').html('<option value="">-- All --</option>' + response.html)
                }
            }
        });
    }
</script>
@endsection