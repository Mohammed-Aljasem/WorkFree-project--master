@extends('web.layouts.master')

@section('links')

    <link rel="stylesheet"
        href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569006288/BBBootstrap/choices.min.css?version=7.0.0">
    <script src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569006273/BBBootstrap/choices.min.js?version=7.0.0">
    </script>

    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('confirm-profile/img/apple-icon.png') }}" />
    <link rel="icon" type="image/png" href="{{ asset('confirm-profile/img/favicon.png') }}" />

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <!-- CSS Files -->
    <link href="{{ asset('confirm-profile/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('confirm-profile/css/material-bootstrap-wizard.css') }}" rel="stylesheet" />


    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('confirm-profile/css/demo.css') }}" rel="stylesheet" />
    <link href="{{ asset('confirm-profile/css/custom-style.css') }}" rel="stylesheet" />
@endsection
@section('title')
    hello
@endsection
@section('master')

    <div class="col-sm-8 col-sm-offset-2">
        <!--      Wizard container        -->
        <div class="wizard-container">
            <div class="card wizard-card" data-color="purple" id="wizard">
                <form action="{{ route('profile.update', Auth::id()) }}" method="post" enctype="multipart/form-data">
                    <!--        You can switch " data-color="rose" "  with one of the next bright colors: "blue", "green", "orange", "purple"        -->
                    @csrf
                    {!! method_field('PUT') !!}
                    <div class="wizard-header">
                        <h3 class="wizard-title">
                            Confirm profile
                        </h3>
                        <h5>Enter your real information</h5>
                    </div>
                    <div class="wizard-navigation">
                        <ul>
                            <li><a href="#location" data-toggle="tab">Basic information</a></li>
                            <li><a href="#type" data-toggle="tab">Account Type</a></li>
                            <li><a href="#facilities" data-toggle="tab">Facilities</a></li>
                            <li><a href="#description" data-toggle="tab">Description</a></li>
                        </ul>
                    </div>

                    <div class="tab-content">
                        <div class="tab-pane" id="location">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h4 class="info-text"> Let's start with the basic details</h4>
                                </div>
                                <div class="col-sm-5 col-sm-offset-1">
                                    <div class="form-group label-floating">
                                        <label class="control-label">First Name</label>
                                        <input type="text" name="first_name" value="{{ Auth::user()->first_name }}"
                                            class="form-control" id="exampleInputEmail1">
                                    </div>
                                </div>
                                <div class="col-sm-5 ">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Last name</label>
                                        <input type="text" name="last_name" value="{{ Auth::user()->last_name }}"
                                            class="form-control" id="exampleInputEmail1">
                                    </div>
                                </div>
                                <div class="col-sm-5 col-sm-offset-1">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Email</label>
                                        <input type="email" name="email" class="form-control"
                                            value="{{ Auth::user()->email }}" id="exampleInputEmail1">
                                    </div>
                                </div>
                                <div class="col-sm-5 ">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Mobile Number</label>
                                        <input type="number" name="mobile" class="form-control" id="exampleInputEmail1">
                                    </div>
                                </div>
                                <div class="col-sm-5 col-sm-offset-1">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Country</label>
                                        <select name="country_id" class="form-control">
                                            <option disabled="" selected=""></option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach


                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-5">

                                    <label class="control-label" style="visibility: hidden;">Your Image</label>

                                    <input type="file" name="image" style="width: 100%" class="custom-file-input">


                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="type">
                            <h4 class="info-text">What type of account do you confirm ? </h4>
                            <div class="row">

                                <div class="col-sm-10 col-sm-offset-1">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Country</label>
                                        <select name="role_id" class="form-control">
                                            <option disabled="" selected=""></option>
                                            @foreach ($roles as $role)
                                                @if ($role->id > 2)
                                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                @endif
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-5 col-sm-offset-1">
                                <div class="form-group label-floating">
                                    <label class="control-label">project name</label>
                                    <input type="text" name="project_name[]" class="form-control" id="exampleInputEmail1">
                                </div>
                            </div>
                            <div class="col-sm-5 ">
                                <div class="form-group label-floating">
                                    <label for="dateofbirth" class="control-label" style="display: block;">Date of
                                        project</label>
                                    <input type="date" name="created_at[]" id="dateofbirth">
                                </div>
                            </div>
                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="form-group label-floating">
                                    <label class="control-label">project description</label>
                                    <textarea class="form-control" name="description_project[]" placeholder=""
                                        rows="3"></textarea>
                                </div>
                            </div>

                            <div class="col-sm-5 col-sm-offset-1">
                                <div class="form-group label-floating">
                                    <label class="control-label">project name</label>
                                    <input type="text" name="project_name[]" class="form-control" id="exampleInputEmail1">
                                </div>
                            </div>
                            <div class="col-sm-5 ">
                                <div class="form-group label-floating">
                                    <label for="dateofbirth" class="control-label" style="display: block;">Date of
                                        project</label>
                                    <input type="date" name="created_at[]" id="dateofbirth">
                                </div>
                            </div>
                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="form-group label-floating">
                                    <label class="control-label">project </label>
                                    <textarea class="form-control" name="description_project[]" placeholder=""
                                        rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="facilities">
                            <h4 class="info-text">Tell us more about facilities. </h4>
                            <div class="row">
                                <div class="col-sm-5 col-sm-offset-1">
                                    <div class="form-group label-floating">
                                        <label for="dateofbirth" class="control-label" style="display: block;">Date Of
                                            Birth</label>
                                        <input type="date" name="age" id="dateofbirth">
                                    </div>
                                </div>
                                <div class="col-sm-5 ">

                                    <label class="control-label" style="visibility: hidden;">Your Image</label>

                                    <input type="file" name="card_image" style="width: 100%" class="custom-file-input">



                                </div>
                                <br>
                                <div class="col-sm-10 col-sm-offset-1" id="skills">
                                    <div class=" ">
                                        <div class="">
                                            <select id="choices-multiple-remove-button" name="skills[]"
                                                placeholder="Select up to 10 tags" multiple>
                                                @foreach ($skills as $skill)
                                                    <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="description">
                            <div class="row">
                                <h4 class="info-text"> Drop us a small description. </h4>
                                <div class="col-sm-6 col-sm-offset-1">
                                    <div class="form-group label-floating">
                                        <label class="control-label">About your self</label>
                                        <textarea class="form-control" name="description" placeholder=""
                                            rows="9"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Example</label>
                                        <p class="description">"I am a full stack developer i work on web development and
                                            mobile developer"</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wizard-footer">
                        <div class="pull-right">
                            <input type='button' class='btn btn-next btn-fill btn-primary btn-wd' name='next'
                                value='Next' />
                            <input type="submit" class='btn btn-finish btn-fill btn-primary btn-wd' value='Finish' />

                        </div>
                        <div class="pull-left">
                            <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous'
                                value='Previous' />
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
        </div> <!-- wizard container -->
    </div>

@endsection



@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

    <script src="{{ asset('confirm-profile/js/jquery-2.2.4.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('confirm-profile/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('confirm-profile/js/jquery.bootstrap.js') }}" type="text/javascript"></script>

    <!--  Plugin for the Wizard -->
    <script src="{{ asset('confirm-profile/js/material-bootstrap-wizard.js') }}"></script>

    <!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
    <script src="{{ asset('confirm-profile/js/jquery.validate.min.js') }}"></script>

    <script>
        $(".choices__input ").val("X");
        $(document).ready(function() {
            var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
                removeItemButton: true,
                maxItemCount: 10,
                searchResultLimit: 10,
                renderChoiceLimit: 10
            });


        });


        $(document).ready(function() {
            $(" .free").click(function() {
                // $("#skills").prop("checked", true);
                $("#skills").removeClass("hide");


                $("#freelancer").prop("checked", true);



            });
            $(" .client").click(function() {
                $("#client").prop("checked", true);
                $("#skills").addClass("hide");
            });
        });
        if ($('#client').is(':checked')) {
            alert("it's checked");
        }

    </script>
@endsection
