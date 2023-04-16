<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Booking tour</title>
</head>

<body>
    <h1>Cảm ơn bạn đã đặt tour tại ASIAN DREAM</h1>
    <h2>Yêu cầu của bạn đã được xác nhận và chúng tôi sẽ liên hệ lại với bạn trong thời gian sớm nhất, vui long kiem tra lai thong tin duoi day</h2>
    <p>Type booking: {{ App\Enums\Constant::TYPE_BOOKING_TOUR_TEXT[$params['type_booking']] }}</p>
    @if ($params['type_booking'] == App\Enums\Constant::TYPE_BOOKING_TOUR['EXISTS'])
        <p>Tour name: <a href="{{ route('destination.detail', ['id' => $params['tour_id']]) }}">{{ $params['tour_name'] }}</a></p>
    @endif
    <p>Your name: {{ $params['name'] }}</p>
    <p>Your phone: {{ $params['phone'] }}</p>
    <p>So nguoi du kien di: {{ $params['number_of_people'] }}</p>
    <p>Thoi gian du kien di: {{ $params['expected_travel_time'] }}</p>
    <p>Hotel du kien su dung: {{ $params['expected_travel_hotel'] }}*</p>
    <p>Vui lòng nhấn vào <a href="{{ route('edit-booking-tour', ['id' => $params['id'], 'token' => $params['token']]) }}">đây</a> để cập nhật nếu có sai sót về thông tin</p>
    <p>Nếu các thông tin đã chính xác vui lòng nhấn vào <a href="{{ route('booking-tour-confirm', ['id' => $params['id'], 'token' => $params['token']]) }}">day</a> để xác nhận việc đặt tour, chúng tôi sẽ liên lạc với bạn sớm nhất có thể</p>
</body>
