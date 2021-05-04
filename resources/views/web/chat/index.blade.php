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
                    <div class="col-md-5 col-xl-4 chat">
                        <div class="card mb-sm-3 mb-md-0 contacts_card">
                            <div class="card-header"></div>
                            <div class="card-body contacts_body">
                                <ui class="contacts">

                                    @foreach ($users as $user)
                                        @php
                                            $checkUser = App\Models\Message::where('from', $user->id)
                                                ->orWhere('from', Auth::id())
                                                ->first();
                                        @endphp
                                        @if (!empty($checkUser))
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
                                        @endif
                                    @endforeach
                                </ui>
                            </div>
                            <div class="card-footer"></div>
                        </div>
                    </div>
                    <div class="col-md-7 col-xl-6 chat">
                        <div class="card">
                            <div class="card-header msg_head">
                                <div class="d-flex bd-highlight speaker" id="speaker">

                                    <div class="img_cont">
                                        <img src="{{ asset('navbar/img/workfree.png') }}" class="rounded-circle user_img">
                                        <span class="online_icon"></span>
                                    </div>
                                    <div class="user_info">
                                        <span>WorkFree chat</span>
                                        <p> Messages</p>
                                    </div>


                                    {{-- <div class="video_cam">
                                        <span><i class="fas fa-video"></i></span>
                                        <span><i class="fas fa-phone"></i></span>
                                    </div> --}}

                                </div>

                                <div class="action_menu">

                                </div>
                            </div>
                            <div class="card-body msg_card_body" id="messages">
                                <div class="d-flex justify-content-start mb-4">
                                    <div class="img_cont_msg">
                                        <img src="{{ asset('navbar/img/workfree.png') }}"
                                            class="rounded-circle user_img_msg">
                                    </div>
                                    <div class="msg_cotainer">
                                        Hi, how are you?
                                        <span class="msg_time">8:40 AM, Today</span>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mb-4">
                                    <div class="msg_cotainer_send">
                                        Hi, I am good thanks how about you?
                                        <span class="msg_time_send">8:55 AM, Today</span>
                                    </div>
                                    <div class="img_cont_msg">
                                        <img src="{{ asset('navbar/img/workfree.png') }}"
                                            class="rounded-circle user_img_msg">
                                    </div>
                                </div>
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
        <script src="{{ asset('js/pusherNotifications.js') }}"></script>
        <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            var receiver_id = '';
            var my_id = "{{ Auth::user()->id }}"

            $(document).ready(function() {
                Pusher.logToConsole = true;

                var pusher = new Pusher('5eb317c3a54fce98d595', {
                    cluster: 'ap2'
                });

                var channel = pusher.subscribe('message');
                channel.bind('App\\Events\\MessageEvent', function(data) {
                    if (my_id == data.from) {
                        $('#' + data.to).click();
                    } else if (my_id == data.to) {

                        if (receiver_id == data.from) {

                            let receiver = data.from;

                            reload(receiver);
                        } else {


                            var pending = parseInt($('#' + data.form + ' ' + '.d-flex .img_cont').find(
                                '.pending').html());

                            if (pending) {
                                $('#' + data.from + ' ' + '.d-flex .img_cont').find('.pending').html(
                                    pending + 1);
                            } else {

                                $('#' + data.from + ' ' + '.d-flex .img_cont').append(
                                    '<span class="notification-message"></span>');
                                // $('#' + data.form).click();
                                $('.messages-icon').append(
                                    '<span class="notification-message"></span>');
                            }
                        }
                    }
                });

                var read = '.d-flex .img_cont .notification-message'

                $('.messages-icon').bind('DOMSubtreeModified', function() {

                });

                function reload(receiver) {
                    $.ajax({
                        url: "{{ url('/message') }}" + "/" + receiver,
                        type: 'get',
                        data: {},
                        cache: false,
                        success: function(data) {
                            $("#messages").html(data);
                            scrollToBottomFunc();

                        }
                    });
                }


                $(".user").click(function() {
                    $(".user").removeClass("active");
                    $(this).addClass("active");
                    $(this).find(read).remove();
                    receiver_id = $(this).attr('id');

                    $('.messages-icon').find('.notification-message').remove();

                    $.ajax({
                        url: "{{ url('/message') }}" + "/" + receiver_id,
                        type: 'get',
                        data: {},
                        cache: false,
                        success: function(data) {
                            $("#messages").html(data);
                            scrollToBottomFunc();

                        }
                    });
                    $.ajax({
                        url: "{{ url('/friend') }}" + "/" + receiver_id,
                        type: 'get',
                        data: {},
                        cache: false,
                        success: function(data) {
                            $("#speaker").html(data);


                        }
                    });
                });

                $(document).on('keyup', '#input-text-msg', function(e) {
                    var message = $(this).val();


                    if (e.keyCode == 13 && message != '' && receiver_id != '') {
                        $(this).val('');
                        var datastr = "receiver_id=" + receiver_id + "message=" + message;

                        $.ajax({
                            type: "post",
                            url: "{{ url('/message') }}",
                            data: {
                                "_token": "{{ csrf_token() }}",
                                "receiver_id": receiver_id,
                                "message": message,
                            },
                            cache: false,
                            success: function(data) {


                            },
                            error: function(jqXHR, status, arr) {

                            },
                            complete: function() {

                            }
                        })
                    };

                    $(".send_btn").click(function(e) {
                        var message = $('#input-text-msg').val();
                        $('#input-text-msg').val('');


                        var datastr = "receiver_id=" + receiver_id + "message=" + message;
                        $.ajax({
                            type: "post",
                            url: "{{ url('/message') }}",
                            data: {
                                "_token": "{{ csrf_token() }}",
                                "receiver_id": receiver_id,
                                "message": message,
                            },
                            cache: false,
                            success: function(data) {


                            },
                            error: function(jqXHR, status, arr) {

                            },
                            complete: function() {

                            }
                        })
                        $('#' + receiver_id).click();

                    })
                });
            });

            function scrollToBottomFunc() {
                $('#messages').animate({
                    scrollTop: $('#messages').get(0).scrollHeight
                }, 50);
            }


            var messageBody = document.querySelector('#messages');
            messageBody.scrollTop = messageBody.scrollHeight - messageBody.clientHeight;

        </script>
    @endsection
