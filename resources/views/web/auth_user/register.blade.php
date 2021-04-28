{{--<x-guest-layout>--}}
{{--    <x-auth-card>--}}
{{--        <x-slot name="logo">--}}
{{--            <a href="/">--}}
{{--                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />--}}
{{--            </a>--}}
{{--        </x-slot>--}}

{{--        <!-- Validation Errors -->--}}
{{--        <x-auth-validation-errors class="mb-4" :errors="$errors" />--}}

{{--        <form method="POST" action="{{url('user/register')}}">--}}
{{--            @csrf--}}

{{--            <!-- Name -->--}}
{{--                <div class="grid grid-cols-2 gap-4">--}}

{{--                    <div>--}}
{{--                        <x-label for="first_name" :value="__('First Name')" />--}}

{{--                        <x-input id="name" class="block mt-1 w-full" type="text" name="first_name" :value="old('name')" required autofocus />--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <x-label for="last_name" :value="__('Last Name')" />--}}

{{--                        <x-input id="name" class="block mt-1 w-full" type="text" name="last_name" :value="old('name')" required autofocus />--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            <!-- Email Address -->--}}
{{--            <div class="mt-4">--}}
{{--                <x-label for="email" :value="__('Email')" />--}}

{{--                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />--}}
{{--            </div>--}}

{{--            <!-- Password -->--}}
{{--            <div class="mt-4">--}}
{{--                <x-label for="password" :value="__('Password')" />--}}

{{--                <x-input id="password" class="block mt-1 w-full"--}}
{{--                                type="password"--}}
{{--                                name="password"--}}
{{--                                required autocomplete="new-password" />--}}
{{--            </div>--}}

{{--            <!-- Confirm Password -->--}}
{{--            <div class="mt-4">--}}
{{--                <x-label for="password_confirmation" :value="__('Confirm Password')" />--}}

{{--                <x-input id="password_confirmation" class="block mt-1 w-full"--}}
{{--                                type="password"--}}
{{--                                name="password_confirmation" required />--}}
{{--            </div>--}}

{{--            <div class="flex items-center justify-end mt-4">--}}
{{--                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{url('user/login')}}">--}}
{{--                    {{ __('Already registered?') }}--}}
{{--                </a>--}}

{{--                <x-button class="ml-4" >--}}
{{--                    {{ __('Register') }}--}}
{{--                </x-button>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </x-auth-card>--}}
{{--</x-guest-layout>--}}


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
            <h2>INFOMATION</h2>
            <p class="text-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed </p>
            <p class="text-2"><span>Eu ultrices:</span> Vitae auctor eu augue ut. Malesuada nunc vel risus </p>
            <!-- <div class="form-left-last">
                <input type="submit" name="account" class="account" value="Have An Account">
            </div> -->
        </div>
        <form class="form-detail" action="{{url('register')}}" method="post" id="myform" onsubmit="return checkCheckBoxes(this);">
            @csrf
            <h2>REGISTER FORM</h2>
            <div class="form-group">
                <div class="form-row form-row-1">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" id="first_name" class="input-text" required>
                </div>
                <div class="form-row form-row-1">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" id="last_name" class="input-text" required>
                </div>
            </div>
            <div class="form-row">
                <label for="your_email">Your Email</label>
                <input type="text" name="email" id="your_email" class="input-text" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
            </div>
            <div class="form-group">
                <div class="form-row form-row-1 ">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="input-text" required>
                </div>

            </div>
            <div class="form-checkbox">
                <label class="container-agree"><p>I agree to the <a href="#" class="text">Terms and Conditions</a></p>
                    <input type="checkbox" name="checkbox" onclick="" id="myCheck">
                    <span class="checkmark"></span>
                </label>
                <p id="error"></p>
            </div>
            <br>
            <div class="form-row-last">
                <input type="submit" name="register" class="register" value="Register" id="register" >
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
            first_name: {
                required: "Please enter a firstname"
            },
            last_name: {
                required: "Please enter a lastname"
            },
            your_email: {
                required: "Please provide an email"
            },
            password: {
                required: "Please enter a password"
            }
        }
    });
</script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
