<div style="width: 500px">
    <div class="header space-between no-borders std-padding">
        <h5>Chat: {{$chat->user->name}}</h5>
        <i class="bi bi-x-lg" onclick="closeModal({'modalId':'ajaxModal'})"></i>
    </div>
    <div class="col-md-12 std-padding-x">
        <div class="message" style="background: #eee;border-radius: 6px;border: solid .1px #ddd;padding: 10px 10px 10px 18px">
            <div class="right">
                <strong style="padding: 0 5px"> {{ $total }} </strong> chat messages
            </div>
            <div class="left"></div>
        </div>
        <div class="scrollview mt-3">
            <div id="chat" class="chat">
                @foreach($chat->messages as $message)
                    <li class="{{ $chat->user->id === $message->user_id ? 'f-right' : '' }}">
                        <span>{{ $message->message }}</span>
                    </li>
                @endforeach
            </div>
        </div>
        <div class="chtform">
            <input id="replyText" type="text" placeholder="Enter reply...">
            <i class="bi bi-send" onclick="postReply({'user_id': {{Auth::user()->id}},'thread_id': {{$chat->id}}})"></i>
        </div>
    </div>
</div>