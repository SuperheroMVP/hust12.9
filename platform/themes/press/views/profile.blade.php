{{--<section class="inner-header divider parallax layer-overlay overlay-dark-5"--}}
{{--         style="background-image: url({{get_object_image(get_slide('slide')->image)}}); background-position: 50% 97px;">--}}

    <div class="container pt-70 pb-20">
        <!-- Section Content -->
        <div class="section-content">
            <div class="row">
                <div class="col-md-12">
                        <h3 class="page-intro__title">{{ $profile->name }}</h3>
                    {!! Theme::breadcrumb()->render() !!}
                </div>
            </div>
        </div>
    </div>
{{--</section>--}}
<div class="container">
    <br>
    {!! apply_filters(PAGE_FILTER_FRONT_PROFILE_CONTENT, $profile->content, $profile) !!}
    <br>
</div>

