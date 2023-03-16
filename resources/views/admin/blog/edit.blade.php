@extends('admin.index')
@section('content')
<div class="wrapper-form">
		<h1>Edit blog</h1>
		<div class="wrapper-create-form">
			<form action="" method="post" enctype="multipart/form-data" class="p-5 bg-light">
				@csrf
                <div class="wrapper-input">
                    <img src="{{ asset($data->image_link) }}" id="image" alt="" style="max-width: 200px">
                    <input type="file" name="image" id="image_input" onchange="changeImage()">
                </div>
				<span class="error">{{ $errors->first('image') }}</span>
				<div class="wrapper-input">
					<span>Title *</span>
					<input type="text" name="title" value="{{ $data->title }}">
				</div>
				<span class="error">{{ $errors->first('title') }}</span>
				<div class="wrapper-input">
					<span>Description</span>
					<textarea name="description" cols="30" rows="10">{{ $data->description }}</textarea>
				</div>
				<span class="error">{{ $errors->first('description') }}</span>
				<div class="wrapper-input">
					<span>Body</span>
					<textarea name="body" id="editor">
                        {{ $data->body }}
                    </textarea>
				</div>
				<span class="error">{{ $errors->first('body') }}</span>
				<div class="btn-submit">
					<button class="contact100-form-btn">
						<span>Submit</span>
					</button>
				</div>
			</form>
		</div>
	</div>

<script>
    function changeImage() {
        let image = document.getElementById('image_input').files;
        document.getElementById('image').src = URL.createObjectURL(image[0]);
    }
</script>
@endsection