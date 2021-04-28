@extends('web.layouts.master')
@section('links')
    <link rel="stylesheet" href="{{ asset('agreement/agreements-pending.css') }}">
@endsection

@section('title')
    Agreements
@endsection


@section('master')
    <div class="pending__agreements__container">
        @foreach ($agreements as $key => $agreement)
            @if ($agreement->freelance_accept == 0 || $agreement->freelance_accept == 1)
                <a href="{{ route('agreements.show', $agreement->id) }}" class="pending__agreements__subcont">
                    <div class="pending__agreement__detial">
                        <div class="pending__agreement">
                            <div class="pending__agreement__title">
                                <span class="section__title">agreement title</span>
                                <div class="content__center">

                                    <h3>{{ $agreement->project_title }}</h3>
                                </div>
                            </div>
                            <div class="pending__agreement__freelancer">
                                @if (Auth::user()->role_id == 3)
                                    <span class="section__title">Client</span>

                                    <div class="freelancer__info">
                                        <div class="freelancer__image"></div>
                                        <h3>{{ $agreements[$key]->userClient->first_name }}
                                            {{ $agreements[$key]->userClient->last_name }}</h3>
                                    </div>


                                @elseif(Auth::user()->role_id == 4)
                                    <span class="section__title">freelancer</span>
                                    <div class="freelancer__info">
                                        <div class="freelancer__image"></div>
                                        <h3>{{ $agreements[$key]->userFreelance->first_name }}
                                            {{ $agreements[$key]->userFreelance->last_name }}</h3>
                                    </div>

                                @endif


                            </div>
                            <div class="pending__agreement__progress">

                                <span class="section__title">progress</span>
                                <div class="content__center">
                                    <h3>{{ $agreement->project_status }}</h3>
                                </div>
                            </div>
                            <div class="pending__agreement__time">
                                <span class="section__title">Date posted</span>
                                <div class="content__center">
                                    <h3>{{ $agreement->date_start }}</h3>
                                </div>
                            </div>
                            <div class="pending__agreement__time">
                                <span class="section__title">Date Deadline</span>
                                <div class="content__center">
                                    <h3>{{ $agreement->date_end }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="agreement__progress">

                        </div>
                    </div>
                </a>
            @endif
        @endforeach

    @endsection
    @section('scripts')



    @endsection
