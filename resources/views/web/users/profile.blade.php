@extends('web.layouts.master')

@section('links')

    <link href="{{ asset('profile-style/style.css') }}" rel="stylesheet" />
@endsection
@section('title')
    Profile
@endsection
@section('master')

    <div class="profile__container" @if (Auth::user()->role_id == 4) style="justify-content: center" @endif>
        <div class="profile__section__one">
            <div class="profile__card">
                <div class="profile__image"
                    style="background-image: url('{{ url('/storage/uploades/imageProfile') }}/{{ $user->image }}')">
                </div>
                <div class="profile__details">
                    <h2>{{ $user->first_name }} {{ $user->last_name }}</h2>
                    @if (Auth::user()->role_id == 3)
                        <span>
                            {{ $user->category->name }}
                        </span>
                    @endif
                    @if (!empty($user->country->name))

                        <span>{{ $user->country->name }}</span>

                    @endif
                </div>
                <a href="{{ route('profile.edit', $user->id) }}" class="profile__edit"><i
                        class="fas fa-user-edit"></i></a>
            </div>
            <div class="profile__about">
                <div class="about">
                    <h2>About</h2>
                    <p>
                        {{ $user->description }}
                    </p>
                </div>
                @if (Auth::user()->role_id == 3)
                    <div class="skills__profile">
                        <h3>Skills</h3>
                        @if (!empty($user->skills))


                            @foreach ($user->skills as $skill)

                                <span>{{ $skill->name }}</span>
                            @endforeach

                        @endif
                    </div>
                @endif
            </div>
        </div>
        @if (Auth::user()->role_id == 3)
            <div class="profile__section__two">
                <h2>Projects</h2>
                <a href="{{ url('projects/' . $user->id) }}" class="profile__edit"><i class="far fa-edit"></i></a>
                @if (!empty($user->projects))
                    @foreach ($user->projects as $project)
                        <div class="profile__projects">
                            <div class=".project__detial">
                                <h4>{{ $project->project_name }}</h4>
                                <span>{{ \Carbon\Carbon::parse($project->created_at)->format('Y-m') }}</span>
                                <p>{{ $project->description }}</p>
                            </div>
                        </div>
                    @endforeach
                @endif
                {{-- <div class="profile__projects">
                <div class=".project__detial">
                    <h4>Website</h4>
                    <span>2017-8</span>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem rerum explicabo minima ex ullam incidunt
                        neque officiis? Non sapiente nam repellendus. Fugit iusto eaque inventore dolores minima ipsum
                        mollitia recusandae!</p>
                </div>
            </div>
            <div class="profile__projects">
                <div class=".project__detial">
                    <h4>Website</h4>
                    <span>2017-8</span>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem rerum explicabo minima ex ullam incidunt
                        neque officiis? Non sapiente nam repellendus. Fugit iusto eaque inventore dolores minima ipsum
                        mollitia recusandae!</p>
                </div>
            </div> --}}
            </div>
        @endif
    </div>
@endsection

@section('scripts')

@endsection
