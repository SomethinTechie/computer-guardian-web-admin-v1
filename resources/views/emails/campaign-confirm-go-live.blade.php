@component('mail::message')

@if(App::environment() != 'production')
    <strong><i>This mail was not sent from the Production server, and therefore is likely a test.</i></strong>
    <br>
@endif
# Campaign Go Live

#Details
## Brand: {{ $data['campaign']->brand_name }}
## Campaign name: {{ $data['campaign']->title }}
## Campaign dates: <strong>From</strong> {{ \Carbon\Carbon::parse($data['campaign']->start_date)->format('d F Y') }} - <strong>to</strong> {{ \Carbon\Carbon::parse($data['campaign']->end_date)->format('d F Y') }}
## Campaign type: {{ $data['campaign']->epos_campaign_type->name }}
## Campaign ID: {{ $data['campaign']->import_id }}
## Rainmaker contact: {{ $data['campaign']->user->name }} {{ $data['campaign']->user->email }}
## Draw Type: {{ $data['campaign']->epos_campaign_draw->name }}


@component('mail::button',['url' => $actionUrl])
    Publish Lpro Campaign
@endcomponent

@endcomponent