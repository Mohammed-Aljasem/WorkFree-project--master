@extends('web.layouts.master')
@section('links')
    <link rel="stylesheet" href="{{ asset('posts/style-post.css') }}">
    <link rel="stylesheet" href="{{ asset('posts/manage-posts.css') }}">
@endsection

@section('title')
    Posts Manage
@endsection


@section('master')<div class="create__post_container">



        <div class="pending__posts__container">
            @if (!empty($posts))
                @foreach ($posts as $post)
                    <div class="pending__post">
                        <div class="pending__post__image"
                            style="background-image: url('{{ url('/storage/uploades/posts') }}/{{ $post->image }}')">
                            <!-- <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80" alt=""> -->
                        </div>
                        <div class="pending__post__title">
                            <span class="section__title">post title</span>
                            <div class="content__center">

                                <h3>{{ $post->title }}</h3>
                            </div>
                        </div>
                        <div class="pending__post__status">
                            <span class="section__title">Status</span>
                            <div class="content__center">

                                <h3 style="color:
                                        @if ($post->status == 0) orange
                                @elseif($post->status == 1)
                                    green
                                @elseif($post->status == 2)
                                    red @endif
                                    ;">
                                    @if ($post->status == 0)
                                        Pending
                                    @elseif($post->status == 1)
                                        approved
                                    @elseif($post->status == 2)
                                        disapprove
                                    @endif
                                </h3>
                            </div>
                        </div>
                        <div class="pending__post__submitted">

                            <span class="section__title">users submitted</span>
                            <div class="content__center">
                                <h3>
                                    <a href="{{ route('post.show', $post->id) }}">

                                        @if (!empty($post->users))
                                            {{ count($post->users) }}
                                        @else
                                            0
                                        @endif
                                    </a>

                                </h3>
                            </div>
                        </div>
                        <div class="pending__post__created">
                            <span class="section__title">Data posted</span>
                            <div class="content__center">
                                <h3>{{ $post->created_at }}</h3>
                            </div>
                        </div>
                    </div>


                @endforeach
            @endif
        </div>

    @endsection
    @section('scripts')



    @endsection
