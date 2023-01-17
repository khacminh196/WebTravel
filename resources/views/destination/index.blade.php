@extends('main')
@section('content')
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_1.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span> <span>Tour List <i class="fa fa-chevron-right"></i></span></p>
                <h1 class="mb-0 bread">Tours List</h1>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section ftco-no-pb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="search-wrap-1 ftco-animate">
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
                                            <select class="basic-multiple form-control" name="prefectures">
                                                <option value="">$5,000</option>
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
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row">
            @foreach ($data as $item)
                <div class="col-md-4 ftco-animate">
                    <div class="project-wrap">
                        <a href="#" class="img" style="background-image: url(<?php echo $item->image_link ?>);">
                            <span class="price">${{ $item->cost }}/person</span>
                        </a>
                        <div class="text p-4">
                            <span class="days">{{ $item->num_of_day }} Days Tour</span>
                            <h3><a href="#">{{ $item->name }} </a></h3>
                            <p class="location"><span class="fa fa-map-marker"></span> {{ $item->country->name }}</p>
                            @foreach ($item->prefectures as $prefecture)
                                <span class="flaticon-shower"></span>{{ $prefecture->name }}
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $data->links() }}
    </div>
</section>

<script>
    $(document).ready(function() {
        $('.basic-multiple').select2();
    });
</script>
@endsection