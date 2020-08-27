<!-- Section: inner-header -->
<section class="inner-header divider parallax layer-overlay overlay-dark-5"
         style="background-image: url({{get_object_image(get_data_tuyensinh("banner")->image)}}); background-position: 50% 97px;">
    <div class="container pt-70 pb-20">
        <!-- Section Content -->
        <div class="section-content">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="page-intro__title">Hội thảo ICCE/IEEE ICCE conference</h3>
                    {!! Theme::breadcrumb()->render() !!}
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        @foreach(get_data_icce() as $icce)
        <div class="row">
            <div class="col-md-12">
                <div class="heading-line-bottom">
                    <h4 class="heading-title">{{$icce->name}}</h4>
                </div>

                <!-- Portfolio Gallery Grid -->
                <div class="gallery-isotope grid-2 masonry gutter-small clearfix" data-lightbox="gallery" style="position: relative; height: 1712.75px;">
                    <!-- Portfolio Item Start -->
                    <div class="gallery-item" style="position: absolute; left: 0px; top: 0px;">
                        <div class="thumb">
                            <img class="img-fullwidth" src="{{ get_object_image($icce->image1, 'medium') }}" alt="project">
                            <div class="overlay-shade"></div>
                            <div class="text-holder">
                                <div class="title text-center"></div>
                            </div>
                            <div class="icons-holder">
                                <div class="icons-holder-inner">
                                    <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                                        <a data-lightbox="image" href="{{ get_object_image($icce->image1, 'medium') }}"><i class="fa fa-plus"></i></a>
{{--                                        <a href="#"><i class="fa fa-link"></i></a>--}}
                                    </div>
                                </div>
                            </div>
                            <a class="hover-link" data-lightbox="image" href="{{ get_object_image($icce->image1, 'medium') }}">View more</a>
                        </div>
                    </div>
                    <!-- Portfolio Item End -->

                    <!-- Portfolio Item Start -->
                    <div class="gallery-item" style="position: absolute; left: 570px; top: 0px;">
                        <div class="thumb">
                            <img class="img-fullwidth" src="{{ get_object_image($icce->image2, 'medium') }}" alt="project">
                            <div class="overlay-shade"></div>
                            <div class="text-holder">
                                <div class="title text-center"></div>
                            </div>
                            <div class="icons-holder">
                                <div class="icons-holder-inner">
                                    <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                                        <a data-lightbox="image" href="{{ get_object_image($icce->image2, 'medium') }}><i class="fa fa-plus"></i></a>
{{--                                        <a href="#"><i class="fa fa-link"></i></a>--}}
                                    </div>
                                </div>
                            </div>
                            <a class="hover-link" data-lightbox="image" href="{{ get_object_image($icce->image2, 'medium') }}">View more</a>
                        </div>
                    </div>
                    <!-- Portfolio Item End -->

                    <!-- Portfolio Item Start -->
                    <div class="gallery-item" style="position: absolute; left: 570px; top: 428px;">
                        <div class="thumb">
                            <img class="img-fullwidth" src="{{ get_object_image($icce->image3, 'medium') }}" alt="project">
                            <div class="overlay-shade"></div>
                            <div class="text-holder">
                                <div class="title text-center"></div>
                            </div>
                            <div class="icons-holder">
                                <div class="icons-holder-inner">
                                    <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                                        <a data-lightbox="image" href="{{ get_object_image($icce->image3, 'medium') }}"><i class="fa fa-plus"></i></a>
{{--                                        <a href="#"><i class="fa fa-link"></i></a>--}}
                                    </div>
                                </div>
                            </div>
                            <a class="hover-link" data-lightbox="image" href="{{ get_object_image($icce->image3, 'medium') }}">View more</a>
                        </div>
                    </div>
                    <!-- Portfolio Item End -->

                    <!-- Portfolio Item Start -->
                    <div class="gallery-item" style="position: absolute; left: 0px; top: 854px;">
                        <div class="thumb">
                            <img class="img-fullwidth" src="{{ get_object_image($icce->image4, 'medium') }}" alt="project">
                            <div class="overlay-shade"></div>
                            <div class="text-holder">
                                <div class="title text-center"></div>
                            </div>
                            <div class="icons-holder">
                                <div class="icons-holder-inner">
                                    <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                                        <a data-lightbox="image" href="{{ get_object_image($icce->image4, 'medium') }}"><i class="fa fa-plus"></i></a>
{{--                                        <a href="#"><i class="fa fa-link"></i></a>--}}
                                    </div>
                                </div>
                            </div>
                            <a class="hover-link" data-lightbox="image" href="{{ get_object_image($icce->image4, 'medium') }}">View more</a>
                        </div>
                    </div>
                    <!-- Portfolio Item End -->

                    <!-- Portfolio Item Start -->
                    <div class="gallery-item" style="position: absolute; left: 570px; top: 856px;">
                        <div class="thumb">
                            <img class="img-fullwidth" src="{{ get_object_image($icce->image5, 'medium') }}" alt="project">
                            <div class="overlay-shade"></div>
                            <div class="text-holder">
                                <div class="title text-center"></div>
                            </div>
                            <div class="icons-holder">
                                <div class="icons-holder-inner">
                                    <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                                        <a data-lightbox="image" href="{{ get_object_image($icce->image5, 'medium') }}"><i class="fa fa-plus"></i></a>
{{--                                        <a href="#"><i class="fa fa-link"></i></a>--}}
                                    </div>
                                </div>
                            </div>
                            <a class="hover-link" data-lightbox="image" href="{{ get_object_image($icce->image5, 'medium') }}">View more</a>
                        </div>
                    </div>
                    <!-- Portfolio Item End -->

                    <!-- Portfolio Item Start -->
                    <div class="gallery-item" style="position: absolute; left: 570px; top: 856px;">
                        <div class="thumb">
                            <img class="img-fullwidth" src="{{ get_object_image($icce->image6, 'medium') }}" alt="project">
                            <div class="overlay-shade"></div>
                            <div class="text-holder">
                                <div class="title text-center"></div>
                            </div>
                            <div class="icons-holder">
                                <div class="icons-holder-inner">
                                    <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                                        <a data-lightbox="image" href="{{ get_object_image($icce->image6, 'medium') }}"><i class="fa fa-plus"></i></a>
{{--                                        <a href="#"><i class="fa fa-link"></i></a>--}}
                                    </div>
                                </div>
                            </div>
                            <a class="hover-link" data-lightbox="image" href="{{ get_object_image($icce->image6, 'medium') }}">View more</a>
                        </div>
                    </div>
                    <!-- Portfolio Item End -->

                    <!-- Portfolio Item Start -->
                    <div class="gallery-item wide" style="position: absolute; left: 0px; top: 1284px;">
                        <div class="thumb">
                            <img class="img-fullwidth" src="{{ get_object_image($icce->image7, 'medium') }}" alt="project">
                            <div class="overlay-shade"></div>
                            <div class="text-holder">
                                <div class="title text-center"></div>
                            </div>
                            <div class="icons-holder">
                                <div class="icons-holder-inner">
                                    <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                                        <a data-lightbox="image" href="{{ get_object_image($icce->image7, 'medium') }}"><i class="fa fa-plus"></i></a>
{{--                                        <a href="#"><i class="fa fa-link"></i></a>--}}
                                    </div>
                                </div>
                            </div>
                            <a class="hover-link" data-lightbox="image" href="{{ get_object_image($icce->image7, 'medium') }}">View more</a>
                        </div>
                    </div>
                    <!-- Portfolio Item End -->
                </div>
                <!-- End Portfolio Gallery Grid -->

                <div class="separator separator-rouned">
                    <i class="fa fa-cog"></i>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
