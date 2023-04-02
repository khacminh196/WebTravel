@extends('admin.index')
@section('content')
    <div class="wrapper-form">
		<h1>Create country</h1>
		<div class="wrapper-create-form">
			<form action="" method="post" enctype="multipart/form-data" class="p-5 bg-light">
				@csrf
				<div class="wrapper-input">
					<span>Name *</span>
					<input type="text" name="name">
				</div>
                <span class="error">{{ $errors->first('name') }}</span>
				<div class="wrapper-input">
					<span>Image *</span>
					<input type="file" name="image">
				</div>
                <span class="error">{{ $errors->first('image') }}</span>
                <div class="wrapper-input">
					<span>Display *</span>
					<select name="display" id="">
						@foreach (\App\Enums\Constant::DISPLAY as $index => $value)
							<option value="{{ $value }}">{{ $index }}</option>
						@endforeach
					</select>
				</div>
				<div class="btn-submit">
					<button class="contact100-form-btn">
						<span>Submit</span>
					</button>
				</div>
			</form>
		</div>
	</div>
@endsection