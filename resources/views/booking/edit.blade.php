@extends('main')
@section('content')

<section class="ftco-section contact-section mt-3">
    <div class="container">
        <div class="row block-9">
            <div class="col-md-6 order-md-last d-flex">
                <form method="POST" action="" class="bg-light p-5 contact-form" autocomplete="off">
                    @csrf
                    <input type="hidden" id="fullNumber" name="phone" value="{{ old('phone', $booking->phone) }}">
                    <h3 class="form-title">Edit your booking tour</h3>
                    <div class="form-group mt-3">
                        <input type="text" name="name" class="form-control" placeholder="{{ __('common.contact.your-name') }}" value="{{ old('name', $booking->name) }}">
                        @if ($errors->has('name'))
                            <span class="error">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input id="phone" type="text" class="form-control" value="{{ old('phone', $booking->phone) }}" />
                        <span id="span_error_phone" class="error"></span><br>
                        @if ($errors->has('phone'))
                            <span class="error">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="{{ __('common.contact.your-email') }}" value="{{ old('email', $booking->email) }}">
                        @if ($errors->has('email'))
                            <span class="error">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input name="number_of_people" type="number" name="title" class="form-control" placeholder="{{ __('common.contact.number-of-people') }}" value="{{ old('number_of_people', $booking->number_of_people) }}">
                        @if ($errors->has('number_of_people'))
                            <span class="error">{{ $errors->first('number_of_people') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input name="expected_travel_time" type="text" class="form-control checkin_date" placeholder="{{ __('common.contact.check-in-date') }}" value="{{ old('expected_travel_time', $booking->expected_travel_time) }}">
                        @if ($errors->has('expected_travel_time'))
                            <span class="error">{{ $errors->first('expected_travel_time') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('common.contact.expected-hotel') }} <span class="required">*</span></label>
                        <select name="expected_travel_hotel" id="" class="form-control" style="border: none;font-size: 14px;">
                            <option value="3" {{ old('expected_travel_hotel', $booking->expected_travel_hotel) == 3 ? 'selected' : '' }}>3*</option>
                            <option value="4" {{ old('expected_travel_hotel', $booking->expected_travel_hotel) == 4 ? 'selected' : '' }}>4*</option>
                            <option value="5" {{ old('expected_travel_hotel', $booking->expected_travel_hotel) == 5 ? 'selected' : '' }}>5*</option>
                        </select>
                        @if ($errors->has('expected_travel_hotel'))
                            <span class="error">{{ $errors->first('expected_travel_hotel') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <textarea name="note" id="" cols="30" rows="7" class="form-control" placeholder="{{ __('common.contact.note') }}">{{ old('note', $booking->note) }}</textarea>
                        @if ($errors->has('note'))
                            <span class="error">{{ $errors->first('note') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Confirm" class="btn btn-primary py-3 px-5">
                    </div>
                </form>

            </div>

            <div class="col-md-6 d-flex">
                <div id="map" class="bg-white"></div>
            </div>
        </div>
    </div>
</section>

<style>
    .ftco-navbar-light {
        background: #343a40 !important;
    }
</style>
@endsection