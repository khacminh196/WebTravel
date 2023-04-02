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
                    <form action="" class="search-property-1">
                        <div class="row no-gutters">
                            <div class="col-lg d-flex">
                                <div class="form-group p-4 border-0">
                                    <label for="#">{{ __('page-content.destination.type-of-travel') }}</label>
                                    <div class="form-field">
                                        <div class="icon"><span class="fa fa-search"></span></div>
                                        <input name="keyword" value="{{ old('keyword', \Request::get('keyword')) ? old('keyword', \Request::get('keyword')) : '' }}" type="text" class="form-control" placeholder="{{ __('common.input.search-place') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg d-flex">
                                <div class="form-group p-4">
                                    <label for="#">{{ __('common.input.country') }}</label>
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
                                    <label for="#">{{ __('common.input.prefecture') }}</label>
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
                                    <label for="#">{{ __('common.input.sort-day-tour') }}</label>
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
                                        <input type="submit" value="{{ __('common.input.search') }}" class="align-self-stretch form-control btn btn-primary">
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
            @if ($data->isEmpty())
                <h1>No data</h1>
            @endif
            @foreach ($data as $item)
                <div class="col-md-4 ftco-animate">
                    <div class="project-wrap">
                        <a href="{{ route('destination.detail', ['id' => $item->id]) }}" class="img" style="background-image: url(<?php echo $item->image_link ?>);">
                            @if ($item->cost)
                                <span class="price">${{ $item->cost }}/person</span>
                            @else
                                <span class="price">Liên hệ</span>                    
                            @endif
                        </a>
                        <div class="text p-4">
                            <span class="days">{{ $item->num_of_day }} Days Tour</span>
                            <h3><a href="{{ route('destination.detail', ['id' => $item->id]) }}">{{ $item->name }} </a></h3>
                            <p class="location"><span class="fa fa-map-marker"></span> {{ $item->country->name }}</p>
                            <!-- @foreach ($item->prefectures as $prefecture)
                                <span class="flaticon-shower"></span>{{ $prefecture->name }}
                            @endforeach -->
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