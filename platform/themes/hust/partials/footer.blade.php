<!-- Footer -->
<footer class="footer overlay section">
    <!-- Footer Top -->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- About -->
                    <div class="single-widget about">
                        <div class="logo"><img src="{{ get_image_url(theme_option('logo')) }}" alt="{{ theme_option('site_title') }}"></div>
                    </div>
                    <!--/ End About -->
                </div>
                <div class="col-lg-2 col-md-6 col-12">
                    <!-- Useful Links -->
                    <div class="single-widget useful-links">
                        {!!
                            Menu::renderMenuLocation('footer-menu', [
                                'options' => ['class' => 'menu sub-menu--slideLeft'],
                                'view'    => 'footer-menu',
                            ])
                        !!}
                    </div>
                    <!--/ End Useful Links -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Latest News -->
                    <div class="single-widget latest-news">
                        <h2>Bài viêt gần đây</h2>
                        <div class="news-inner">
                            @foreach(get_post_new() as $newpost)
                            <div class="single-news">
                                <img src="{{ get_object_image($newpost->image) }}">
                                <h4><a href="/">{{$newpost->name}}</a></h4>
                                <p>{{$newpost->description}}</p>
                            </div>
                                @break
                            @endforeach
                        </div>
                    </div>
                    <!--/ End Latest News -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Newsletter -->
                    <div class="single-widget newsletter">
                        <h2>Liên hệ</h2>
                        <ul class="list">
                            <li><i class="fa fa-phone"></i>Phone: {{ theme_option('phone') }}</li>
                            <li><i class="fa fa-fax"></i>Fax: {{ theme_option('fax') }}</li>
                            <li><i class="fa fa-envelope"></i>Email: <a href="mailto:{{ theme_option('email') }}">{{ theme_option('email') }}</a>
                            </li>
                            <li><i class="fa fa-map-o"></i>Address: {{ theme_option('address') }}</li>
                        </ul>
                    </div>
                    <!--/ End Newsletter -->
                </div>
            </div>
        </div>
    </div>
    <!--/ End Footer Top -->
</footer>
<div class="copyright">
<div class="container">
    <div class="page-copyright" >
        <p>{!! strip_tags(theme_option('copyright')) !!}</p>
    </div>
</div>
</div>

