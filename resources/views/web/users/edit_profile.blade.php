@extends('web.layouts.master')

@section('links')


    <link href="{{ asset('confirm-profile/custom-style.css') }}" rel="stylesheet" />
@endsection
@section('title')
    Confirm Account
@endsection
@section('master')
    <form action="{{ route('profile.store', Auth::id()) }}" method="post" enctype="multipart/form-data">
        @csrf
        {{-- {{ method_field('PUT') }} --}}
        <div class="create__agreement__container   part-1">
            <h1 for="">Project name</h1>
            <div class="inputs__row">

                <div class="sections__title">
                    <div class="agreement__inputs">
                        <label for="title">First name</label>
                        <input type="text" name="first_name" value="{{ $user->first_name }}">
                    </div>
                </div>
                <div class="sections__title">

                    <div class="agreement__inputs">
                        <label for="title">Last Name</label>
                        <input type="text" name="last_name" value="{{ $user->last_name }}">
                    </div>
                </div>
            </div>
            <div class="inputs__row">
                <div class="width__75">
                    <div class="agreement__inputs ">
                        <label for="title">Email</label>
                        <input type="text" name="email" value="{{ $user->email }}">
                    </div>
                </div>
                <div class="width__33">
                    <div class="agreement__inputs ">
                        <label for="title">mobile</label>
                        <input type="number" name="mobile" value="{{ $user->mobile }}">
                    </div>
                </div>
            </div>
            <div class="inputs__row">
                <div class="width__75">
                    <div class="agreement__inputs ">
                        <label for="title">Your country</label>
                        <select name="country_id" class="select__input">

                            @if (!empty($countries))
                                <option selected value="{{ $user->country->id }}">{{ $user->country->name }}</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>

                <div class="Width__50">
                    <div class="agreement__inputs ">
                        <label for="title">Your age</label>
                        <input type="date" name="age" value="{{ $user->age }}">
                    </div>
                </div>
            </div>
            <div class="inputs__row">
                @if (Auth::user()->role_id == 3)
                    <div class="width__100">
                        <div class="agreement__inputs ">
                            <label for="title">Change Your Failed</label>
                            <select name="category_id" class="select__input">
                                <option selected value="{{ $user->category->id }}">{{ $user->category->name }}
                                </option>
                                @if (!empty($categories))
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                @endif
                <div class="width__50">
                    <div class="agreement__inputs ">
                        <label for="title">change your image</label>
                        <div class="upload-btn-wrapper">
                            <button class="normal__btn" style="width: 90%;">Upload</button>
                            <input type="file" name="image" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="sections__title">
                <div class="agreement__inputs">
                    <label for="title">About</label>
                    <textarea name="description" id="" cols="30" rows="10">{{ $user->description }}</textarea>
                </div>
            </div>
            @if (Auth::user()->role_id == 3)
                <div class="post__input__skill">
                    <h3>Select skills</h3>
                    <div class="post_skills">
                        <div class="skills_container" id="skills_container">
                            @if (!empty($user->skills))
                                @foreach ($user->skills as $skill)
                                    <div class="skill"><span>{{ $skill->name }}</span>
                                        <!-- data -->
                                        <input class="input" value="{{ $skill->id }}" type="text" name="skills[]"
                                            style="display: none;">
                                        <!--  -->
                                        <button type="button" class="delete-btn">X</button>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <select class="select__input" id="skills">
                            <option selected disabled>Choose an option</option>
                            @foreach ($skills as $skill)
                                <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            @endif
            <div class="sections__title  flex__end">
                <button type="submit" class="primary__btn">Edit</button>
            </div>
        </div>
        <!--//////////////////////////////////////////////////////// -->



    </form>
