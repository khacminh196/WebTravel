@extends('admin.index')
@section('content')
    <h1>Create tour</h1>
    <form action="" method="post" enctype="multipart/form-data" class="p-5 bg-light">
        @csrf
        Country : <select name="country_id" id="country-input" onchange="changeCountry()">
            @foreach ($countries as $country)
                <option value="{{ $country->id }}">{{ $country->name }}</option>
            @endforeach
        </select><br>
        @if ($errors->has('country_id'))
            <span class="error">{{ $errors->first('country_id') }}</span><br>
        @endif
        Name : <input name="name" type="text"><br>
        @if ($errors->has('name'))
            <span class="error">{{ $errors->first('name') }}</span><br>
        @endif
        Num of day : <input name="num_of_day" type="number"><br>
        @if ($errors->has('num_of_day'))
            <span class="error">{{ $errors->first('num_of_day') }}</span><br>
        @endif
        Image : <input name="image" type="file"><br>
        @if ($errors->has('image'))
            <span class="error">{{ $errors->first('image') }}</span><br>
        @endif
        Tag: <input name="tag" type="text"><br>
        @if ($errors->has('tag'))
            <span class="error">{{ $errors->first('tag') }}</span><br>
        @endif
        Description <textarea name="description" id="" cols="30" rows="10"></textarea><br>
        @if ($errors->has('description'))
            <span class="error">{{ $errors->first('description') }}</span><br>
        @endif
        Content: <textarea name="content" id="editor"></textarea>
        @if ($errors->has('content'))
            <span class="error">{{ $errors->first('content') }}</span><br>
        @endif
        
        <h2>Detail tour image</h2>
        Images: <input name="image_prefectures[]" type="file" multiple><br>
        @if ($errors->has('image_prefectures'))
            <span class="error">{{ $errors->first('image_prefectures') }}</span><br>
        @endif
        <h2>Detail tour prefecture</h2>
        <select class="basic-multiple" name="prefectures[]" multiple="multiple"></select><br>
        @if ($errors->has('prefectures'))
            <span class="error">{{ $errors->first('prefectures') }}</span><br>
        @endif
        <button type="submit">Submit</button>
    </form>


    <script>
        $(document).ready(function() {
            $('.basic-multiple').select2();
        });
    </script>
    <script>
        const $input = $('#country-input');
        function changeCountry() {
            let country_id = $input.val() ?? 1;
            $.ajax({
                url: '/admin/prefectures',
                type: 'POST',
                data: {
                    country_id,
                },
                success: function(response) {
                    if (response.success) {
                        $('.basic-multiple').html(response.html)
                    }
                }
            });
        }
        $( document ).ready(function() {
            changeCountry();
        });
    </script>

    <style>
        .basic-multiple {
            width: 500px;
        }
    </style>
@endsection