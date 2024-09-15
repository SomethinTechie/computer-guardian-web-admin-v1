<div class="header space-between no-borders std-padding">
    <h5>Repairs</h5>

</div>
<div class="col-md-12 std-padding-x">
    <div class="message" style="background: #eee;border-radius: 6px;border: solid .1px #ddd;padding: 10px 10px 10px 18px">
        <div class="left">
            Found  <strong style="padding: 0 5px"> {{$total}} </strong> repairs
        </div>
        <div class="right">
            <select onchange="getView({'url':'{{ route('repair.index') }}','view':'ajax-view','filter':this.value})" name="status" id="" class="std-btn-sm default" style="font-size: 14px;padding: 0 10px;height: 32px!important;float: left;border: none;margin-right: 20px">
                <option value="">{{$status}}</option>
                <option value="Booked">Booked</option>
                <option value="Collected">Collected</option>
                <option value="Check-in">Check-in</option>
                <option value="Diagnosis">Diagnosis</option>
                <option value="Repairing">Repairing</option>
                <option value="Invoicing">Invoicing</option>
                <option value="Returning/Awaiting collection">Returning/Awaiting collection</option>
                <option value="Completed">Completed</option>
            </select>
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
            <div class="message" style="padding: 0 20px;font-size: 14px;opacity: .6">
                <p>No {{$status}} repairs</p>
            </div>
        @endif
    </div>
</div>
