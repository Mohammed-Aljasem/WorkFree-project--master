@extends('web.layouts.master')
@section('links')
    <link rel="stylesheet" href="{{ asset('posts/style-post.css') }}">
    <link rel="stylesheet" href="{{ asset('posts/posts-page.css') }}">
@endsection

@section('title')
    Posts
@endsection


@section('master')<div class="create__post_container">
        <div class="posts__container">
            <div class="categories__aside">
                <div class="categories__section">
                    @if (Auth::user()->role_id == 4)
                        <a href="{{ route('post.create') }}" class="add__post">
                            <h2>Add Post</h2>
                        </a>
                    @endif
                    @if (!empty($categories))
                        @foreach ($categories as $category)
                            <a href="{{ url('category/' . $category->id) }}" class="section__cat">
                                <h2>{{ $category->name }}</h2>
                            </a>
                        @endforeach
                    @endif

                    <div class="section__cat">
                        <h2>Section one</h2>
                    </div>
                </div>
            </div>
            <div class="posts__container__main">
                <div class="posts_search">
                    <div class="search__input__field">
                        <button type="button" id="search_button"> <i class="fas fa-search"></i></button>
                        <input type="text" name="search" id="posts_search">
                    </div>
                </div>
                <div class="posts__section">
                    @if (!empty($posts))
                        @foreach ($posts as $key => $post)

                            @if ($post->approved_post == 1)

                                <div class="post__container ">
                                    <div class="post__sub-container-one ">
                                        <div class="post__image-container ">
                                            <img src="{{ url('/storage/uploades/posts') }}/{{ $post->image }}"
                                                class="post__image" alt="">
                                        </div>
                                        <div class="post__mini-detail ">
                                            <div class="budget__part">
                                                <h3>Budget</h3>
                                                <span>{{ $post->from }}$-{{ $post->to }}$</span>
                                            </div>
                                            <div class="skills__part">
                                                <h3>skills</h3>
                                                @if (!empty($post->skills))
                                                    @foreach ($post->skills as $skill)

                                                        <span>{{ $skill->name }}</span>

                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="post__sub-container-two ">
                                        <div class="post__many-detail ">
                                            <div class="post__title ">
                                                <h4>{{ $post->title }} </h4>
                                            </div>
                                            <div class="post__poster-detail ">
                                                <div class="post__avatar">

                                                    <img src="{{ url('/storage/uploades/imageProfile') }}/{{ $posts[$key]->user->image }}"
                                                        class="post__poster-avatar" alt="">

                                                </div>
                                                <div class="post__poster">
                                                    <div class="post__poster-name">
                                                        @if (!empty($posts[$key]->user->first_name))
                                                            <h4>{{ $posts[$key]->user->first_name }}
                                                                {{ $posts[$key]->user->last_name }}</h4>
                                                        @endif
                                                    </div>
                                                    <div class="post__date">
                                                        <h5>{{ \Carbon\Carbon::parse($post->created_at)->format('d-m-Y') }}
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="post__description ">
                                                <div class="post__description-title">
                                                    <h5>Description:</h5>
                                                </div>
                                                <div class="post__description-body">
                                                    {{ $post->description }}
                                                </div>
                                            </div>
                                            <div class="post__actions ">

                                                @if ($posts[$key]->user->id == Auth::id() && Auth::user()->confirm_account == 1)
                                                    <a href="{{ route('post.edit', $post->id) }}"><button
                                                            class="btn__apply">edit</button></a>
                                                    <form method="post" action="{{ route('post.destroy', $post->id) }}">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <a href="{{ route('post.destroy', $post->id) }}"><button
                                                                class="btn__apply">delete</button></a>
                                                    </form>
                                                @elseif(Auth::user()->role_id ==3 && Auth::user()->confirm_account == 1)
                                                    @php
                                                        $checkPost = App\Models\PostRequest::where('post_id', $post->id)
                                                            ->where('user_id', Auth::id())
                                                            ->first();
                                                    @endphp


                                                    @if (!empty($checkPost))

                                                        <a><button class="btn__apply">Applied</button></a>

                                                    @else

                                                        <a href="{{ url('/send_request/' . $post->id) }}"><button
                                                                class="btn__apply">Apply</button></a>
                                                    @endif
                                                @endif


                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    @endsection
    @section('scripts')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            $(document).on('keyup', '#posts_search', function(e) {
                var search = $(this).val();


                if (e.keyCode == 13 && search != '') {
                    $(this).val('');

                    $.ajax({
                        url: "{{ url('/post') }}" + "/" + search,
                        type: 'get',
                        data: {},
                        cache: false,
                        success: function(data) {
                            $(".posts__section").html(data);


                        }
                    })
                };

                $("#search_button").click(function(e) {
                    var search = $('#posts_search').val();
                    $('#posts_search').val('');



                    $.ajax({
                        url: "{{ url('/post') }}" + "/" + search,
                        type: 'get',
                        data: {},
                        cache: false,
                        success: function(data) {
                            $(".posts__section").html(data);


                        }
                    })



                })
            });

        </script>


    @endsection
