<div class="header space-between no-borders std-padding">
    <h5>Chats</h5>
</div>
<div class="col-md-12 std-padding-x">
    <div class="message" style="background: #eee;border-radius: 6px;border: solid .1px #ddd;padding: 10px 10px 10px 18px">
        <div class="right">
            Found  <strong style="padding: 0 5px"> {{ $total }} </strong> chats
        </div>
        <div class="left"></div>
    </div>
    <div class="scrollview mt-3">
        @if (count($chats) > 0)
            <table>
                <th>Customer</th>
                <th>Messages</th>
                <th>last updated</th>
                <th style="text-align: right">Actions</th>

                @foreach ($chats as $chat)
                    <tr>
                        <td>{{$chat->user->name}}</td>
                        <td>
                            {{$chat->messages->count()}}
                        </td>
                        <td>{{$chat->messages[0]->updated_at}}</td>
                        <td>
                            <a href="#" onclick="openModal({'url':'{{route('chats.show',[$chat->id])}}','modalId':'ajaxModal','method':'GET'})"
                                class="std-btn-sm default"><i class="bi bi-eye"></i></a>
                        </td>
                    </tr>
                @endforeach
            </table>
        @else
            <div class="message">
                <p>No chats available.</p>
            </div>
        @endif
    </div>
</div>