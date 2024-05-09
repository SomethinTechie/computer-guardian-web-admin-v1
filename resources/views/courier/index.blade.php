<div class="header space-between no-borders std-padding">
    <h5>Quotations</h5>

</div>
<div class="col-md-12 std-padding-x">
    <div class="message" style="background: #eee;border-radius: 6px;border: solid .1px #ddd;padding: 10px 10px 10px 18px">
        <div class="right">
            Found {{ $total }}  approved quatations
        </div>
        <div class="left">
            <select name="status" id="" class="std-btn-sm default" style="font-size: 14px;padding: 0 10px;height: 32px!important;float: left;border: none">
                <option value="Filter by date type">Date type</option>
                <option value="created">created</option>
                <option value="delivered">delivered</option>
            </select>
            <select name="status" id="" class="std-btn-sm default" style="font-size: 14px;padding: 0 10px;height: 32px!important;float: left;border: none">
                <option value="Delivered">Status</option>
                <option value="Delivered">Delivered</option>
                <option value="cancelled">cancelled</option>
                <option value="collection-failed-attempt">collection failed attempt</option>
                <option value="collected">collected</option>
            </select>
            <a href="#"
                onclick="getView({'url':'{{route('courier.create.collection')}}','view':'ajax-view'})"
                class="std-btn-sm default">Book Collection</a>
            <a href="#"
                onclick="getView({'url':'{{route('courier.create.delivery')}}','view':'ajax-view'})"
                class="std-btn-sm default">Book Delivery</a>
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
                            {{-- <input type="checkbox" style="float: left;width: 20px!important;margin: 5px 10px 0 0"> --}}
                            {{$shipment['account']['account_code']}}
                        </td>
                        <td>{{$shipment['short_tracking_reference']}}</td>
                        <td>{{$shipment['status']}}</td>
                        <td>{{$shipment['service_level_code']}}</td>
                        <td>{{ \Illuminate\Support\Str::limit($shipment['collection_address']['street_address'], 25) }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($shipment['delivery_address']['street_address'], 25) }}</td>
                        <td>{{ date('F d, Y h:i A', strtotime($shipment['time_created'])) }}</td>
                        <td>
                            <a href="#" onclick="getView({'url':'{{route('courier.create')}}','view':'ajax-view'})"
                                class="std-btn-sm default">Cancel</a>
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
