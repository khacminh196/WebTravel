@extends('admin.index')
@section('content')
<div class="wrapper-table">
    <h1 class="title">Country List</h1>
    <p>
        <a href="{{ route('admin.manager.create-country') }}">Create country</a>
    </p>
    <div class="list-data-admin">
        <table class="table table-striped">
            <tr>
                <th class="mw-50">STT</th>
                <th class="mw-180">Name</th>
                <th class="mw-180">Display</th>
                <th class="mw-180">Action</th>
            </tr>
            @foreach($countries as $index => $item)
                <tr>
                    <td>{{ ++$index }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ array_flip(App\Enums\Constant::DISPLAY)[$item->display] }}</td>
                    <td class="text-align-center">
                        <button class="btn btn-primary">Delete</button>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection