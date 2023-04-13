@extends('admin.index')
@section('content')
	<div class="wrapper-form">
		<h1>Create blog</h1>
		<div class="wrapper-create-form">
			<form action="" method="post" enctype="multipart/form-data" class="p-5 bg-light">
				@csrf
				<div class="wrapper-input">
					<span>Language *</span>
					<select name="language" id="">
						@foreach (App\Enums\Constant::LANGUAGE as $key => $value)
							<option value="{{ $value }}">{{ $key }}</option>
						@endforeach
					</select>
				</div>
				<span class="error">{{ $errors->first('language') }}</span>
				<div class="wrapper-input">
					<span>Image *</span>
					<input type="file" name="image">
				</div>
				<span class="error">{{ $errors->first('image') }}</span>
				<div class="wrapper-input">
					<span>Title *</span>
					<input type="text" name="title">
				</div>
				<span class="error">{{ $errors->first('title') }}</span>
				<div class="wrapper-input">
					<span>Category *</span>
					<select name="category_id" id="">
						@foreach ($categories as $category)
							<option value="{{ $category->id }}">{{ $category->name }}</option>
						@endforeach
					</select>
				</div>
				<span class="error">{{ $errors->first('category_id') }}</span>
				<div class="wrapper-input">
					<span>Description</span>
					<textarea name="description" id="message" cols="10" rows="4" class="form-control"></textarea>
				</div>
				<span class="error">{{ $errors->first('description') }}</span>
				<div class="wrapper-input">
					<span>Body</span>
					<textarea name="body" id="editor"></textarea>
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
@endsection
