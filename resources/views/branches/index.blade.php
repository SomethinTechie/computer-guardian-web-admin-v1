<div class="header space-between no-borders std-padding">
    <h5>Branches</h5>

</div>
<div class="col-md-12 std-padding-x">
    <div class="message" style="background: #eee;border-radius: 6px;border: solid .1px #ddd;padding: 10px 10px 10px 18px">
        <div class="right">
            Found  <strong style="padding: 0 5px"> {{$total}} </strong> branches
        </div>
        <div class="left">
            <a href="#" onclick="openModal({'url':'{{route('branch.create')}}','modalId':'ajaxModal','method':'GET'})" class="std-btn-sm default">Add branch</a>
        </div>
    </div>

    <div class="scrollview mt-3">
        @if (count($branches) > 0)
            <table>
                <th>Branch name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Email</th>
                <th style="text-align: right">Actions</th>

                @foreach ($branches as $branch)
                    <tr>
                        <td>
                            {{$branch->name}}
                        </td>
                        <td>{{$branch->address}}</td>
                        <td>{{$branch->phone}}</td>
                        <td>{{$branch->email}}</td>
                        <td>
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
