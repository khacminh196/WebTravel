@extends('admin.index')
@section('content')
    <h1>Blog List</h1>
    <a href="{{ route('admin.blog.create') }}">Create blog</a>
    <table class="table table-striped">
        <tr>
            <th>STT</th>
            <th>Category</th>
            <th>Title</th>
            <th>Created at</th>
            <th>Action</th>
        </tr>
        @foreach($data as $index => $item)
            <tr>
                <td>{{ ++$index }}</td>
                <td>{{ $item->category->name }}</td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->created_at }}</td>
                <td><a href="{{ route('admin.blog.edit', ['id' => $item->id]) }}">EDIT</a></td>
            </tr>
        @endforeach
    </table>
@endsection