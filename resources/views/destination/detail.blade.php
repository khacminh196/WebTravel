@extends('main')
@section('content')
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url({{asset('images/bg_1.jpg')}});">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">{{ __('common.sidebar.home') }} <i class="fa fa-chevron-right"></i></a></span> <span>Tour List <i class="fa fa-chevron-right"></i></span></p>
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
                        @if ($item->type == 1) 
                            <div class="project-destination">
                                <div class="text" style="background-color: blanchedalmond">
                                    <a href="{{ asset($item->link) }}" class="icon-video popup-vimeo d-flex align-items-center justify-content-center mb-4">
                                        <i class="fa fa-play" style="font-size: 24px;"></i>
                                    </a>
                                </div>
                            </div>
                        @elseif ($item->type == 2)
                            <div class="project-destination" onclick="viewImage({{ json_encode(asset($item->link)) }})">
                                <div class="text" style="background-image: url({{ asset($item->link) }});">
                                    <!-- <h3>Vietnam</h3> -->
                                </div>
                            </div>
                        @endif
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
                        <h2>Booking this tour</h2>
                    </div>
                </div>
                <div class="sidebar-box">
                    <form method="POST" action="{{ route('booking-tour.store') }}" class="search-form">
                        @csrf
                        <input type="hidden" name="tour_id" value="{{ $data->id }}">
                        <input type="hidden" id="fullNumber" name="phone" value="{{ old('phone') }}">
                        <div class="form-group">
                            <label for="">Name <span class="required">*</span></label>
                            <input name="name" type="text" class="form-control" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                                <span class="error">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Phone <span class="required">*</span></label>
                            <input id="phone" type="text" class="form-control" value="{{ old('phone') }}" />
                            <span id="span_error_phone" class="error"></span>
                            @if ($errors->has('phone'))
                                <span class="error">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Email <span class="required">*</span></label>
                            <input name="email" type="text" class="form-control" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <span class="error">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Number of people <span class="required">*</span></label>
                            <input name="number_of_people" type="number" class="form-control" value="{{ old('number_of_people') }}">
                            @if ($errors->has('number_of_people'))
                                <span class="error">{{ $errors->first('number_of_people') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Expected travel time <span class="required">*</span></label>
                            <input name="expected_travel_time" autocomplete="off" type="text" class="form-control checkin_date" placeholder="Check In Date" value="{{ old('expected_travel_time') }}">
                            @if ($errors->has('expected_travel_time'))
                                <span class="error">{{ $errors->first('expected_travel_time') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Expected hotel <span class="required">*</span></label>
                            <select name="expected_travel_hotel" id="" class="form-control" style="border: none;font-size: 14px;">
                                <option value="3" {{ old('expected_travel_hotel') == 3 ? 'selected' : '' }}>3*</option>
                                <option value="4" {{ old('expected_travel_hotel') == 4 ? 'selected' : '' }}>4*</option>
                                <option value="5" {{ old('expected_travel_hotel') == 5 ? 'selected' : '' }}>5*</option>
                            </select>
                            @if ($errors->has('expected_travel_hotel'))
                                <span class="error">{{ $errors->first('expected_travel_hotel') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Note</label>
                            <textarea class="form-control" name="note" id="" cols="30" rows="10" style="border: none;font-size: 14px;" value="{{ old('note') }}"></textarea>
                            @if ($errors->has('note'))
                                <span class="error">{{ $errors->first('note') }}</span>
                            @endif
                        </div>
                        <p style="font-size: 20px;"><span class="required">*</span> input required</p>
                        <button class="align-self-stretch form-control btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="sidebar-box ftco-animate">
                    <h3>Don’t like filling our the form?</h3>
                    <p>{{ __('common.label.contact-us') }}: {{ $myContact->phone }} (Mr. A)</p>
                    <p>{{ $myContact->email }}</p>
                    <p>(From Monday to Saturday between 9am and 6pm Indochina Time)</p>
                </div></p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection