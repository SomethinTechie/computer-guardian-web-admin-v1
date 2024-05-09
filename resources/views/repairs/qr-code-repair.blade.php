@extends('layouts.app')

@section('content')
    <div class="" style="width: 100%;background: #f7f7f7;padding: 30px;border-radius: 4px">
        <h3>Repair information</h3><br>
        <p class="listItem"><span>Status:</span> {{ $repair->quoteRequest->status }}</p>
        <p class="listItem"><span>Device:</span> {{ $repair->quoteRequest->device }}</p>
        <p class="listItem"><span>Description:</span> {{ $repair->quoteRequest->description }}</p>
        <p class="listItem"><span>Make:</span> {{ $repair->quoteRequest->make }}</p>
        <p class="listItem"><span>Model:</span> {{ $repair->quoteRequest->model }}</p>
        <p class="listItem"><span>Processor:</span> {{ $repair->quoteRequest->processor }}</p>
        <p class="listItem"><span>Ram:</span> {{ $repair->quoteRequest->ram }}</p>
        <p class="listItem"><span>Storage:</span> {{ $repair->quoteRequest->storage }}</p>
        <p class="listItem"><span>Collection:</span> {{ $repair->quoteRequest->is_collection }}</p>
        <p class="listItem"><span>Dropoff:</span> {{ $repair->quoteRequest->is_dropoff }}</p>
        <p class="listItem"><span>Pickup:</span> {{ $repair->quoteRequest->pickup }}</p>
        <p class="listItem"><span>Pickup date:</span> {{ $repair->quoteRequest->pickup_date }}</p>
        <p class="listItem" style="border-bottom: none"><span>Requested date:</span>
            {{ $repair->quoteRequest->created_at }}</p>
    </div>
@endsection
