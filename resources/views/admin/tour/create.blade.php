@extends('admin.index')
@section('content')
    <div class="wrapper-form">
		<h1>Create tour</h1>
		<div class="wrapper-create-form">
			<form action="" method="post" enctype="multipart/form-data" class="p-5 bg-light">
				@csrf
				<div class="wrapper-input">
					<span>Country *</span>
					<select name="country_id" id="country-input" onchange="changeCountry()">
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
				</div>
                <span class="error">{{ $errors->first('country_id') }}</span>
				<div class="wrapper-input">
					<span>Name *</span>
					<input type="text" name="name">
				</div>
                <span class="error">{{ $errors->first('name') }}</span>
				<div class="wrapper-input">
					<span>Num of day *</span>
					<input type="text" name="num_of_day">
				</div>
                <span class="error">{{ $errors->first('num_of_day') }}</span>
				<div class="wrapper-input">
					<span>Image *</span>
					<input type="file" name="image">
				</div>
                <span class="error">{{ $errors->first('image') }}</span>
				<div class="wrapper-input">
					<span>Tag *</span>
					<input type="text" name="tag">
				</div>
                <span class="error">{{ $errors->first('tag') }}</span>
                <div class="wrapper-input">
					<span>Description *</span>
					<textarea name="description" id="message" cols="10" rows="4" class="form-control"></textarea>
				</div>
                <span class="error">{{ $errors->first('description') }}</span>
                <div class="wrapper-input">
					<span>Content</span>
					<textarea name="content" id="editor"></textarea>
				</div>
                <span class="error">{{ $errors->first('content') }}</span>
                <h1>Detail tour image</h1>
                <div class="wrapper-input">
					<span>Images *</span>
					<input name="image_prefectures[]" type="file" multiple>
				</div>
                <span class="error">{{ $errors->first('image_prefectures') }}</span>
				<div class="btn-submit">
					<button class="contact100-form-btn">
						<span>Submit</span>
					</button>
				</div>
			</form>
		</div>
	</div>

    <script>
        $(document).ready(function() {
            $('.basic-multiple').select2();
        });
    </script>
    <!-- <script>
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
    </script> -->

    <style>
        .basic-multiple {
            width: 500px;
        }
    </style>
@endsection