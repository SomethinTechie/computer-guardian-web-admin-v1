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
        @if (count($quotes) > 0)
            <table>
                <th>Quote ID</th>
                <th>Customer Name</th>
                <th>Parcel name</th>
                <th>Service</th>
                <th style="text-align: right">Actions</th>

                @foreach ($quotes as $quote)
                    <tr>
                        <td>
                            <input type="checkbox" style="float: left;width: 20px!important;margin: 5px 10px 0 0">
                            #89439
                        </td>
                        <td>{{$quote->user->name}}</td>
                        <td>{{$quote->make}}</td>
                        <td>{{$quote->service->name}}</td>
                        <td>
                            <a href="#" onclick="getView({'url':'{{route('courier.create',[$quote->id])}}','view':'ajax-view'})"
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
