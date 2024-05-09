<div class="" style="width: 300px">
    <div class="modal-header bb1">Update repair status</div>
    <div class="formSect active" style="padding: 0 20px 20px 20px">
        <div class="list" style="font-size: 12px">
            <div class="listItem hover space-between @if($repair->status === 'Booked') active @endif" onclick="openModal({'url':'{{route('repair.update.status',[$repair->id,'status' => 'Booked'])}}','modalId':'ajaxModal','method':'GET'})">
                Booked 
                @if($repair->status === 'Booked') <i class="bi bi-check-circle-fill"></i>@endif
            </div>

            <div class="listItem hover space-between @if($repair->status === 'Collected') active @endif" onclick="openModal({'url':'{{route('repair.update.status',[$repair->id,'status' => 'Collected'])}}','modalId':'ajaxModal','method':'GET'})">
                Collected
                @if($repair->status === 'Collected') <i class="bi bi-check-circle-fill"></i>@endif
            </div>

            <div class="listItem hover space-between @if($repair->status === 'Check-in') active @endif" onclick="openModal({'url':'{{route('repair.update.status',[$repair->id,'status' => 'Check-in'])}}','modalId':'ajaxModal','method':'GET'})">
                Check-in 
                @if($repair->status === 'Check-in') <i class="bi bi-check-circle-fill"></i>@endif
            </div>

            <div class="listItem hover space-between @if($repair->status === 'Diagnosing') active @endif" onclick="openModal({'url':'{{route('repair.update.status',[$repair->id,'status' => 'Diagnosing'])}}','modalId':'ajaxModal','method':'GET'})">
                Diagnosing 
                @if($repair->status === 'Diagnosing') <i class="bi bi-check-circle-fill"></i>@endif
            </div>

            <div class="listItem hover space-between @if($repair->status === 'Repairing') active @endif" onclick="openModal({'url':'{{route('repair.update.status',[$repair->id,'status' => 'Repairing'])}}','modalId':'ajaxModal','method':'GET'})">
                Repairing 
                @if($repair->status === 'Repairing') <i class="bi bi-check-circle-fill"></i>@endif
            </div>

            <div class="listItem hover space-between @if($repair->status === 'Returning/Awaiting collection') active @endif" onclick="openModal({'url':'{{route('repair.update.status',[$repair->id,'status' => 'Invoicing'])}}','modalId':'ajaxModal','method':'GET'})">
                Invoicing 
                @if($repair->status === 'Invoicing') <i class="bi bi-check-circle-fill"></i>@endif
            </div>

            <div class="listItem hover space-between @if($repair->status === 'Check-in') active @endif" onclick="openModal({'url':'{{route('repair.update.status',[$repair->id,'status' => 'Returning/Awaiting collection'])}}','modalId':'ajaxModal','method':'GET'})">
                Returning/Awaiting collection 
                @if($repair->status === 'Returning/Awaiting collection') <i class="bi bi-check-circle-fill"></i>@endif
            </div>

            <div class="listItem hover space-between @if($repair->status === 'Completed') active @endif" onclick="openModal({'url':'{{route('repair.update.status',[$repair->id,'status' => 'Completed'])}}','modalId':'ajaxModal','method':'GET'})">
                Completed 
                @if($repair->status === 'Completed') <i class="bi bi-check-circle-fill"></i>@endif
            </div>

            <div class="listItem hover space-between @if($repair->status === 'Rating') active @endif" onclick="openModal({'url':'{{route('repair.update.status',[$repair->id,'status' => 'Rating'])}}','modalId':'ajaxModal','method':'GET'})">
                Rating 
                @if($repair->status === 'Rating') <i class="bi bi-check-circle-fill"></i>@endif
            </div>
        </div>
        <div class="btns" style="font-size: 14px">
            <a href="#" class="std-btn" onclick="closeModal({'modalId':'ajaxModal'})" style="border-radius: 6px;font-size: 12px">Close</a>
        </div>
    </div>
</div>
