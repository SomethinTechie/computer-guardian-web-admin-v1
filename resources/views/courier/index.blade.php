<div class="header space-between no-borders std-padding">
    <h5>Quotations</h5>

</div>
<div class="col-md-12 std-padding-x">
    <div class="message" style="background: #eee;border-radius: 6px;border: solid .1px #ddd;padding: 10px 10px 10px 18px">
        <div class="right">
            Found {{ $total }}  approved quatations
        </div>
        <div class="left">
            {{-- <a href="#"
                onclick="openModal({'url':'{{ route('quote.create') }}','modalId':'ajaxModal','method':'GET'})"
                class="std-btn-sm default">Create quotation</a> --}}
        </div>
    </div>

    <div class="scrollview mt-3">
        @if (count($shipments) > 0)
            <table>
                <th>Count</th>
                <th>Waybill No</th>
                <th>Status</th>
                <th>Service</th>
                <th>Collection address</th>
                <th>Delivery address</th>
                <th>Created</th>
                <th style="text-align: right">Actions</th>

                @foreach ($shipments as $shipment)
                    <tr>
                        <td>
                            <input type="checkbox" style="float: left;width: 20px!important;margin: 5px 10px 0 0">
                            {{$shipment['short_tracking_reference']}}
                        </td>
                        <td>...</td>
                        <td>{{$shipment['status']}}</td>
                        <td>{{$shipment['service_level_code']}}</td>
                        <td>{{$shipment['collection_address']['street_address']}}</td>
                        <td>{{$shipment['delivery_address']['street_address']}}</td>
                        <td>{{ date('F d, Y h:i A', strtotime($shipment['time_created'])) }}</td>
                        <td>
                            <a href="#" onclick="getView({'url':'{{route('courier.create')}}','view':'ajax-view'})"
                                class="std-btn-sm default">Book collection</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        @else
            <div class="message">
                <p>No quotations found</p>
            </div>
        @endif
    </div>
</div>
