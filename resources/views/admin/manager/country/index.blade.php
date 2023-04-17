@extends('admin.index')
@section('content')
<div class="wrapper-table">
    <h1 class="title">Country List</h1>
    <p>
        <a href="{{ route('admin.manager.country.create-country') }}">Create country</a>
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
                    @if ($item->display === App\Enums\Constant::DISPLAY['HIDDEN'])
                        <td class="text-align-center">
                            <button class="btn btn-success"><a href="{{ route('admin.manager.country.change-country-status', ['id' => $item->id, 'status' => App\Enums\Constant::DISPLAY['SHOW']]) }}" style="color: white;" onclick="return confirm('Change this country to show? This will also make tours to this country visible.')">SHOW</a></button>
                        </td>
                    @elseif ($item->display === App\Enums\Constant::DISPLAY['SHOW'])
                        <td class="text-align-center">
                            <button class="btn btn-secondary"><a href="{{ route('admin.manager.country.change-country-status', ['id' => $item->id, 'status' => App\Enums\Constant::DISPLAY['HIDDEN']]) }}" style="color: white;" onclick="return confirm('Change this country to hidden? This will also cause tours to this country to be hidden.')">HIDDEN</a></button>
                        </td>
                    @endif
                </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection