@extends('admin.index')
@section('content')
    <div class="wrapper-form">
		<h1>Edit tour</h1>
		<div class="wrapper-create-form">
			<form action="" method="post" enctype="multipart/form-data" class="p-5 bg-light">
				@csrf
				<div class="wrapper-input">
					<span>Name *</span>
					<input type="text" name="name" value="{{ $data->name }}">
				</div>
				<div class="wrapper-input">
					<span>Num of day *</span>
					<input type="text" name="num_of_day" value="{{ $data->num_of_day }}">
				</div>
				<div class="wrapper-input">
                    <img src="{{ asset($data->image_link) }}" id="image" alt="" style="max-width: 200px">
					<span>Image *</span>
					<input type="file" id="image_input" name="image" onchange="changeImage()">
				</div>
				<div class="wrapper-input">
					<span>Tag *</span>
					<input type="text" name="tag" value="{{ $data->tag }}">
				</div>
                <div class="wrapper-input">
					<span>Description *</span>
					<textarea name="description" id="message" cols="10" rows="4" class="form-control">{{ $data->description }}</textarea>
				</div>
                <div class="wrapper-input">
					<span>Content</span>
					<textarea name="content" id="editor">
                        {{ $data->content }}
                    </textarea>
				</div>
                <h1>Detail tour image</h1>
                <div class="wrapper-images">
                    @foreach ($data->images as $image)
                        <div id="remove-{{$image->id}}" class="mr-3" style="width: 200px; min-width: 200px; background: url(<?php echo $image->link ?>) no-repeat center; background-size: cover;">
                            <button type="button" onclick="addImageRemove(<?php echo $image->id ?>)"><span>DELETE</span></button>
                        </div>
                    @endforeach
                    <input type="hidden" name="image_remove" id="image_remove">
                </div>
                <div class="wrapper-input">
					<span>Images *</span>
					<input name="image_prefectures[]" type="file" multiple>
				</div>
                <h1>Detail tour prefecture</h1>
                <div class="wrapper-input">
                    <select class="basic-multiple" name="prefectures[]" multiple="multiple"></select><br>
                </div>
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
    <script>
        const $input = $('#country-input');
        function changeCountry() {
            let country_id = $input.val() ?? <?php echo $data->country_id ?>;
            $.ajax({
                url: '/admin/prefectures?multiple_selects=<?php echo implode(",", $prefectures->toArray()) ?>',
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

        function changeImage() {
            let image = document.getElementById('image_input').files;
            document.getElementById('image').src = URL.createObjectURL(image[0]);
        }

        function addImageRemove(id) {
            let imageRemove = $('#image_remove');
            let arrData = imageRemove.val() ? imageRemove.val().split(',') : [];
            const index = arrData.indexOf(id.toString());
            if (index > -1) {
                arrData.splice(index, 1);
                $(`#remove-${id} button span`).text('DELETE');
                $(`#remove-${id} button`).css('background-color', '#EFEFEF');
                
            } else {
                arrData.push(id);
                $(`#remove-${id} button span`).text('UNDELETE');
                $(`#remove-${id} button`).css('background-color', 'grey');
            }
            imageRemove.val(arrData.join(','));
        }
    </script>

    <style>
        .basic-multiple {
            width: 500px;
        }
    </style>
@endsection