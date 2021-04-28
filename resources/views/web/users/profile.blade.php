@extends('web.layouts.master')

@section('links')

    <link href="{{ asset('profile-style/style.css') }}" rel="stylesheet" />
@endsection
@section('title')
    hello
@endsection
@section('master')

    <div class="profile__container">
        <div class="profile__section__one">
            <div class="profile__card">
                <div class="profile__image"
                    style="background-image: url('{{ url('/storage/uploades/imageProfile') }}/{{ $user->image }}')">
                </div>
                <div class="profile__details">
                    <h3>{{ $user->first_name }} {{ $user->last_name }}</h3>
                    <span>Full-stack Developer</span>
                    <span>{{ $user->country->name }}</span>
                </div>

            </div>
            <div class="profile__about">
                <div class="about">
                    <h3>About</h3>
                    <p>
                        {{ $user->description }}
                    </p>
                </div>
                <div class="skills__profile">
                    <h3>Skills</h3>
                    @if (!empty($user->skills))


                        @foreach ($user->skills as $skill)

                            <span>{{ $skill->name }}</span>
                        @endforeach

                    @endif
                </div>
            </div>
        </div>
        <div class="profile__section__two">
            <h3>Projects</h3>
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
    </div>
@endsection

@section('scripts')

@endsection
