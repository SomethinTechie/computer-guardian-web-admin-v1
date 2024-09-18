<div class="header space-between no-borders std-padding">
    <h5>Users</h5>

</div>
<div class="col-md-12 std-padding-x">
    <div class="message" style="background: #eee;border-radius: 6px;border: solid .1px #ddd;padding: 10px 10px 10px 18px">
        <div class="right">
            Found  <strong style="padding: 0 5px"> {{$total}} </strong> customers
        </div>
        <div class="left">
            <a href="#" onclick="openModal({'url':'{{route('admin.user.create')}}','modalId':'ajaxModal','method':'GET'})" class="std-btn-sm default">Add user</a>
        </div>
    </div>

    <div class="scrollview mt-3">
        @if (count($users) > 0)
            <table>
                <th>Name</th>
                <th>role</th>
                <th>Email</th>
                <th>Cellphone</th>
                <th style="text-align: right">Actions</th>

                @foreach ($users as $user)
                    <tr>
                        <td>
                            {{ $user->name }}
                        </td>
                        <td>
                            {{ $user->role }}
                        </td>
                        <td> {{$user->email}} </td>
                        <td>{{ $user->cellphone ?? 'Unavailable' }}</td>
                        <td>
                            <a href="#" onclick="openModal({'url':'{{ route('customer.delete.modal',[$user->id]) }}','modalId':'ajaxModal','method':'GET'})" class="std-btn-sm default"><i class="bi bi-trash"></i></a>
                            <a href="#" onclick="getView({'url':'{{ route('customer.show',[$user->id]) }}','view':'ajax-view'})" class="std-btn-sm default"><i class="bi bi-eye"></i></a>
                            <a href="#" onclick="openModal({'url':'{{ route('customer.edit',[$user->id]) }}','modalId':'ajaxModal','method':'GET'})" class="std-btn-sm default"><i class="bi bi-pen"></i></a>
                        </td>
                    </tr>
                @endforeach
            </table>
        @else
            <div class="message">
                <p>No users yet</p>
            </div>
        @endif
    </div>
</div>
