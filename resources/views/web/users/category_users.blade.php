@extends('web.layouts.master')
@section('links')
    <link rel="stylesheet" href="{{ asset('users-requests/users-cards.css') }}">

@endsection

@section('title')
    Post requests
@endsection


@section('master')

    <div class="cards">
        @if (!empty($users))
            @foreach ($users as $key => $user)
                <div class="card-container">


                    <div class="profile__image round"
                        style="background-image: url('{{ url('/storage/uploades/imageProfile') }}/{{ $user->image }}')">
                    </div>

                    <h3>{{ $user->first_name }} {{ $user->last_name }}</h3>

                    <h6>

                        {{ $users[$key]->country->name }}

                    </h6>
                    <p class="about__card"><span>About</span><br />
                        {{ $user->description }}
                    </p>
                    <div class="buttons">



                        <a href="{{ route('profile.show', $user->id) }}">
                            <button class="primary">
                                Profile
                            </button>
                        </a>

                        <a href="{{ url('chat', $user->id) }}">
                            <button class="primary">
                                Message
                            </button>
                        </a>

                        <a href="{{ url('agreement_request/' . $user->id) }}">
                            <button class="primary ghost">
                                Agreement
                            </button>
                        </a>




                    </div>
                    <div class="skills">
                        <h6>Skills</h6>
                        <ul>
                            @if (!empty($users))
                                @foreach ($users[$key]->skills as $skill)
                                    <li>{{ $skill->name }}</li>
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
