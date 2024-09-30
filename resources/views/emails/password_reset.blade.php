@component('mail::message')

@if(App::environment() != 'production')
    <strong><i>This mail was not sent from the Production server, and therefore is likely a test.</i></strong>
    <br>
@endif
# Password Reset Request

#
## Hi We {{ $data['user']->otp }},received a request to reset your password. Use the following OTP to validate you are an active user on the app, {{ $data['otp']->otp }}


@component('mail::button',['url' => $actionUrl])
    Publish Lpro Campaign
@endcomponent

@endcomponent