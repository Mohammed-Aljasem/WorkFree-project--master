@extends('web.layouts.master')
@section('links')
    <link rel="stylesheet" href="{{ asset('users-requests/users-cards.css') }}">

@endsection

@section('title')
    Post requests
@endsection


@section('master')

    <div class="cards">
        @if (!empty($post))
            @foreach ($post->users as $user)
                <div class="card-container">

                    @if (!empty($post->requests))
                        @foreach ($post->requests as $request)
                            @if ($request->user_id == $user->id)
                                @if ($request->accepted == 0)
                                    <span class="pro">
                                        pending
                                    </span>
                                @elseif($request->accepted == 1)
                                    <span class="pro" style="background: #5ad25a; ">
                                        Accepted
                                    </span>
                                @elseif($request->accepted == 2)
                                    <span class="pro" style="background: #f53932">

                                        Deleted
                                    </span>
                                @endif
                            @endif
                        @endforeach
                    @endif

                    <div class="profile__image round"
                        style="background-image: url('https://images.unsplash.com/photo-1586155638764-bf045442f5f3?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80')">
                    </div>

                    <h3>{{ $user->first_name }} {{ $user->last_name }}</h3>
                    @foreach ($countries as $country)
                        <h6>
                            @if ($user->country_id == $country->id)
                                {{ $country->name }}
                            @endif
                        </h6>
                    @endforeach
                    <p class="about__card"><span>About</span><br />
                        {{ $user->description }}
                    </p>
                    <div class="buttons">
                        @if (!empty($post->requests))
                            @foreach ($post->requests as $request)
                                @if ($request->user_id == $user->id)
                                    @if ($request->accepted == 0)

                                        <a href="{{ url('accept_request/' . $request->id) }}">
                                            <button class="primary">
                                                accept
                                            </button>
                                        </a>
                                        <a href="{{ route('profile.show', $user->id) }}">
                                            <button class="primary">
                                                Profile
                                            </button>
                                        </a>
                                    @elseif($request->accepted == 1)
                                        <button class="primary">
                                            Message
                                        </button>
                                        <a href="{{ url('delete_request/' . $request->id) }}">
                                            <button class="primary ghost">
                                                Delete
                                            </button>
                                        </a>
                                        <a href="{{ url('agreement_request/' . $user->id) }}">
                                            <button class="primary ghost">
                                                Agreement
                                            </button>
                                        </a>
                                    @elseif($request->accepted == 2)

                                    @endif
                                @endif
                            @endforeach
                        @endif

                    </div>
                    <div class="skills">
                        <h6>Skills</h6>
                        <ul>
                            @if (!empty($users))
                                @foreach ($users as $request)
                                    @if ($request->id == $user->id)
                                        @foreach ($user->skills as $skill)
                                            <li>{{ $skill->name }}</li>
                                        @endforeach
                                    @endif
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>

            @endforeach
        @endif

    </div>

@endsection
@section('scripts')



@endsection
