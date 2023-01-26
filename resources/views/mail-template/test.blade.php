<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Booking tour</title>
</head>

<body>
    <h1>Cảm ơn bạn đã đặt tour tại abcd.com</h1>
    <h2>Yêu cầu của bạn đã được xác nhận và chúng tôi sẽ liên hệ lại với bạn trong thời gian sớm nhất, vui long kiem tra lai thong tin duoi day</h2>
    <p>Phone number: {{ $params['phone'] }}</p>
    <p>So nguoi du kien di: {{ $params['number_of_people'] }}</p>
    <p>Thoi gian du kien di: {{ $params['expected_travel_time'] }}</p>
    @if($params['expected_travel_hotel'])
        <p>Hotel du kien su dung: {{ $params['expected_travel_hotel'] }}*</p>
    @endif
    <!-- <p></p>
    @if ($params['password'])
        <h3>Để  tiện cho việc theo dõi chuyến đi của mình, vui lòng đăng nhập bằng tài khoản chúng tôi đã tạo dưới đây</h3>
        <p>Email: {{ $params['email'] }}</p>
        <p>Password: {{ $params['password'] }}</p>
        <p>{{ $url }}</p>
    @else 
        <h3>Chúng tôi nhận thấy tài khoản của bạn đã được đăng ký trước đây, để  tiện cho việc theo dõi chuyến đi của mình vui lòng đăng nhập bằng tài khoản của bạn https://localhost/login</h3>
        <p>Nếu bạn quên mật khẩu, vui lòng đặt lại mật khẩu: {{ $url }}/reset-passowrd</p>
    @endif -->
</body>
