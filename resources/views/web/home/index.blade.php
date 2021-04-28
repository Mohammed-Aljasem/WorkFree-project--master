@extends('web.layouts.master')
@section('links')
    <link rel="stylesheet" href="{{ asset('home-style/home-style.css') }}">
@endsection

@section('title')
    WorkFree
@endsection
<section class="section">
    <div class="landing__container">
        <div class="welcome__message">
            <h1>Welcome to work free</h1>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla facilis ipsam, repellat quis animi sequi
                fugiat laborum alias quam </p>
            <button>Join us</button>
        </div>

    </div>
    <div class="categories__container">
        <h1>Best Services</h1>


        <div class="landing__categories">
            <a href="www.google.com" class="category section1">
                <div class="effect__category">
                    <h3>3D Graphic</h3>
                    <p>Lorem ipsum dolor sit amet.</p>
                </div>
            </a>
            <a class="category section2">
                <div class="effect__category">
                    <h3>3D Graphic</h3>
                    <p>Lorem ipsum dolor sit amet.</p>
                </div>
            </a>
            <a class="category section3">
                <div class="effect__category">
                    <h3>3D Graphic</h3>
                    <p>Lorem ipsum dolor sit amet.</p>
                </div>
            </a>
            <a class="category section4">
                <div class="effect__category">
                    <h3>3D Graphic</h3>
                    <p>Lorem ipsum dolor sit amet.</p>
                </div>
            </a>
        </div>
    </div>
    <div class="landing__sections">
        <div class="landing__sections-one">
            <h3>3D Graphic</h3>
            <p>Lorem ipsum dolor sit amet. </p>
            <p>Lorem ipsum dolor sit amet. </p>
            <p>Lorem ipsum dolor sit amet. </p>
            <p>Lorem ipsum dolor sit amet. </p>
            <p>Lorem ipsum dolor sit amet. </p>
        </div>
        <div class="landing__sections-two">
            <div class="landing__shape-one">
                <img src="pic.png" alt="">
            </div>
        </div>
        <div class="landing__sections-three">
            <div class="landing__shape-two">
                <img src="pic.png" alt="">
            </div>
        </div>
        <div class="landing__sections-four"></div>


    </div>

</section>

@section('master')


@endsection
@section('scripts')


@endsection
