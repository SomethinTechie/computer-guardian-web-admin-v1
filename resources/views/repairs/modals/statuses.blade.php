<div class="" style="width: 300px">
    <div class="modal-header bb1">Update repair status</div>
    <div class="formSect active" style="padding: 0 20px 20px 20px">
        <div class="list">
            <div class="listItem hover space-between @if($repair->status === 'Booked') active @endif">Booked  @if($repair->status === 'Booked') <i class="bi bi-check-circle-fill"></i>@endif</div>

            <div class="listItem hover space-between @if($repair->status === 'Collected') active @endif">Collected @if($repair->status === 'Collected') <i class="bi bi-check-circle-fill"></i>@endif</div>

            <div class="listItem hover space-between @if($repair->status === 'Check-in') active @endif">Check-in @if($repair->status === 'Check-in') <i class="bi bi-check-circle-fill"></i>@endif</div>

            <div class="listItem hover space-between @if($repair->status === 'Diagnosing') active @endif">Diagnosing @if($repair->status === 'Diagnosing') <i class="bi bi-check-circle-fill"></i>@endif</div>

            <div class="listItem hover space-between @if($repair->status === 'Repairing') active @endif">Repairing @if($repair->status === 'Repairing') <i class="bi bi-check-circle-fill"></i>@endif</div>

            <div class="listItem hover space-between @if($repair->status === 'Returning/Awaiting collection') active @endif">Invoicing @if($repair->status === 'Invoicing') <i class="bi bi-check-circle-fill"></i>@endif</div>

            <div class="listItem hover space-between @if($repair->status === 'Check-in') active @endif">Returning/Awaiting collection @if($repair->status === 'Returning/Awaiting collection') <i class="bi bi-check-circle-fill"></i>@endif</div>

            <div class="listItem hover space-between @if($repair->status === 'Completed') active @endif">Completed @if($repair->status === 'Completed') <i class="bi bi-check-circle-fill"></i>@endif</div>

            <div class="listItem hover space-between @if($repair->status === 'Rating') active @endif">Rating @if($repair->status === 'Rating') <i class="bi bi-check-circle-fill"></i>@endif</div>
        </div>
        <div class="btns">
            <a href="#" class="std-btn" onclick="closeModal({'modalId':'ajaxModal'})" style="border-radius: 6px">Close</a>
        </div>
    </div>
</div>
