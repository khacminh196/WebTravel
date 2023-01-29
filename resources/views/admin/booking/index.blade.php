@extends('admin.index')
@section('content')
<div class="wrapper-table">
    <h1 class="title">Booking List</h1>
    <div class="form-search mb-4">
        <form action="">
            <div class="form-group">
                <label for="">Booking type:</label>
                <select class="custom-select" name="type_booking">
                    <option></option>
                    @foreach (\App\Enums\Constant::TYPE_BOOKING_TOUR_TEXT as $key => $text)
                        <option value="{{ $key }}" {{ old('type_booking', \Request::get('type_booking')) == $key ? "selected" : "" }}>{{ $text }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Status:</label>
                <select class="custom-select" name="status">
                    <option></option>
                    @foreach (\App\Enums\Constant::TOUR_STATUS as $key => $text)
                        <option value="{{ $key }}" {{ (string) old('status', \Request::get('status')) === (string) $key ? "selected" : "" }}>{{ $text }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Customer name:</label>
                <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="Search title" value="{{ old('name', \Request::get('name')) }}">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>
    <table class="table table-striped">
        <tr>
            <th>STT</th>
            <th>Loai booking</th>
            <th>Tour</th>
            <th>ten khach hang</th>
            <th>Dien thoai</th>
            <th>Email</th>
            <th>So nguoi</th>
            <th>Thoi gian du dinh</th>
            <th>Khach san mong muon</th>
            <th>Note</th>
            <th>Tinh trang</th>
            <th>Ngay booking tour</th>
            <th>Hanh dong</th>
        </tr>
        @foreach($data as $index => $item)
            <tr>
                <td>{{ ++$index }}</td>
                <td>{{ App\Enums\Constant::TYPE_BOOKING_TOUR_TEXT[$item->type_booking] }}</td>
                <td>{{ $item->tour_id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->phone }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->number_of_people }}</td>
                <td>{{ $item->expected_travel_time }}</td>
                <td>{{ $item->expected_travel_hotel }}</td>
                <td>{{ $item->note }}</td>
                <td>{{ App\Enums\Constant::TOUR_STATUS[$item->status] }}</td>
                <td>{{ $item->created_at }}</td>
                <td><a href="{{ route('admin.booking.detail', ['id' => $item->id]) }}">Detail</a></td>
            </tr>
        @endforeach
    </table>
</div>
@endsection