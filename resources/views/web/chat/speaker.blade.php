<div class="img_cont">
    <img src="{{ url('/storage/uploades/imageProfile') }}/{{ $user->image }}" class="rounded-circle user_img">
    {{-- <span class="online_icon"></span> --}}
</div>
<div class="user_info">
    <a href="{{ route('profile.show', $user->id) }}">{{ $user->first_name }} {{ $user->last_name }}</a>
    <p>{{ count($messages) }} Messages</p>
</div>
@if (Auth::user()->role_id == 4)
    <span id="action_menu_btn"><a href="{{ url('agreement_request/' . $user->id) }}" class="agreement-btn">Create
            agreement</a></span>
@endif
