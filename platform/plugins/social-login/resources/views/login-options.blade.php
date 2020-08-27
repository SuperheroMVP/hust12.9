@if (setting('social_login_facebook_enable', false) || setting('social_login_google_enable', false) || setting('social_login_github_enable', false))
    <div class="login-options">
        <p>{{ trans('core/acl::auth.login_via_social') }}</p>
    </div>
    <ul class="social-icons">
        @if (setting('social_login_facebook_enable', false))
            <li>
                <a class="social-icon-color facebook" data-original-title="facebook"
                   href="{{ route('auth.social', 'facebook') }}"></a>
            </li>
        @endif
        @if (setting('social_login_google_enable', false))
                <style>
                    @import url(https://fonts.googleapis.com/css?family=Roboto:500);
                    .google-btn {
                        width: 184px;
                        height: 42px;
                        background-color: #4285f4;
                        border-radius: 2px;
                        box-shadow: 0 3px 4px 0 rgba(0, 0, 0, 0.25);
                    }
                    .google-btn .google-icon-wrapper {
                        position: absolute;
                        margin-top: 1px;
                        margin-left: 1px;
                        width: 40px;
                        height: 40px;
                        border-radius: 2px;
                        background-color: #fff;
                    }
                    .google-btn .google-icon {
                        position: absolute;
                        margin-top: 11px;
                        margin-left: 11px;
                        width: 18px;
                        height: 18px;
                    }
                    .google-btn .btn-text {
                        float: right;
                        margin: 11px 11px 0 0;
                        color: #fff;
                        font-size: 14px;
                        letter-spacing: 0.2px;
                        font-family: "Roboto";
                    }
                    .google-btn:hover {
                        box-shadow: 0 0 6px #4285f4;
                    }
                    .google-btn:active {
                        background: #1669f2;
                    }

                </style>
                <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />

                <div class="google-btn">
                    <a href="{{ route('auth.social', 'google') }}">
                        <div class="google-icon-wrapper">
                            <img class="google-icon" src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg"/>
                        </div>
                        <p class="btn-text"><b>Sign in with google</b></p>
                    </a>
                </div>
{{--            <li style="width: 100%">--}}
{{--                <a class="social-icon-color googleplus" data-original-title="Google Plus"--}}
{{--                   href="{{ route('auth.social', 'google') }}" style="width: 100%; border-color: #dd4b39; border-width: 1px"></a>--}}
{{--            </li>--}}
        @endif
        @if (setting('social_login_github_enable', false))
            <li>
                <a class="social-icon-color github" data-original-title="Github"
                   href="{{ route('auth.social', 'github') }}"></a>
            </li>
        @endif
    </ul>
@endif