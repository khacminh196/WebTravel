<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RESET PASSWORD</title>
</head>

<body>
    <h2>Please click <a href="{{ route('admin.password.reset-pw', ['token' => $token]) }}">here</a> to reset your password !</h2>
    <h2>Valid for 30 minutes from now.</h2>
</body>
