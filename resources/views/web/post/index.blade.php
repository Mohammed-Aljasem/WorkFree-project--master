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
                    <div class="section__cat">
                        <h2>Section one</h2>
                    </div>
                    <div class="section__cat">
                        <h2>Section one</h2>
                    </div>
                    <div class="section__cat">
                        <h2>Section one</h2>
                    </div>
                    <div class="section__cat">
                        <h2>Section one</h2>
                    </div>
                </div>
            </div>
            <div class="posts__section">
                @if (!empty($posts))
                    @foreach ($posts as $key => $post)


                        <div class="post__container ">
                            <div class="post__sub-container-one ">
                                <div class="post__image-container ">
                                    <img src="https://images.unsplash.com/photo-1536104968055-4d61aa56f46a?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
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

                                            <img src="{{ url('/storage/uploades/posts') }}/{{ $post->image }}"
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
                                                <h5>{{ $post->created_at }}</h5>
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

                                        @if ($posts[$key]->user->id == Auth::id())
                                            <a href="{{ url('post.edit', $post->id) }}"><button
                                                    class="btn__apply">edit</button></a>
                                            <form method="post" action="{{ route('post.destroy', $post->id) }}">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <a href="{{ route('post.destroy', $post->id) }}"><button
                                                        class="btn__apply">delete</button></a>
                                            </form>
                                        @elseif(Auth::user()->role_id ==3)
                                            {{-- @foreach ($post->requests as $request) --}}
                                            {{-- @if ($request->user_id != Auth::id()) --}}
                                            {{-- <a ><button class="btn__apply">Applied</button></a> --}}
                                            {{-- @else --}}
                                            <a href="{{ url('/send_request/' . $post->id) }}"><button
                                                    class="btn__apply">Apply</button></a>
                                            {{-- @endif --}}
                                            {{-- @endforeach --}}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                @endif
                <div class="post__container ">
                    <div class="post__sub-container-one ">
                        <div class="post__image-container ">
                            <img src="https://images.unsplash.com/photo-1536104968055-4d61aa56f46a?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                                class="post__image" alt="">
                        </div>
                        <div class="post__mini-detail ">
                            <div class="budget__part">
                                <h3>Budget</h3>
                                <span>200$-300$</span>
                            </div>
                            <div class="skills__part">
                                <h3>skills</h3>
                                <span>Html5</span>
                                <span>Html5</span>
                                <span>Html5</span>
                                <span>Html5</span>
                                <span>Html5</span>
                                <span>Html5</span>
                                <span>Html5</span>


                            </div>
                        </div>
                    </div>
                    <div class="post__sub-container-two ">
                        <div class="post__many-detail ">
                            <div class="post__title ">
                                <h4> Lorem ipsum dolor sit amet consectetur </h4>
                            </div>
                            <div class="post__poster-detail ">
                                <div class="post__avatar">
                                    <img src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                                        class="post__poster-avatar" alt="">

                                </div>
                                <div class="post__poster">
                                    <div class="post__poster-name">
                                        <h4>Jon Doe</h4>
                                    </div>
                                    <div class="post__date">
                                        <h5>April-6</h5>
                                    </div>

                                </div>

                            </div>
                            <div class="post__description ">
                                <div class="post__description-title">
                                    <h5>Description:</h5>
                                </div>
                                <div class="post__description-body">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem molestias dolore
                                    exercitationem officia rerum dicta accusamus magni possimus minus atque nam expedita,
                                    numquam debitis facere minima sed eius, voluptatem iusto. Lorem ipsum dolor sit, amet
                                    consectetur adipisicing elit. Illo beatae voluptatem quod dolore a tenetur obcaecati
                                    perspiciatis, porro, iusto vitae, amet qui. Repellat perspiciatis molestiae maxime
                                    dolorum tenetur temporibus perferendis?
                                </div>
                            </div>
                            <div class="post__actions ">
                                <button>see more</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="post__container ">
                    <div class="post__sub-container-one ">
                        <div class="post__image-container ">
                            <img src="https://images.unsplash.com/photo-1536104968055-4d61aa56f46a?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                                class="post__image" alt="">
                        </div>
                        <div class="post__mini-detail ">
                            <div class="budget__part">
                                <h3>Budget</h3>
                                <span>200$-300$</span>
                            </div>
                            <div class="skills__part">
                                <h3>skills</h3>
                                <span>Html5</span>
                                <span>Html5</span>
                                <span>Html5</span>
                                <span>Html5</span>
                                <span>Html5</span>
                                <span>Html5</span>
                                <span>Html5</span>


                            </div>
                        </div>
                    </div>
                    <div class="post__sub-container-two ">
                        <div class="post__many-detail ">
                            <div class="post__title ">
                                <h4> Lorem ipsum dolor sit amet consectetur </h4>
                            </div>
                            <div class="post__poster-detail ">
                                <div class="post__avatar">
                                    <img src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                                        class="post__poster-avatar" alt="">

                                </div>
                                <div class="post__poster">
                                    <div class="post__poster-name">
                                        <h4>Jon Doe</h4>
                                    </div>
                                    <div class="post__date">
                                        <h5>April-6</h5>
                                    </div>

                                </div>

                            </div>
                            <div class="post__description ">
                                <div class="post__description-title">
                                    <h5>Description:</h5>
                                </div>
                                <div class="post__description-body">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem molestias dolore
                                    exercitationem officia rerum dicta accusamus magni possimus minus atque nam expedita,
                                    numquam debitis facere minima sed eius, voluptatem iusto. Lorem ipsum dolor sit, amet
                                    consectetur adipisicing elit. Illo beatae voluptatem quod dolore a tenetur obcaecati
                                    perspiciatis, porro, iusto vitae, amet qui. Repellat perspiciatis molestiae maxime
                                    dolorum tenetur temporibus perferendis?
                                </div>
                            </div>
                            <div class="post__actions ">
                                <button>see more</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('scripts')



    @endsection
