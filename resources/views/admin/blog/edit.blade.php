@extends('admin.index')
@section('content')
<form action="" method="post" enctype="multipart/form-data">
	@csrf
    <img src="{{ asset($data->image_link) }}" id="image" alt="">
	<input type="file" name="image" id="image_input" onchange="changeImage()"><br>
	Title: <input type="text" name="title" value="{{ $data->title }}"><br>
	Description: <textarea name="description" cols="30" rows="10">{{ $data->description }}</textarea><br>
	Body: <textarea name="body" id="editor">
        {{ $data->body }}
    </textarea>
	<button>Submit</button>
</form>

<script>
    function changeImage() {
        let image = document.getElementById('image_input').files;
        document.getElementById('image').src = URL.createObjectURL(image[0]);
    }
</script>
@endsection