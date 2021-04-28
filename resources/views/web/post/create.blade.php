@extends('web.layouts.master')
@section('links')
    <link rel="stylesheet" href="{{ asset('posts/creat-post.css') }}">
@endsection

@section('title')
    Create Post
@endsection


@section('master')
    <div class="create__post_container">
        <form method="post" action="{{ route('post.store') }}" enctype="multipart/form-data">
            @csrf
            <h1>Create post</h1>
            <div class="post__input__title">
                <label for="title">Post title</label>
                <input type="text" name="title">
            </div>
            <div class="post__input__desc">
                <label for="title">Post description</label>
                <textarea name="description" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="post__input__image">

                <!-- /////////////////////////////////// -->

                <label for="image">Upload post image</label>
                <div class="upload__image">
                    <input type="text" class="form-control" readonly>
                    <div class="input-group-btn">
                        <span class="fileUpload btn btn-success">
                            <span class="upload__btn" id="upload">Upload</span>
                            <input type="file" name="image" class="upload up" id="up" onchange="" />
                        </span><!-- btn-orange -->
                    </div><!-- btn -->
                </div><!-- group -->

            </div>
            <!-- ////////////////////////////////////   -->


            <div class="post__input__skill">
                <h3>Select skills</h3>
                <div class="post_skills">

                    <div class="skills_container" id="skills_container">

                    </div>

                    <div class="skills_options">

                        <select name="from" id="skills">
                            <option selected disabled>Choose an option</option>
                            @foreach ($skills as $skill)
                                <option value="{{ $skill->id }}">{{ $skill->name }}</option>

                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="post__footer">
                <div class="post__input__budget">
                    <h3>Budget</h3>
                    <div class="post__range">
                        <div class="price">
                            <label for="from">From</label>
                            <input type="number" name="from">
                        </div>
                        <div class="price">
                            <label for="To">To</label>
                            <input type="number" name="to">
                        </div>
                    </div>
                </div>
                <div class="post__input__budget">
                    <h3>Category post</h3>
                    <div class="post__range flex_end">
                        <select name="from" id="categories">
                            <option selected disabled>Choose an option</option>
                            @foreach ($skills as $skill)
                                <option value="{{ $skill->id }}">{{ $skill->name }}</option>

                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="post__input__btn"><Button type="submit">Post</Button></div>
            </div>
        </form>
    </div>


@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).on('change', '.up', function() {
            var names = [];
            var length = $(this).get(0).files.length;
            for (var i = 0; i < $(this).get(0).files.length; ++i) {
                names.push($(this).get(0).files[i].name);
            }
            // $("input[name=file]").val(names);
            if (length > 2) {
                var fileName = names.join(', ');
                $(this).closest('.post__input__image').find('.form-control').attr("value", length +
                    " files selected");
            } else {
                $(this).closest('.post__input__image').find('.form-control').attr("value", names);
            }
        })




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

        function FilterSkills(arr, value) {

            return arr.filter(function(ele) {
                return ele != value;
            });
        }



        function add(val) {

            if (count < 10) {


                let x = document.getElementById('append');
                $('#skills_container').append(`<div class="skill"><span>${val}</span>
                                      <!-- data -->
                                            <input class="input" value="${val}"  type="text" name="skills[]" style="display: none;">
                                                <!--  -->
                                            <button type="button" class="delete-btn">X</button>
                                            </div>`);
            }
        }

    </script>


@endsection
