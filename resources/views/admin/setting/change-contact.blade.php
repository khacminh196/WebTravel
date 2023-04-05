@extends('admin.index')
@section('content')
    <div class="wrapper-form">
		<h1>Change contact</h1>
		<div class="wrapper-create-form">
			<form action="" method="post" class="p-5 bg-light">
				@csrf
				<div class="wrapper-input">
					<span>Address</span>
					<textarea name="address">{{ old('address') ? old('address') : $myContact->address }}</textarea>
				</div>
                <span class="error">{{ $errors->first('address') }}</span>
				<div class="wrapper-input">
					<span>Phone number</span>
					<input type="text" maxlength="20" name="phone" value="{{ old('phone') ? old('phone') : $myContact->phone }}">
				</div>
                <span class="error">{{ $errors->first('phone') }}</span>
				<div class="wrapper-input">
					<span>Email</span>
					<input type="text" name="email" value="{{ old('email') ? old('email') : $myContact->email }}">
				</div>
                <span class="error">{{ $errors->first('email') }}</span>
                <div class="wrapper-input">
					<span>Website</span>
					<input type="text" name="website" value="{{ old('website') ? old('website') : $myContact->website }}">
				</div>
                <span class="error">{{ $errors->first('website') }}</span>
				<div class="btn-submit">
					<button class="contact100-form-btn">
						<span>Submit</span>
					</button>
				</div>
			</form>
		</div>
	</div>
@endsection