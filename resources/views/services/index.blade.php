<div class="header space-between no-borders std-padding">
    <h5>Services</h5>

</div>
<div class="col-md-12 std-padding-x">
    <div class="message" style="background: #eee;border-radius: 6px;border: solid .1px #ddd;padding: 10px 10px 10px 18px">
        <div class="right">
            Found  <strong style="padding: 0 5px"> {{$total}} </strong> services
        </div>
        <div class="left">
            <a href="#" onclick="openModal({'url':'{{route('service.create')}}','modalId':'ajaxModal','method':'GET'})" class="std-btn-sm default">Add service</a>
        </div>
    </div>

    <div class="scrollview mt-3">
        @if (count($services) > 0)
            <table>
                <th>Service name</th>
                <th>status</th>
                <th>Quotes</th>
                <th style="text-align: right">Actions</th>

                @foreach ($services as $service)
                    <tr>
                        <td>
                            {{$service->name}}
                        </td>
                        <td>{{$service->status}}</td>
                        <td>{{$service->quote_requests->count()}}</td>
                        <td>
                            <a href="#" onclick="openModal({'url':'###','modalId':'ajaxModal','method':'GET'})"
                                class="std-btn-sm default">View</a>
                            <a href="#" onclick="openModal({'url':'###','modalId':'ajaxModal','method':'GET'})"
                                class="std-btn-sm default">Edit</a>
                            <a href="#" onclick="openModal({'url':'###','modalId':'ajaxModal','method':'DELETE'})"
                                class="std-btn-sm default">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        @else
            <div class="message">
                <p>No services added yet</p>
            </div>
        @endif
    </div>
</div>
