@extends('web.layouts.master')

@section('links')
    <link href="{{ asset('confirm-profile/custom-style.css') }}" rel="stylesheet" />
@endsection

@section('title')
    Edit projects
@endsection


@section('master')

    <form action="{{ url('projects/edit') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="create__agreement__container  part-3">
            <h1 for="">Projects</h1>
            <div class="agreement__inputs__group">
                <div class="agreement__inputs__group2" style="">
                    <div id="requirements">
                        @foreach ($projects as $project)
                            <div id="require" class="require">
                                <span class="delete-btn btn__delete" style="float: right;">Delete</span>
                                <div class="agreement__inputs">
                                    <label for="requirement">Project name</label>
                                    <input type="text" name="project_name[]" value="{{ $project->project_name }}">
                                </div>
                                <div class="Width__50">
                                    <div class="agreement__inputs ">
                                        <label for="title">Date Project</label>
                                        <input type="date" name="created_at[]"
                                            value="{{ \Carbon\Carbon::parse($project->created_at)->format('m/d/Y') }}">

                                    </div>
                                </div>
                                <div class="agreement__inputs">
                                    <label for="title">project description</label>
                                    <textarea name="description_project[]" id="" cols="30"
                                        rows="10"> {{ $project->description }}</textarea>
                                </div>
                                <br>
                                <hr>
                                <br>
                            </div>
                        @endforeach
                    </div>
                    <div class="agreement__inputs__group2">
                        <div class="agreement__inputs">
                            <div class="flex__end">

                                <button type="button" name="require__description" id="" class="normal__btn"
                                    onclick="addRequirement()">Add more Project</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sections__title flex__between">

                <button type="submit" class="primary__btn">finish</button>
            </div>


        </div>

        <!--//////////////////////////////////////////////////////// -->



    </form>
@endsection


@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        // functionality for dynamic skills



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
        for (i = 0; i < btnDel.length; i++) {
            var button = btnDel[i];
            button.addEventListener('click', function(event) {

                var buttonClicked = event.target;
                var parent = buttonClicked.parentElement;
                parent.remove();

            })
        }

        if (countRequire == 1) {
            $(".btn__delete").css("display", "none");

        } else {
            $(".btn__delete").css("display", "inline-block");

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

    </script>


@endsection
