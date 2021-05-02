@foreach ($posts as $key => $post)



    <div class="post__container ">
        <div class="post__sub-container-one ">
            <div class="post__image-container ">
                <img src="{{ url('/storage/uploades/posts') }}/{{ $post->image }}" class="post__image" alt="">
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
                        <a href="{{ route('post.edit', $post->id) }}"><button class="btn__apply">edit</button></a>
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

@endforeach
