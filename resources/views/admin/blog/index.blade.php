@extends('admin.index')
@section('content')
<div class="wrapper-table">
    <h1 class="title">Blog List</h1>
    <div class="form-search mb-4">
        <form action="">
            <div class="form-group">
                <label for="">Category:</label>
                <select class="custom-select" name="category_id">
                    <option></option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', \Request::get('category_id')) == $category->id ? "selected" : "" }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Title:</label>
                <input type="text" class="form-control" name="title" id="exampleFormControlInput1" placeholder="Search title" value="{{ old('title', \Request::get('title')) }}">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>
    <hr>
    <p>
        <a href="{{ route('admin.blog.create') }}">Create blog</a>
    </p>
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
    <div class="paginate">
        {{ $data->links() }}
    </div>
</div>
@endsection