<header class="header">
    <!-- Topbar -->
    <!-- End Topbar -->
    <!-- Header Inner -->
    <div class="header-middle">
        <div class="container">
            <div class="header-middle-inner">
                <div class="item">
                    <div class="logo">
                        <a href="/">
                            <img src="{{ get_image_url(theme_option('logo')) }}" alt="{{ theme_option('site_title') }}">
                        </a>
                    </div>
                    <div class="header-widget">
                        <span>ĐẠI HỌC BÁCH KHOA HÀ NỘI</span>
                        <span>VIỆN ĐIỆN TỬ - VIỄN THÔNG</span>
                    </div>
                    <div class="mobile-menu">
                    </div>
                </div>
                <div class="item">

                </div>
                <div class="item text-right">
                    <div class="header-widget">
                        {!!
                        Menu::renderMenuLocation('header-menu', [
                            'options' => ['class' => 'menu sub-menu--slideLeft'],
                            'view'    => 'header-menu',
                        ])
                    !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Header Inner -->
    <!-- Header Menu -->
    <div class="header-menu">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-default">
                        <div class="navbar-collapse">
                            <!-- Main Menu -->
                        {!!
                        Menu::renderMenuLocation('main-menu', [
                            'options' => ['class' => 'menu sub-menu--slideLeft'],
                            'view'    => 'main-menu',
                        ])
                    !!}
                        </div>
                    </nav>
                    @if (is_plugin_active('blog'))
                        <div class="form-search">
                            <form class="quick-search" action="{{ route('public.search') }}">
                                <input type="text" name="q" placeholder="{{ __('Tìm kiếm...') }}" autocomplete="off">
                                <a href="#" class="btn-search"><i class="fa fa-search" aria-hidden="true"></i></a>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!--/ End Header Menu -->
</header>
