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
    <div class="list-data-admin">
        <table class="table table-striped">
            <tr>
                <th class="mw-50">STT</th>
                <th class="mw-100">Booking type</th>
                <th class="mw-180">Tour</th>
                <th class="mw-180">Customer name</th>
                <th class="mw-100">Customer phone</th>
                <th class="mw-180">Email</th>
                <th class="mw-80">Number of people</th>
                <th class="mw-180">Expected travel time</th>
                <th class="mw-80">Expected hotel</th>
                <th class="mw-80">User confirm</th>
                <th class="mw-250">Status</th>
                <th class="mw-180">Created at</th>
                <th class="mw-180">Action</th>
            </tr>
            @foreach($data as $index => $item)
                <tr>
                    <td>{{ ++$index }}</td>
                    <td>{{ App\Enums\Constant::TYPE_BOOKING_TOUR_TEXT[$item->type_booking] }}</td>
                    @if (!empty($item->tour))
                        <td><a target="_blank" href="{{ route('destination.detail', ['id' => $item->tour->id]) }}">{{ $item->tour->name ?? "" }}</a></td>
                    @else
                        <td></td>
                    @endif
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->number_of_people }}</td>
                    <td>{{ $item->expected_travel_time }}</td>
                    <td>{{ $item->expected_travel_hotel }}</td>
                    <td>
                        @if ($item->confirm == App\Enums\Constant::BOOKING_TOUR_CONFIRM['UNCONFIRMED'])
                            <span style="color: orange;">{{ array_flip(App\Enums\Constant::BOOKING_TOUR_CONFIRM)[$item->confirm] }}</span>
                        @else
                            <span style="color: green;">{{ array_flip(App\Enums\Constant::BOOKING_TOUR_CONFIRM)[$item->confirm] }}</span>
                        @endif
                    </td>
                    <td>
                        <form class="confirm-form" action="{{ route('admin.booking.update-status', ['id' => $item->id]) }}" method="POST">
                            @csrf
                            <div class="wrapper-select">
                                <select class="select-form-list option-status-{{$item->status}}" name="status" {{ $item->status == array_flip(App\Enums\Constant::TOUR_STATUS)['Complete'] ? 'disabled' : '' }}>
                                    @foreach (App\Enums\Constant::TOUR_STATUS as $key => $status)
                                        <option value="{{ $key }}" {{ $item->status === $key ? 'selected' : '' }}>{{ $status }}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-primary">Confirm</button>
                            </div>
                        </form>
                    </td>
                    <td>{{ $item->created_at ?? null }}</td>
                    <td><a href="{{ route('admin.booking.detail', ['id' => $item->id]) }}">Detail</a></td>
                </tr>
            @endforeach
        </table>
    <div>
    <div class="paginate">
        {{ $data->links() }}
    </div>
</div>
@endsection