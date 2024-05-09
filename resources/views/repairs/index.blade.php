<div class="header space-between no-borders std-padding">
    <h5>Repairs</h5>

</div>
<div class="col-md-12 std-padding-x">
    <div class="message" style="background: #eee;border-radius: 6px;border: solid .1px #ddd;padding: 10px 10px 10px 18px">
        <div class="right">
            Found  <strong style="padding: 0 5px"> {{$total}} </strong> repairs
        </div>
        <div class="left">
            {{-- <a href="#" onclick="openModal({'url':'{{route('branch.create')}}','modalId':'ajaxModal','method':'GET'})" class="std-btn-sm default">Add branch</a> --}}
        </div>
    </div>

    <div class="scrollview mt-3">
        @if (count($repairs) > 0)
            <table>
                <th>Service</th>
                <th>Status</th>
                <th>Date booked</th>
                <th>Customer name</th>
                <th>Email</th>
                <th style="text-align: right">Actions</th>

                @foreach ($repairs as $repair)
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
            <div class="message">
                <p>No repairs added yet</p>
            </div>
        @endif
    </div>
</div>
