@extends('web.layouts.master')

@section('links')

    <link href="{{ asset('profile-style/admin-profile.css') }}" rel="stylesheet" />
@endsection
@section('title')
    User profile
@endsection
@section('master')

    <div class="profile__container">
        <div class="profile__section__one">
            <div class="profile__card">
                <div class="profile__image" @if (!empty($user->image)) style="background-image: url('{{ url('/storage/uploades/imageProfile') }}/{{ $user->image }}') @endif"> </div>
                <div class="profile__details">
                    <h3>{{ $user->first_name }} {{ $user->last_name }}</h3>
                    @if (!empty($user->category->name))
                        <span>{{ $user->category->name }}</span>
                    @endif
                    @if (!empty($user->country->name))
                        <span>{{ $user->country->name }}</span>
                    @endif
                </div>


            </div>
            <div class="profile__about">
                <div class="about">
                    <h3>About</h3>
                    <p>
                        @if (!empty($user->description))
                            {{ $user->description }}
                        @endif

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
            @if (!empty($user->card_image))
                <h3>Card Image</h3>
                <div class="profile__card-image"
                    style="background-image: url('{{ url('/storage/uploades/cardsImages') }}/{{ $user->card_image }}')">
                </div>
            @endif
            @if (!empty($user->projects))

                <h3>Projects</h3>
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

        </div>
    </div>
@endsection

@section('scripts')

@endsection
