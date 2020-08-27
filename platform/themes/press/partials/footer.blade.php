<!-- Footer -->
{{--<footer id="footer" class="footer divider layer-overlay overlay-dark-9" data-bg-img="images/bg/bg2.jpg">--}}
<footer id="footer" class="footer divider layer-overlay overlay-dark-9" >
    <div class="container">
        <div class="row border-bottom">
            <div class="col-sm-6 col-md-3">
                <img src="{{ get_image_url(theme_option('logo')) }}" alt="{{ theme_option('site_title') }}">
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="widget dark">
                    <h4 class="widget-title">Menu</h4>
                        {!!
                            Menu::renderMenuLocation('footer-menu', [
                                'options' => [],
                                'view'    => 'footer-menu',
                            ])
                        !!}
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="widget dark">
                    <h4 class="widget-title">Kết nối với chúng tôi</h4>
                    <div class="widget dark">
                        <ul class="styled-icons icon-bordered icon-sm">
                            <li><a href="{{ theme_option('facebook') }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="mailto:{{ theme_option('email') }}" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="{{ theme_option('youtube') }}" target="_blank"><i class="fa fa-youtube"></i></a></li>
                        </ul>
                    </div>
                    </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="widget dark">
                    <h4 class="widget-title line-bottom-theme-colored-2">Liên hệ</h4>
                    <div class="widget dark">
                        <p>{{ theme_option('address') }}</p>
                        <ul class="list-inline mt-5">
                            <li class="m-0 pl-10 pr-10"> <i class="fa fa-phone text-theme-color-2 mr-5"></i> <a class="text-gray" href="callto:{{ theme_option('phone') }}">{{ theme_option('phone') }}</a> </li>
                            <li class="m-0 pl-10 pr-10"> <i class="fa fa-fax text-theme-color-2 mr-5"></i> <a class="text-gray" href="fax:{{ theme_option('fax') }}">{{ theme_option('fax') }}</a> </li>
                            <li class="m-0 pl-10 pr-10"> <i class="fa fa-envelope-o text-theme-color-2 mr-5"></i> <a class="text-gray" href="mailto:{{ theme_option('email') }}" target="_blank">{{ theme_option('email') }}</a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="footer-bottom bg-black-333">
        <div class="container pt-20 pb-20">
            <div class="row">
                <div class="col-md-6">
                    <p class="font-11 text-black-777 m-0">{!! strip_tags(theme_option('copyright')) !!}</p>
                </div>
            </div>
        </div>
    </div>
    <a class="scrollToTop" href="#" style="display: none; background-color: forestgreen; border-radius: 50%; bottom: 100px; right: 21px;"><i class="fa fa-angle-up"></i></a>
</footer>
