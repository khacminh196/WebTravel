@extends('admin.index')
@section('content')
<div class="wrapper-form">
		<h1>Booking tour detail</h1>
		<div class="wrapper-create-form">
            <div class="wrapper-input">
                <span>Booking type</span>
                <div>{{ App\Enums\Constant::TYPE_BOOKING_TOUR_TEXT[$detail->type_booking] }}</div>
            </div>
            <div class="wrapper-input">
                <span>Tour name</span>
                <div>{{ $detail->tour_id }}</div>
            </div>
            <div class="wrapper-input">
                <span>Customer name</span>
                <div>{{ $detail->name }}</div>
            </div>
            <div class="wrapper-input">
                <span>Customer phone</span>
                <div>{{ $detail->phone }}</div>
            </div>
            <div class="wrapper-input">
                <span>Customer email</span>
                <div>{{ $detail->email }}</div>
            </div>
            <div class="wrapper-input">
                <span>Number of people</span>
                <div>{{ $detail->number_of_people }}</div>
            </div>
            <div class="wrapper-input">
                <span>Expected travel time</span>
                <div>{{ $detail->expected_travel_time }}</div>
            </div>
            <div class="wrapper-input">
                <span>Expected travel hotel</span>
                <div>{{ $detail->expected_travel_hotel }}</div>
            </div>
            <div class="wrapper-input">
                <span>Note</span>
                <div>{{ $detail->note }}</div>
            </div>
            <div class="wrapper-input">
                <span>Status</span>
                <div>{{ App\Enums\Constant::TOUR_STATUS[$detail->status] }}</div>
            </div>
            <div class="wrapper-input">
                <span>Created date</span>
                <div>{{ $detail->created_at }}</div>
            </div>
		</div>
	</div>

<script>
</script>
@endsection