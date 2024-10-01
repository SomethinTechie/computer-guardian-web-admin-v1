<!DOCTYPE html>
<html>
<head>
    <title>Password Reset</title>
</head>
<body>
    <h1>Password Reset Request</h1>
    <p>Hi {{ $otp }},</p>
    <p>We received a request to reset your password. Here is your OTP, <strong>{{$username}}</strong>.</p>
    <p>If you didn't request a password reset, please ignore this email.</p>
</body>
</html>
