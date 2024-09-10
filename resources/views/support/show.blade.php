<div class="" style="width: 500px;">
    <div class="modal-header">
        Ticket
    </div>
    <div class="col-md-12" style="padding: 0 30px 0 30px">
        <div class="header space-between no-borders" style="padding:0">
            <h6>Customer details</h6>
        </div>
        <div class="listItem"><span style="width: 150px">Name:</span> {{$ticket->user->name}}</div>
        <div class="listItem"><span style="width: 150px">Email address:</span> {{$ticket->user->email}}</div>
        <div class="listItem" style="border-bottom: none"><span style="width: 150px">Phone number:</span> {{$ticket->user->phone}}</div>

        <div class="header space-between no-borders" style="padding: 20px 0 0 0">
            <h6>Ticket details</h6>
        </div>
        <div class="listItem"><span style="width: 150px">Category:</span> {{$ticket->category}}</div>
        <div class="listItem"><span style="width: 150px">Description:</span> {{$ticket->message}}</div>
        <div class="listItem" style="border-bottom: none"><span style="width: 150px">Status:</span> {{$ticket->status}}</div>

        <div class="header space-between no-borders" style="padding: 20px 0 0 0">
            <h6>Ticket image</h6>
        </div>
        <div class="listItem" style="border-bottom: none"><span style="width: 150px">Image:</span> <a href="{{asset('support/' . $ticket->attachment)}}" target="__blank">open</a></div>

        <div class="btns mt-3" style="margin: 0 0 30px 0">
            <a href="#" class="std-btn" onclick="getView({'url':'{{route('support.index')}}','view':'ajax-view','modalId':'ajaxModal'})" style="border-right: 0">close</a>
        </div>
    </div>
</div>
