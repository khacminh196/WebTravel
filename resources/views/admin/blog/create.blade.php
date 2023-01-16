@extends('admin.index')
@section('content')
<div class="comment-form-wrap pt-5">
	<h3 class="mb-5" style="font-size: 20px; font-weight: bold;">Create blog</h3>
	<form action="" method="post" enctype="multipart/form-data" class="p-5 bg-light">
		@csrf
		<div class="form-group">
			<label for="name">Image *</label>
			<input type="file" name="image">
		</div>
		<div class="form-group">
			<label for="name">Title *</label>
			<input type="text" name="title"><br>
		</div>
		<div class="form-group">
			<label for="email">Category *</label>
			<select name="category_id" id="">
				@foreach ($categories as $category)
					<option value="{{ $category->id }}">{{ $category->name }}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label for="website">Description</label>
			<textarea name="description" id="message" cols="10" rows="4" class="form-control"></textarea>
		</div>
		<div class="form-group">
			<label for="message">Body</label>
			<textarea name="body" id="editor"></textarea>
		</div>
		<div class="form-group">
			<input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
		</div>

	</form>
</div>
@endsection