@extends('admin.index')
@section('content')
<div class="wrapper-table">
    <h1 class="title">Website Traffic</h1>
    <div class="form-search mb-4">
        <form action="">
            <label for="from">From:</label>
            <input autocomplete="off" type="text" class="start_date" name="start_date" value="{{ old('start_date', \Request::get('start_date')) }}">
            <label for="to">to:</label>
            <input autocomplete="off" type="text" class="end_date" name="end_date" value="{{ old('end_date', \Request::get('end_date')) }}">
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>
    <div class="list-data-admin">
        <table class="table table-striped">
            <tr>
                <th class="mw-50">STT</th>
                <th class="mw-180">Country</th>
                <th class="mw-180">Visit count</th>
            </tr>
            @foreach($data as $index => $item)
                <tr>
                    <td>{{ ++$index }}</td>
                    <td>{{ $item->country }}</td>
                    <td>{{ $item->sum_visit }}</td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
    <script>
        $(function() {
            $('.start_date, .end_date').datepicker({
                'format': 'yyyy-mm-dd',
                'autoclose': true,
            });
        });
    </script>
@endsection