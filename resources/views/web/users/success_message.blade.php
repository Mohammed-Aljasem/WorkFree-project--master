@extends('web.layouts.master')
@section('links')
    <link rel="stylesheet" href="{{ asset('profile-style/message.css') }}">

@endsection

@section('title')
    Active account
@endsection


@section('master')

    <div class="message_container">
        <div class="message__card">
            <div class="message__header">
                <h2>Thank you</h2>
            </div>
            <div class="message__body">
                <p>Dear {{ Auth::user()->first_name }} thank you for add your information we will check your request and
                    replay
                    you.</p>
            </div>

        </div>
    </div>

@endsection
@section('scripts')



@endsection
