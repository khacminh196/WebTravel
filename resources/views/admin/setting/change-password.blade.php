@extends('admin.index')
@section('content')
    <div class="wrapper-form">
		<h1>Change password</h1>
		<div class="wrapper-create-form">
			<form action="" method="post" class="p-5 bg-light">
				@csrf
				<div class="wrapper-input">
					<span>New password</span>
					<input type="password" maxlength="20" name="password">
				</div>
                <span class="error">{{ $errors->first('password') }}</span>
				<div class="wrapper-input">
					<span>New password (confirm)</span>
					<input type="password" maxlength="20" name="password_confirm">
				</div>
                <span class="error">{{ $errors->first('password_confirm') }}</span>
				<div class="btn-submit">
					<button class="contact100-form-btn">
						<span>Submit</span>
					</button>
				</div>
			</form>
		</div>
	</div>
@endsection