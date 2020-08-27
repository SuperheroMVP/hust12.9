<!-- Header -->
<header id="header" class="header">
    <div class="header-top bg-theme-color-2 sm-text-center p-0">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-xs-6">
                    <div class="widget no-border m-0">
                        <ul class="list-inline font-13 sm-text-center mt-5">
                            <li>
                                <a class="text-white" href="#">FAQ</a>
                            </li>
                            <li class="text-white">|</li>
                            <li>
                                <a class="text-white" href="#">Help Desk</a>
                            </li>
                            <li class="text-white">|</li>
                            <li>
                                <a class="text-white" href="/admin">Login</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-8 col-xs-6">
                    <div class="widget m-0 pull-right sm-pull-none sm-text-center">
                        <ul class="list-inline pull-right">
                            <li class="mb-0 pb-0">
                                <div class="top-dropdown-outer pt-5 pb-10">
                                    <a class="top-search-box has-dropdown text-white text-hover-theme-colored"><i class="fa fa-search font-13"></i> &nbsp;</a>
                                    @if (is_plugin_active('blog'))
                                    <ul class="dropdown">
{{--                                        --}}
{{--                                            <div class="form-search">--}}
{{--                                                <form class="quick-search" action="{{ route('public.search') }}">--}}
{{--                                                    <input type="text" name="q" placeholder="{{ __('Tìm kiếm...') }}" autocomplete="off">--}}
{{--                                                    <a href="#" class="btn-search"><i class="fa fa-search" aria-hidden="true"></i></a>--}}
{{--                                                </form>--}}
{{--                                            </div>--}}

                                        <li>
                                            <div class="search-form-wrapper">
                                                <form method="get" class="mt-10" action="{{ route('public.search') }}">
                                                    <input type="text" onfocus="if(this.value ==&#39;Tìm Kiếm&#39;) { this.value = &#39;&#39;; }" onblur="if(this.value == &#39;&#39;) { this.value =&#39;Enter your search&#39;; }" placeholder="Tìm kiếm" id="searchinput" name="q" class="">
                                                    <label><input type="submit" name="submit" value=""></label>
                                                </form>
                                            </div>
                                        </li>
                                    </ul>
                                    @endif
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="widget no-border m-0 mr-15 pull-right flip sm-pull-none sm-text-center">
                        <ul class="styled-icons icon-circled icon-sm pull-right flip sm-pull-none sm-text-center mt-sm-15">
                            <li><a href="{{ theme_option('facebook') }}" target="_blank"><i class="fa fa-facebook text-white"></i></a></li>
                            <li><a href="mailto:{{ theme_option('email') }}" target="_blank"><i class="fa fa-google-plus text-white"></i></a></li>
                            <li><a href="{{ theme_option('youtube') }}" target="_blank"><i class="fa fa-youtube text-white"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle p-0 bg-lightest xs-text-center">
        <div class="container pt-0 pb-0">
            <div class="row">
                <div class="col-xs-6 col-sm-2 col-md-2">
                    <div class="widget no-border m-0">
                        <a class="menuzord-brand pull-left flip xs-pull-center mb-15" href="/"><img src="{{ get_image_url(theme_option('logo')) }}" alt="{{ theme_option('site_title') }}"></a>
                    </div>
                </div>
                {!!
                        Menu::renderMenuLocation('header-menu', [
                            'options' => ['class' => 'menu sub-menu--slideLeft'],
                            'view'    => 'header-menu',
                        ])
                    !!}
{{--                <div class="col-xs-12 col-sm-4 col-md-4">--}}
{{--                    <div class="widget no-border pull-right sm-pull-none sm-text-center mt-10 mb-10 m-0">--}}
{{--                        <ul class="list-inline">--}}
{{--                            <li><i class="fa fa-phone-square text-theme-colored font-36 mt-5 sm-display-block"></i></li>--}}
{{--                            <li>--}}
{{--                                <a href="#" class="font-12 text-gray text-uppercase">Call us today!</a>--}}
{{--                                <h5 class="font-14 m-0"> +(012) 345 6789</h5>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-xs-12 col-sm-4 col-md-3">--}}
{{--                    <div class="widget no-border pull-right sm-pull-none sm-text-center mt-10 mb-10 m-0">--}}
{{--                        <ul class="list-inline">--}}
{{--                            <li><i class="fa fa-clock-o text-theme-colored font-36 mt-5 sm-display-block"></i></li>--}}
{{--                            <li>--}}
{{--                                <a href="#" class="font-12 text-gray text-uppercase">We are open!</a>--}}
{{--                                <h5 class="font-13 text-black m-0"> Mon-Fri 8:00-16:00</h5>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
    <div class="header-nav">
        <div class="header-nav-wrapper navbar-scrolltofixed bg-theme-colored border-bottom-theme-color-2-1px" style="z-index: auto; position: static; top: auto;">
            <div class="container">
                <nav id="menuzord" class="menuzord bg-theme-colored pull-left flip menuzord-responsive">
{{--                    <a href="javascript:void(0)" class="showhide" style="display: none;"><em></em><em></em><em></em></a>--}}
                    <!-- Main Menu -->
                    {!!
                    Menu::renderMenuLocation('main-menu', [
                        'options' => ['class' => ''],
                        'view'    => 'main-menu',
                    ])
                !!}
                    <div id="top-search-bar" class="collapse">
                        <div class="container">
                            <form role="search" action="#" class="search_form_top" method="get">
                                <input type="text" placeholder="Type text and press Enter..." name="s" class="form-control" autocomplete="off">
                                <span class="search-close"><i class="fa fa-search"></i></span>
                            </form>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
{{--        <div style="display: none; width: 1905px; height: 73px; float: none;"></div>--}}
    </div>
</header>

