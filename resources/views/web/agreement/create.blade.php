@extends('web.layouts.master')
@section('links')
    <link rel="stylesheet" href="{{ asset('agreement/style.css') }}">
@endsection

@section('title')
    Create Agreement
@endsection


@section('master')
    <div class="create__agreement__container">
        <form action="{{ route('agreements.store') }}" method="post">
            @csrf
            <div class="sections__title">
                <h3 for="">Project name</h3>
                <div class="agreement__inputs">
                    <label for="title">Input Title</label>
                    <input type="text" name="project_title" required>
                    <input type="text" name="freelance_id" style="display: none" value="{{ $user_id }}">
                </div>
            </div>
            <div class="sections__title">
                <h3 for="">Agreement Description</h3>
                <div class="agreement__inputs">
                    <label for="title">Input description</label>
                    <textarea name="description" id="" cols="30" rows="10" required></textarea>
                </div>
            </div>

            <div class="sections__title">
                <h3 for="">Requirements</h3>
                <div class="agreement__inputs__group">
                    <div class="agreement__inputs__group2" style="">
                        <div id="requirements">
                            <div id="require" class="require">
                                <span class="delete-btn btn__delete" style="float: right;">Delete</span>
                                <div class="agreement__inputs">
                                    <label for="requirement">Requirement </label>
                                    <input type="text" name="requirement_title[]" required>
                                </div>
                                <div class="agreement__inputs">
                                    <label for="title">Input Title</label>
                                    <textarea name="require_description[]" id="" cols="30" rows="10" required></textarea>
                                </div>
                                <br>
                                <hr>
                                <br>
                            </div>
                        </div>
                        <div class="agreement__inputs__group2">
                            <div class="agreement__inputs">
                                <div class="flex__end">

                                    <button type="button" name="require_description" id="" class="agreements__btn"
                                        onclick="addRequirement()">Add more Requirement</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            {{-- <div class="post__input__skill">
                <h3>Select skills</h3>
                <div class="post_skills">

                    <div class="skills_container" id="skills_container">

                    </div>

                    <div class="skills_options">
                        <select name="" id="skills" required>
                            <option selected disabled>Choose an option</option>
                            <option value="1">Pure CSS</option>
                            <option value="2">No JS</option>
                            <option value="3">Nice!</option>
                        </select>
                    </div>
                </div>
            </div> --}}
            <div class="sections__title">
                <h3 for="">More details</h3>
                <div class="agreement__inputs__group agreement__detail">
                    <div class="agreement__inputs">
                        <label for="budget">budget</label>
                        <input type="text" name="budget" required>
                    </div>
                    <div class="agreement__inputs">
                        <label for="date_start">Data Start</label>
                        <input type="date" name="date_start" required>
                    </div>
                    <div class="agreement__inputs">
                        <label for="date_end">Data end</label>
                        <input type="date" name="date_end" required>
                    </div>
                </div>
            </div>
            <div class="agreement__inputs__group ">
                <div class="agreement__inputs">
                    <label for="date_start">Buffer time</label>
                    <input type="date" name="buffer_time" required>
                </div>
                <div class="agreement__inputs">
                    <div class="flex__end">

                        <input type="submit" class="agreements__btn" value="Confirm reqirement">
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection


@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        // functionality for dynamic skills
        let w = $("#skills").change(function() {
            var val = $(this).children("option:selected").text();

            $(document).ready(function() {
                add(val);
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




        function add(val) {

            if (count < 10) {


                let x = document.getElementById('append');
                $('#skills_container').append(`<div class="skill"><span>${val}</span>
                                  <!-- data -->
                                        <input class="input" value="${val}"  type="text" name="skill[]" style="display: none;">
                                            <!--  -->
                                        <button type="button" class="delete-btn">X</button>
                                        </div>`);
            }
        }



        function addRequirement() {

            if (countRequire < 5) {


                let x = document.getElementById('requirements');
                $('#requirements').append(`
                                        <div id="require">
                                        <span class="delete-btn btn__delete" style="float: right;">Delete</span>
                                        <div class="agreement__inputs">
                                        <label for="requirement">Requirement   </label>
                                        <input type="text" name="requirement_title[]">
                                        </div>
                                        <div class="agreement__inputs">
                                        <label for="title">Input Title</label>
                                        <textarea name="require_description[]" id="" cols="30" rows="10"></textarea>
                                        </div>
                                        <br>
                                        <hr>
                                        <br>
                                        </div>`);
            }
        }

    </script>

@endsection
