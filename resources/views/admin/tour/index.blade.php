@extends('admin.index')
@section('content')
    <h1>Tour List</h1>
    <a href="{{ route('admin.tour.create') }}">Create tour</a>
    <table class="table table-striped">
        <tr>
            <th>STT</th>
            <th>Country</th>
            <th>Name</th>
            <th>Day</th>
            <th>Cost</th>
            <th>Tag</th>
            <th>Created at</th>
            <th colspan="2">Action</th>
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
@endsection