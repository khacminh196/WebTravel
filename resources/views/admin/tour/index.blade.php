@extends('admin.index')
@section('content')
<div class="wrapper-table">
    <h1 class="title">Tour List</h1>
    <div class="form-search mb-4">
        <form action="">
            <div class="form-group">
                <label for="">Country:</label>
                <select class="custom-select" name="country">
                    <option></option>
                    @foreach ($countries as $country)
                        <option value="{{ $country->id }}" {{ old('country', \Request::get('country')) == $country->id ? "selected" : "" }}>{{ $country->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Name:</label>
                <input type="text" class="form-control" name="keyword" id="exampleFormControlInput1" placeholder="Search title" value="{{ old('keyword', \Request::get('keyword')) }}">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>
    <p>
        <a href="{{ route('admin.tour.create') }}">Create tour</a>
    </p>
    <table class="table table-striped">
        <tr>
            <th>STT</th>
            <th>Country</th>
            <th>Name</th>
            <th>Day</th>
            <th>Cost</th>
            <th>Tag</th>
            <th>Created at</th>
            <th colspan="2" class="text-align-center">Action</th>
        </tr>
        @foreach($data as $index => $item)
            <tr>
                <td>{{ ++$index }}</td>
                <td>{{ $item->country->name }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->num_of_day }}</td>
                <td>{{ $item->cost }}</td>
                <td>{{ $item->tag }}</td>
                <td>{{ $item->created_at }}</td>
                <td><a href="{{ route('admin.tour.detail', ['id' => $item->id]) }}">Detail</a></td>
                <td><a href="{{ route('admin.tour.edit', ['id' => $item->id]) }}">EDIT</a></td>
            </tr>
        @endforeach
    </table>
</div>
@endsection