@endsection
@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        // functionality for dynamic skills


        function btn_one() {
            $(".part-1").css("display", "none");
            $(".part-2").css("display", "block");
        }

        function btn_two() {
            $(".part-2").css("display", "none");
            $(".part-3").css("display", "block");
        }





        function back_one() {
            $(".part-1").css("display", "block");
            $(".part-2").css("display", "none");
        }

        function back_two() {
            $(".part-2").css("display", "block");
            $(".part-3").css("display", "none");
        }





        $("#career").change(function() {
            var text = $(this).children("option:selected").text();
            var val = $(this).children("option:selected").val();


            if (val == 4) {
                $('#category').css("display", "none")
                $('.post__input__skill').css("display", "none")
                $(".part-3").css("display", "none");
                $(".client__btn").css("display", "block");
                $(".freelancer__btn").css("display", "none");
            } else {
                $(".client__btn").css("display", "none");
                $('#category').css("display", "block")
                $('.post__input__skill').css("display", "block")
                $(".freelancer__btn").css("display", "block");

            }

        });



        let w = $("#skills").change(function() {
            var text = $(this).children("option:selected").text();
            var val = $(this).children("option:selected").val();

            $(document).ready(function() {
                add(val, text);
            });

        });

        // create new element and change style
        let btnDel = document.getElementsByClassName('delete-btn');
        //count number of skill added
        var count = 0;
        countRequire = 1;
        $('#requirements').bind('DOMSubtreeModified', function() {
            countRequire = $("#requirements").children().length;

            for (i = 0; i < btnDel.length; i++) {
                var button = btnDel[i];
                button.addEventListener('click', function(event) {

                    var buttonClicked = event.target;
                    var parent = buttonClicked.parentElement;
                    parent.remove();

                })
            }
        });

        if (countRequire == 1) {
            $(".btn__delete").css("display", "none");

        } else {
            $(".btn__delete").css("display", "inline-block");

        }

        $('#skills_container').bind('DOMSubtreeModified', function() {
            count = $("#skills_container").children().length;


            for (i = 0; i < btnDel.length; i++) {
                var button = btnDel[i];
                button.addEventListener('click', function(event) {

                    var buttonClicked = event.target;
                    var parent = buttonClicked.parentElement;
                    parent.remove();

                })
            }
        });
        for (i = 0; i < btnDel.length; i++) {
            var button = btnDel[i];
            button.addEventListener('click', function(event) {

                var buttonClicked = event.target;
                var parent = buttonClicked.parentElement;
                parent.remove();

            })
        }


        function add(val, text) {

            if (count < 10) {


                let x = document.getElementById('append');
                $('#skills_container').append(`<div class="skill"><span>${text}</span>
                                                                              <!-- data -->
                                                                                    <input class="input" value="${val}"  type="text" name="skills[]" style="display: none;">
                                                                                        <!--  -->
                                                                                    <button type="button" class="delete-btn">X</button>
                                                                                    </div>`);
            }
        }

        function addRequirement() {

            if (countRequire < 5) {


                let x = document.getElementById('requirements');
                $('#requirements').append(
                    `
                                                                                                                                                                                                                        <div id="require" class="require">
                                                                                                                                                                                                                                <span class="delete-btn btn__delete" style="float: right;">Delete</span>
                                                                                                                                                                                                                                <div class="agreement__inputs">
                                                                                                                                                                                                                                    <label for="requirement">Project name</label>
                                                                                                                                                                                                                                    <input type="text" name="project_name[]">
                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                <div class="Width__50">
                                                                                                                                                                                                                                    <div class="agreement__inputs ">
                                                                                                                                                                                                                                        <label for="title">Date Project</label>
                                                                                                                                                                                                                                        <input type="date" name="created_at[]">
                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                <div class="agreement__inputs">
                                                                                                                                                                                                                                    <label for="title">project description</label>
                                                                                                                                                                                                                                    <textarea name="description_project[]" id="" cols="30" rows="10"></textarea>
                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                <br>
                                                                                                                                                                                                                                <hr>
                                                                                                                                                                                                                                <br>
                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                            `
                );
            }
        }

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah')


                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>


@endsection
