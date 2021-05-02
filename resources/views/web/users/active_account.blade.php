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
                <h2>Active Account</h2>
            </div>
            <div class="message__body">
                <p>Dear {{ Auth::user()->first_name }} please confirm account to access all the features.</p>
            </div>
            <div class="message__buttons">
                <a href="{{ url('/') }}" class="normal__btn">Home</a>
                <a href="{{ route('profile.create') }}" class="primary__btn">Confirm</a>
            </div>
        </div>
    </div>

@endsection
@section('scripts')



@endsection
