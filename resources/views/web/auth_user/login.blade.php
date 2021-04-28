{{--<x-guest-layout>--}}
{{--    <x-auth-card>--}}
{{--        <x-slot name="logo">--}}
{{--            <a href="/">--}}
{{--                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />--}}
{{--            </a>--}}
{{--        </x-slot>--}}

{{--        <!-- Session Status -->--}}
{{--        <x-auth-session-status class="mb-4" :status="session('status')" />--}}

{{--        <!-- Validation Errors -->--}}
{{--        <x-auth-validation-errors class="mb-4" :errors="$errors" />--}}

{{--        <form method="POST" action="{{url('/login')}}">--}}
{{--            @csrf--}}

{{--            <!-- Email Address -->--}}
{{--            <div>--}}
{{--                <x-label for="email" :value="__('Email')" />--}}

{{--                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />--}}
{{--            </div>--}}

{{--            <!-- Password -->--}}
{{--            <div class="mt-4">--}}
{{--                <x-label for="password" :value="__('Password')" />--}}

{{--                <x-input id="password" class="block mt-1 w-full"--}}
{{--                                type="password"--}}
{{--                                name="password"--}}
{{--                                required autocomplete="current-password" />--}}
{{--            </div>--}}

{{--            <!-- Remember Me -->--}}
{{--            <div class="block mt-4">--}}
{{--                <label for="remember_me" class="inline-flex items-center">--}}
{{--                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">--}}
{{--                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>--}}
{{--                </label>--}}
{{--            </div>--}}
{{--                <div class="form-group row">--}}
{{--                    <div class="col-md-6 offset-md-4">--}}
{{--                        <a href="{{ url('/login/facebook') }}" class="btn btn-facebook"> Facebook</a>--}}
{{--                        <a href="{{ url('/login/google') }}" class="btn btn-google-plus"> Google</a>--}}
{{--                        <a href="{{ url('/login/twitter') }}" class="btn btn-twitter"> Twitter</a>--}}
{{--                    </div>--}}

{{--                </div>--}}

{{--            <div class="flex items-center justify-end mt-4">--}}
{{--                @if (Route::has('password.request'))--}}
{{--                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">--}}
{{--                        {{ __('Forgot your password?') }}--}}
{{--                    </a>--}}
{{--                @endif--}}

{{--                <x-button class="ml-3">--}}
{{--                    {{ __('Log in') }}--}}
{{--                </x-button>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </x-auth-card>--}}
{{--</x-guest-layout>--}}


    <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Form-v4 by Colorlib</title>
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('login-register/css/opensans-font.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login-register/fonts/line-awesome/css/line-awesome.min.css')}}">
    <!-- Jquery -->
    <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
    <!-- Main Style Css -->
    <link rel="stylesheet" href="{{ asset('login-register/css/login-register.css')}}"/>
</head>
<body class="form-v4">
<div class="page-content">
    <div class="form-v4-content">
        <div class="form-left">
            <h2>INFORMATION</h2>
            <p class="text-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed </p>
            <p class="text-2"><span>Eu ultrices:</span> Vitae auctor eu augue ut. Malesuada nunc vel risus </p>
            <!-- <div class="form-left-last">
                <input type="submit" name="account" class="account" value="Have An Account">
            </div> -->
        </div>
        <form class="form-detail" action="#" method="post" action="{{url('/login')}}" id="myform" onsubmit="return checkCheckBoxes(this);">
            @csrf
            <h2>Login</h2>
            <div class="form-row">
                <label for="your_email">Your Email</label>
                <input type="text" name="email" id="your_email" class="input-text" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
            </div>
            <div class="form-row">
                <label for="your_email">Your Password</label>
                <input type="password" name="password" id="password" class="input-text" >
            </div>

            <div class="form-checkbox">
                <label class="container-agree"><p>I agree to the <a href="#" class="text">Terms and Conditions</a></p>
                    <input type="checkbox" name="checkbox" onclick="" id="myCheck">
                    <span class="checkmark"></span>
                </label>
{{--                <p id="error"></p>--}}
            </div>
            <br>
            <div class="form-row-last">
                <input type="submit" name="register" class="register" value="Login" >
            </div>
            <div class="form-row-last " style="justify-content: center!important; margin: 0.5rem 0 1rem 0">
                Or login with Social
            </div>
            <div class="form-row-last btns-social">
                <a class="social-btn" href="{{ url('/login/google') }}" style="display: flex; justify-content: center; align-items: center;">
						<span>
						<img src="{{ asset('login-register/images/google.svg')}}" style="width: 2rem; height: 2rem">
						</span>
                    <span class="title-btn">
							Google
						</span>
                </a>

                <a class="social-btn" href="{{ url('/login/facebook') }}">
						<span>
						<img src="{{ asset('login-register/images/facebook.svg')}}" style="width: 2rem; height: 2rem">
						</span>
                    <span class="title-btn">
							Facebook
						</span>
                </a>
            </div>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script>

    // function checkCheckBoxes(theForm) {
    //     if (
    //         theForm.checkbox.checked == false)
    //     {
    //         // alert('no');
    //         document.getElementById("error").innerHTML = 'helloS';
    //
    //         return false;
    //     } else {
    //         return true;
    //     }
    // }

    // just for the demos, avoids form submit
    jQuery.validator.setDefaults({

        success:  function(label){
            label.attr('id', 'valid');
        },
    });
    $( "#myform" ).validate({
        rules: {
            password: "required"
        },
        messages: {
            email: {
                required: "Please provide an email"
            },
            password: {
                required: "Please enter a password"
            }
        }
    });
</script>
</body>
</html>
