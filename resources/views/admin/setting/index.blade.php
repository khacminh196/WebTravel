@extends('admin.index')
@section('content')
<div class="wrapper-table">
    <h2><a href="{{ route('admin.setting.change-password') }}">Change password</a></h2>
    <h2><a href="{{ route('admin.setting.change-contact') }}">Change contact</a></h2>
</div>
@endsection