@extends('main')
@section('content')
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_1.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">{{ __('common.sidebar.home') }} <i class="fa fa-chevron-right"></i></a></span> <span>{{ __('common.label.contact-us') }} <i class="fa fa-chevron-right"></i></span></p>
                <h1 class="mb-0 bread">{{ __('common.label.contact-us') }}</h1>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section ftco-no-pb contact-section mb-4">
    <div class="container">
        <div class="row d-flex contact-info">
            <div class="col-md-3 d-flex">
                <div class="align-self-stretch box p-4 text-center">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="fa fa-map-marker"></span>
                    </div>
                    <h3 class="mb-2">{{ __('common.label.address') }}</h3>
                    <p>{{ $myContact->address }}</p>
                </div>
            </div>
            <div class="col-md-3 d-flex">
                <div class="align-self-stretch box p-4 text-center">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="fa fa-phone"></span>
                    </div>
                    <h3 class="mb-2">{{ __('common.label.contact-number') }}</h3>
                    <p><a href="tel://{{ $myContact->phone }}">{{ $myContact->phone }}</a></p>
                </div>
            </div>
            <div class="col-md-3 d-flex">
                <div class="align-self-stretch box p-4 text-center">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="fa fa-paper-plane"></span>
                    </div>
                    <h3 class="mb-2">{{ __('common.label.email-address') }}</h3>
                    <p><a href="mailto:{{ $myContact->email }}">{{ $myContact->email }}</a></p>
                </div>
            </div>
            <div class="col-md-3 d-flex">
                <div class="align-self-stretch box p-4 text-center">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="fa fa-globe"></span>
                    </div>
                    <h3 class="mb-2">Website</h3>
                    <p><a href="#">{{ $myContact->website }}</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section contact-section ftco-no-pt">
    <div class="container">
        <div class="row block-9">
            <div class="col-md-6 order-md-last d-flex">
                <form method="POST" action="{{ route('booking-tour.store') }}" class="bg-light p-5 contact-form" autocomplete="off">
                    @csrf
                    <input type="hidden" id="fullNumber" name="phone" value="{{ old('phone') }}">
                    <h3 class="form-title">{{ __('common.contact.booking-custom') }}</h3>
                    <div class="form-group mt-3">
                        <input type="text" name="name" class="form-control" placeholder="{{ __('common.contact.your-name') }}" value="{{ old('name') }}">
                        @if ($errors->has('name'))
                            <span class="error">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input id="phone" type="text" class="form-control" value="{{ old('phone') }}" />
                        <span id="span_error_phone" class="error"></span><br>
                        @if ($errors->has('phone'))
                            <span class="error">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="{{ __('common.contact.your-email') }}" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                            <span class="error">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input name="number_of_people" type="number" name="title" class="form-control" placeholder="{{ __('common.contact.number-of-people') }}" value="{{ old('number_of_people') }}">
                        @if ($errors->has('number_of_people'))
                            <span class="error">{{ $errors->first('number_of_people') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input name="expected_travel_time" type="text" class="form-control checkin_date" placeholder="{{ __('common.contact.check-in-date') }}" value="{{ old('expected_travel_time') }}">
                        @if ($errors->has('expected_travel_time'))
                            <span class="error">{{ $errors->first('expected_travel_time') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('common.contact.expected-hotel') }} <span class="required">*</span></label>
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
                        <textarea name="note" id="" cols="30" rows="7" class="form-control" placeholder="{{ __('common.contact.note') }}" value="{{ old('note') }}"></textarea>
                        @if ($errors->has('note'))
                            <span class="error">{{ $errors->first('note') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="submit" value="{{ __('common.contact.submit') }}" class="btn btn-primary py-3 px-5">
                    </div>
                </form>

            </div>

            <div class="col-md-6 d-flex">
                <div id="map" class="bg-white"></div>
            </div>
        </div>
    </div>
</section>
@endsection