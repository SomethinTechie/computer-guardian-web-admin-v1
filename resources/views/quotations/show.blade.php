<div class="" style="width: 100%;background: #f7f7f7;padding: 30px;border-radius: 4px">
    <h3>Quote request</h3><br>
    <p class="listItem"><span>Status:</span> {{$quote->status}}</p>
    <p class="listItem"><span>Device:</span> {{$quote->device}}</p>
    <p class="listItem"><span>Description:</span> {{$quote->description}}</p>
    <p class="listItem"><span>Make:</span> {{$quote->make}}</p>
    <p class="listItem"><span>Model:</span> {{$quote->model}}</p>
    <p class="listItem"><span>Processor:</span> {{$quote->processor}}</p>
    <p class="listItem"><span>Ram:</span> {{$quote->ram}}</p>
    <p class="listItem"><span>Storage:</span> {{$quote->storage}}</p>
    <p class="listItem"><span>Collection:</span> {{$quote->is_collection}}</p>
    <p class="listItem"><span>Dropoff:</span> {{$quote->is_dropoff}}</p>
    <p class="listItem"><span>Pickup:</span> {{$quote->pickup}}</p>
    <p class="listItem"><span>Pickup date:</span> {{$quote->pickup_date}}</p>
    <p class="listItem" style="border-bottom: none"><span>Requested date:</span> {{$quote->created_at}}</p>
    <div class="btns mt-3 col-md-3">
        <a href="#" class="std-btn" onclick="getView({'url':'{{route('quote.index')}}','view':'ajax-view'})">Back</a>
        <a href="#" class="std-btn" onclick="openModal({'modalId':'approveQuote'})">Approve</a>
    </div>
</div>