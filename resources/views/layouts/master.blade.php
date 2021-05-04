<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('links')
    <link rel="stylesheet" href="{{ asset('navbar/styles/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>@yield('title')</title>
</head>

<body>
    <div class="big__container">
        <nav class="nav__bar">
            <ul class="nav__links" id="nav__links">
                <a href="{{ url('/') }}" class="social__icons"><i class="fas fa-home"></i></a>
                <a href="{{ url('/agreements') }}" class="social__icons"><i class="fas fa-briefcase"></i></a>
                <a href="{{ url('/manage_posts') }}" class="social__icons "><i class="fas fa-chart-line"></i> </a>
                <a href="{{ url('/chat') }}" class="social__icons messages-icon active_link"><i
                        class="far fa-comment-alt"></i> </a>
                <a href="{{ url('/post') }}" class="social__icons"><i class="far fa-compass"></i></a>
                <a href="{{ url('/profile') }}" class="social__icons"><i class="fas fa-user"></i></a>
                @if (!empty(Auth::id()))
                    <a href="{{ url('/logout') }}" class="social__icons"><i class="fas fa-sign-out-alt"></i></a>
                @endif
            </ul>
        </nav>
        <header class="logo__header">
            <a href="#"><span class="work">Work </span><span class="free">Free</span></a>
        </header>
        <div class="sub__container">
            @yield('master')
        </div>
        <footer class="footer">
            <div class="footer__section1">
                <div class="footer__logo">
                    <h1>Work<span>Free</span></h1>
                    <h4>Amman-Jordan</h4>
                    <h4>info@worfree.com</h4>
                    <h4>+962777777777</h4>
                </div>
                <div class="footer__pages">
                    <h3>Pages</h3>
                    <div class="pages__links">
                        <a href="#" class="footer__pages__links">Home</a>
                        <a href="#" class="footer__pages__links">Agreements</a>
                        <a href="#" class="footer__pages__links">Works</a>
                        <a href="#" class="footer__pages__links">ِAbout us</a>
                    </div>
                </div>
                <div class="footer__support">
                    <h3>Support</h3>
                    <form class="support__message" action="" method="POST">
                        <div class="support__email">

                            <input name="email_user" type="text" placeholder="Email">
                        </div>
                        <div class="support__message">

                            <textarea name="message_user" id="" cols="30" rows="10" placeholder="Your message"
                                maxlength="100"></textarea>
                        </div>
                    </form>
                </div>
            </div>
            <div class="footer__section2">
                <div class="footer__copyrights">
                    <P>Copyrights © WorkFree</P>
                </div>
                <div class="footer__social">
                    <a href="#" class="social__icons"><i class="fab fa-linkedin"></i></a>
                    <a href="#" class="social__icons"><i class="fab fa-facebook-square"></i></a>
                    <a href="#" class="social__icons"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="social__icons"><i class="fab fa-youtube"></i></a>
                    <a href="#" class="social__icons"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </footer>

    </div>
    @yield('scripts')
    <script>
        var header = document.getElementById("nav__links");
        var btns = header.getElementsByClassName("social__icons");

        // for (var i = 0; i < btns.length; i++) {

        //     btns[i].addEventListener("click", function() {

        //         var current = document.getElementsByClassName("active_link");
        //         current[0].className = current[0].className.replace(" active_link", "");
        //         this.className += " active_link";
        //     });

        // }
        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function() {
                var current = document.getElementsByClassName("active_link");
                current[0].className = current[0].className.replace(" active_link", "");
                this.className += " active_link";
            });
        }


        // $(".social__icons").click(function() {
        //     $(".social__icons").removeClass("active_link");
        //     $(this).addClass("active_link");

        // });

    </script>


</body>

</html>
