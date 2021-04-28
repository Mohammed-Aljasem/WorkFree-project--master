@extends('admin.layout.master')

@section('links')
    <link href="{{ asset('show-post-admin/style.css') }}" rel="stylesheet" />
@endsection
@section('main')
    {{-- table for freelancers requests --}}
    <div class="col-md-12">


        <div class="app">
            <header style="background-image: url('{{ url('/storage/uploades/posts') }}/{{ $post->image }}')">
                {{-- <a href="">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/154571/Official.png" alt="Earth News">
                </a> --}}
            </header>
            <nav>
                <a href="{{ url('/admin/post_approve/' . $post->id) }}" aria-current="page">Approve</a>
                <a href="{{ url('/admin/post_reject/' . $post->id) }}">Reject</a>
                <a href="{{ url('/admin/post_delete/' . $post->id) }}">Delete</a>
            </nav>
            <main>
                <h1><span>{{ $post->title }}</span> {{ $post->category->name }}</h1>
                <p>{{ $post->description }}</p>
                <span class="skills">Html</span>
                <span class="skills">Css</span>
                <span class="skills">Javascript</span>
                <br>
                <br>
                <a href="{{ url('/admin/posts') }}">Go back</a>
            </main>
        </div>

    </div>



@endsection
