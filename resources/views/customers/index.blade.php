<div class="header space-between no-borders std-padding">
    <h5>Customers</h5>

</div>
<div class="col-md-12 std-padding-x">
    <div class="message" style="background: #eee;border-radius: 6px;border: solid .1px #ddd;padding: 10px 10px 10px 18px">
        <div class="right">
            Found  <strong style="padding: 0 5px"> {{$total}} </strong> customers
        </div>
        <div class="left">
            <a href="#" onclick="openModal({'url':'{{route('customer.create')}}','modalId':'ajaxModal','method':'GET'})" class="std-btn-sm default">Add customer</a>
        </div>
    </div>

    <div class="scrollview mt-3">
        @if (count($customers) > 0)
            <table>
                <th>Customer number</th>
                <th>Name</th>
                <th>Email</th>
                <th>Cellphone</th>
                <th style="text-align: right">Actions</th>

                @foreach ($customers as $customer)
                    <tr>
                        <td>
                            {{ $customer->customer_number }}
                        </td>
                        <td>
                            {{ $customer->name }}
                        </td>
                        <td> {{$customer->email}} </td>
                        <td>{{ $customer->cellphone ?? 'Unavailable' }}</td>
                        <td>
                            <a href="#" onclick="openModal({'url':'{{ route('customer.delete.modal',[$customer->id]) }}','modalId':'ajaxModal','method':'GET'})" class="std-btn-sm default"><i class="bi bi-trash"></i></a>
                            <a href="#" onclick="getView({'url':'{{ route('customer.show',[$customer->id]) }}','view':'ajax-view'})" class="std-btn-sm default"><i class="bi bi-eye"></i></a>
                            <a href="#" onclick="openModal({'url':'{{ route('customer.edit',[$customer->id]) }}','modalId':'ajaxModal','method':'GET'})" class="std-btn-sm default"><i class="bi bi-pen"></i></a>
                        </td>
                    </tr>
                @endforeach
            </table>
        @else
            <div class="message">
                <p>No customers yet</p>
            </div>
        @endif
    </div>
</div>
