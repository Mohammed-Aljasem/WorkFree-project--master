@extends('web.layouts.master')
@section('links')
    <link rel="stylesheet" href="{{ asset('home-style/home-style.css') }}">
@endsection

@section('title')
    WorkFree
@endsection


@section('master')
    <section class="section">
        <div class="landing__container">
            <div class="welcome__message">
                <h1></h1>
                <p></p>
                <button>Join us</button>
            </div>

        </div>
        <div class="categories__container">
            <h1>
                Find the best talents in any this fields
            </h1>
            <p>Contact now with expert people to accomplish your projects efficiently and with high quality</p>

            <div class="landing__categories">
                @if (!empty($categories))
                    @foreach ($categories as $category)
                        <a href="www.google.com" class="category section1"
                            style="background-image: url('{{ url('/storage/uploades/categories') }}/{{ $category->image }}')">
                            <div class="effect__category">
                                <h3>{{ $category->name }}</h3>
                                <p>{{ $category->description }}</p>
                            </div>
                        </a>
                    @endforeach
                @endif

            </div>
        </div>
        <div class="landing__sections">
            <div class="landing__part__one">

                <div class="landing__sections-one">
                    <h1>WorkFree What's great about it ?</h1>
                    <h4>
                        <span> <img src="{{ asset('navbar/img/check.svg') }}" width="20" height="20"
                                style="margin-bottom:-0.3rem" alt=""></span>
                        Best place for find your talent
                    </h4>
                    <p>you will find the talents needed to get your business growing.</p>
                    <h4>
                        <span> <img src="{{ asset('navbar/img/check.svg') }}" width="20" height="20"
                                style="margin-bottom:-0.3rem" alt=""></span>
                        Quality work done quickly
                    </h4>
                    <p>Finish your work quickly and with high quality by expert professionals</p>
                    <h4>
                        <span> <img src="{{ asset('navbar/img/check.svg') }}" width="20" height="20"
                                style="margin-bottom:-0.3rem" alt=""></span>
                        Pay for experts
                    </h4>
                    <p>Connect to freelancers with proven business experiences</p>

                    {{-- <p>
                    <span> <img src="{{ asset('navbar/img/check.svg') }}" width="20" height="20"
                            style="margin-bottom:-0.3rem" alt=""></span>
                            
                        </p> --}}

                </div>
                <div class="landing__sections-two">

                </div>
            </div>
            <div class="landing__part__two">

                <div class="landing__sections-one">
                    <h1>Why choose us?</h1>
                    <h4>
                        <span> <img src="{{ asset('navbar/img/check.svg') }}" width="20" height="20"
                                style="margin-bottom:-0.3rem" alt=""></span>
                        Pay safely
                    </h4>
                    <p>secure payments because the money transfer is done after accepting the agreement</p>
                    <h4>
                        <span> <img src="{{ asset('navbar/img/check.svg') }}" width="20" height="20"
                                style="margin-bottom:-0.3rem" alt=""></span>
                        Best work environment
                    </h4>
                    <p>100% guarantee of dues and received immediately after the end of work</p>
                    <h4>
                        <span> <img src="{{ asset('navbar/img/check.svg') }}" width="20" height="20"
                                style="margin-bottom:-0.3rem" alt=""></span>
                        Huge business network
                    </h4>
                    <p>A large number of daily activities carried out by experienced professionals</p>

                    {{-- <p>
                    <span> <img src="{{ asset('navbar/img/check.svg') }}" width="20" height="20"
                            style="margin-bottom:-0.3rem" alt=""></span>
                            
                        </p> --}}

                </div>
                <div class="landing__sections-three">

                </div>
            </div>



        </div>

    </section>

@endsection
@section('scripts')


@endsection
