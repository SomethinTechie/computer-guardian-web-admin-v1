<div class="header space-between no-borders std-padding">
    <h5>Branches</h5>

</div>
<div class="col-md-12 std-padding-x">
    <div class="message" style="background: #eee;border-radius: 6px;border: solid .1px #ddd;padding: 10px 10px 10px 18px">
        <div class="right">
            Found  <strong style="padding: 0 5px"> {{$total}} </strong> customers
        </div>
        <div class="left">
            <a href="#" onclick="openModal({'url':'{{route('quote.create')}}','modalId':'ajaxModal','method':'GET'})" class="std-btn-sm default">Add customer</a>
        </div>
    </div>

    <div class="scrollview mt-3">
        @if (count($customers) > 0)
            <table>
                <th>Name</th>
                <th>Email</th>
                <th>Cellphone</th>
                <th style="text-align: right">Actions</th>

                @foreach ($customers as $customer)
                    <tr>
                        <td>
                            {{ $customer->name }}
                        </td>
                        <td> {{$customer->email}} </td>
                        <td>{{ $customer->cellphone ?? 'Unavailable' }}</td>
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
                <p>No branches added yet</p>
            </div>
        @endif
    </div>
</div>
