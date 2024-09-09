<div class="header space-between no-borders std-padding">
    <h5>Support</h5>
</div>
<div class="col-md-12 std-padding-x">
    <div class="message" style="background: #eee;border-radius: 6px;border: solid .1px #ddd;padding: 10px 10px 10px 18px">
        <div class="right">
            Found  <strong style="padding: 0 5px"> {{ $total }} </strong> tickets
        </div>
        <div class="left"></div>
    </div>
    <div class="scrollview mt-3">
        @if (count($tickets) > 0)
            <table>
                <th>Customer</th>
                <th>Category</th>
                <th>Description</th>
                <th>status</th>
                <th style="text-align: right">Actions</th>

                @foreach ($tickets as $ticket)
                    <tr>
                        <td>{{$ticket->user->name}}</td>
                        <td>
                            {{$ticket->category}}
                        </td>
                        <td>{{$ticket->message}}</td>
                        <td>{{$ticket->status}}</td>
                        <td>
                            <a href="#" onclick="openModal({'url':'{{route('show.support',[$ticket->id])}}','modalId':'ajaxModal','method':'GET'})"
                                class="std-btn-sm default"><i class="bi bi-eye"></i></a>
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