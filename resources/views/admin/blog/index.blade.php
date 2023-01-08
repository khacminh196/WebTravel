@extends('admin.index')
@section('content')
    <h1>Blog List</h1>

    @foreach($data as $item)
        <h3><a href="{{ route('admin.blog.edit', ['id' => $item->id]) }}">{{ $item->title }}</a></h3>
    @endforeach
@endsection