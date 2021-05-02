@foreach ($messages as $message)
    @if ($message->from === Auth::user()->id)
        <div class="d-flex justify-content-end mb-4">
            <div class="msg_cotainer_send">
                {{ $message->message }}
                <span class="msg_time_send">{{ $message->created_at }}</span>
            </div>
            <div class="img_cont_msg">
                <img src="{{ url('/storage/uploades/imageProfile') }}/{{ Auth::user()->image }}"
                    class="rounded-circle user_img_msg">
            </div>
        </div>
    @else
        <div class="d-flex justify-content-start mb-4">
            <div class="img_cont_msg">
                <img src="{{ url('/storage/uploades/imageProfile') }}/{{ $user->image }}"
                    class="rounded-circle user_img_msg">
            </div>
            <div class="msg_cotainer">
                {{ $message->message }}
                <span class="msg_time">{{ $message->created_at }}</span>
            </div>
        </div>
    @endif

@endforeach
