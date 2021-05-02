@extends('web.layouts.master')

@section('links')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js">
    </script>
    <link href="{{ asset('chat-style/style.css') }}" rel="stylesheet" />
@endsection
@section('title')
    chat
@endsection
@section('master')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container-fluid h-100">
                <div class="row justify-content-center h-100">
                    <div class="col-md-4 col-xl-3 chat">
                        <div class="card mb-sm-3 mb-md-0 contacts_card">

                            <div class="card-body contacts_body">
                                <ui class="contacts">
                                    @foreach ($users as $user)
                                        <li class="user " id="{{ $user->id }}">
                                            <div class="d-flex bd-highlight">
                                                <div class="img_cont">
                                                    <img src="{{ url('/storage/uploades/imageProfile') }}/{{ $user->image }}"
                                                        class="rounded-circle user_img">
                                                    {{-- <span class="online_icon"></span> --}}

                                                </div>
                                                <div class="user_info">
                                                    <span>{{ $user->first_name }} {{ $user->last_name }}</span>
                                                    <p>Click to chat</p>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach

                                </ui>
                            </div>
                            <div class="card-footer"></div>
                        </div>
                    </div>
                    <div class="col-md-8 col-xl-6 chat">
                        <div class="card">
                            <div class="card-header msg_head">
                                <div class="d-flex bd-highlight speaker" id="speaker">

                                    <div class="img_cont">
                                        <img src="{{ url('/storage/uploades/imageProfile') }}/{{ $userChat->image }}"
                                            class="rounded-circle user_img">
                                        {{-- <span class="online_icon"></span> --}}
                                    </div>
                                    <div class="user_info">
                                        <a href="{{ route('profile.show', $userChat->id) }}">{{ $userChat->first_name }}
                                            {{ $userChat->last_name }}</a>
                                        <p>{{ count($messages) }} Messages</p>
                                    </div>
                                    @if (Auth::user()->role_id == 4)
                                        <span id="action_menu_btn"><a
                                                href="{{ url('agreement_request/' . $userChat->id) }}"
                                                class="agreement-btn">Create
                                                agreement</a></span>
                                    @endif



                                    {{-- <div class="video_cam">
                                        <span><i class="fas fa-video"></i></span>
                                        <span><i class="fas fa-phone"></i></span>
                                    </div> --}}

                                </div>

                                <div class="action_menu">

                                </div>
                            </div>
                            <div class="card-body msg_card_body" id="messages">
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
                            </div>
                            <div class="card-footer">
                                <div class="input-group input-text-msg">
                                    <div class="input-group-append">
                                        <span class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>
                                    </div>
                                    {{-- <textarea name="" class="form-control type_msg" id="input-text-msg" placeholder="Type your message..."></textarea> --}}
                                    {{-- <form method="post" action="{{url('message')}}"> --}}
                                    {{-- @csrf --}}
                                    <input class="form-control" id="input-text-msg">
                                    {{-- </form> --}}
                                    <div class="input-group-append">
                                        <span class="input-group-text send_btn"><i class="fas fa-location-arrow"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('scripts')

    @endsection
