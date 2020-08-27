<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
{{--        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-s calable=no" name="viewport">--}}

        <link rel="canonical" href="{{ url('/') }}">
        <meta http-equiv="content-language" content="en">
        <meta property="og:image" content="{{theme_option('logo_thumb')}}" />
        <title>{{ SeoHelper::getTitle() }}</title>
        <style>
            body{
                scroll-behavior: smooth !important;
            }
        </style>
        {!! Theme::header() !!}
    </head>
    <body>
        {!! Theme::partial('header') !!}

        <div>
            {!! Theme::content() !!}
        </div>

        {!! Theme::partial('footer') !!}

        {!! Theme::footer() !!}
        <!-- Load Facebook SDK for JavaScript -->
        <script>
            // Add active class to the current button (highlight it)
            var header = document.getElementById("myDIV");
            var btns = header.getElementsByClassName("li_sub");
            for (var i = 0; i < btns.length; i++) {
                btns[i].addEventListener("click", function() {
                    var current = document.getElementsByClassName("active");
                    current[0].className = current[0].className.replace(" active", "");
                    this.className += " active";
                });
            }
        </script>
        <div id="fb-root"></div>
        <script>
            window.fbAsyncInit = function() {
                FB.init({
                    xfbml            : true,
                    version          : 'v7.0'
                });
            };

            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>

        <!-- Your Chat Plugin code -->
        <div class="fb-customerchat"
             attribution=setup_tool
             page_id="738393249591694"
             logged_in_greeting="Chào bạn! Tôi có thể giúp gì cho bạn?"
             logged_out_greeting="Chào bạn! Tôi có thể giúp gì cho bạn?">
        </div>

        <style>
            .fb_dialog_content iframe{
                right: 0px !important;
            }
        </style>
    </body>
</html>
