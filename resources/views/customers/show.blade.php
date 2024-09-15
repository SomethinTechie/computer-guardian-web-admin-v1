<div class="header space-between no-borders std-padding" style="padding-bottom: 0">
    <h5>Customer #C{{$customer->id}}</h5>
</div>
<div class="col-md-12 std-padding-x">
    <div class="scrollview mt-3">
        <div class="listItem"><span style="width: 150px">Name:</span> {{$customer->name}}</div>
        <div class="listItem"><span style="width: 150px">Email address:</span> {{$customer->email}}</div>
        <div class="listItem"><span style="width: 150px">Phone number:</span> {{$customer->cellphone ?? 'unavailable'}}</div>

        <div class="header space-between no-borders" style="padding: 20px 0 0 0">
            <h6>Repairs</h6>
        </div>
        @if (count($customer->repairs) > 0)
            <table>
                <th>Service</th>
                <th>Status</th>
                <th>Date booked</th>
                <th>Customer name</th>
                <th>Email</th>
                <th style="text-align: right">Actions</th>

                @foreach ($customer->repairs as $repair)
                    <tr>
                        <td>
                            {{$repair->quoteRequest->service->name}}
                        </td>
                        <td>{{$repair->status}}</td>
                        <td>{{$repair->created_at}}</td>
                        <td>{{$repair->quoteRequest->user->name}}</td>
                        <td>{{$repair->quoteRequest->user->email}}</td>
                        <td>
                            <a href="#" onclick="openModal({'url':'{{route('qr.code',[$repair->id])}}','modalId':'ajaxModal','method':'GET'})"
                                class="std-btn-sm default"><i class="bi bi-qr-code-scan"></i></a>
                            <a href="#" onclick="openModal({'url':'{{route('repair.statuses',[$repair->id])}}','modalId':'ajaxModal','method':'GET'})"
                                class="std-btn-sm default">Update status</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        @else
            <div class="message" style="padding: 0;font-size: 14px;opacity: .6">
                <p>Customer has no repairs</p>
            </div>
        @endif
    </div>
</div>
