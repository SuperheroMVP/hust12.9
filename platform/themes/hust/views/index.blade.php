@if (is_plugin_active('blog'))
    <section class="home-slider">
        <div class="slider-active">
            @foreach( get_img_slidebar() as $slide)
                    <img src="{{ get_object_image($slide->image, 'medium') }}">
            @endforeach
        </div>
    </section>
    <!--/ End Slider Area -->
    <section class="events section">
        <div class="container">
            <div class="event-grid">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h2>Thông tin nổi bật</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach(get_post_by_category_tag(6) as $post)
                        <div class="col-lg-4 col-sm-12">
                            <div class="single-event">
                                <a href="{{ $post->url }}"
                                   title="{{ $post->name }}"
                                   class="media-news-img">
                                    <div class="head">
                                        <img class="img-full img-bg"
                                             src="{{ get_object_image($post->image, 'medium') }}"
                                             style="background-image: url('{{ get_object_image($post->image) }}');"
                                             alt="{{ $post->name }}">
                                    </div>
                                    <div class="event-content">
                                        <h4><a href="#"><p class="common-title">
                                                    <a href="{{ $post->url }}"
                                                       title="{{ $post->name }}">
                                                        {{ $post->name }}
                                                    </a>
                                                </p></a></h4>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    @foreach (get_all_categories(['categories.status' => \Botble\Base\Enums\BaseStatusEnum::PUBLISHED, 'categories.parent_id' => 0, 'is_featured' => 1]) as $category)
        @php
            $allRelatedCategoryIds = array_unique(array_merge(app(\Botble\Blog\Repositories\Interfaces\CategoryInterface::class)->getAllRelatedChildrenIds($category), [$category->id]));
            $posts = app(\Botble\Blog\Repositories\Interfaces\PostInterface::class)->getByCategoryIsFeatured($allRelatedCategoryIds, 0, $loop->index % 2 == 0 ? 6 : 5);
        @endphp

        @if($category->name == "Đề tài khoa học")
            <!-- Features -->
            <section class="our-features section">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title">
                                <h2>{{ $category->name }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @php
                            $i =0;
                        @endphp
                        @foreach($posts as $post)
                            @php
                                $i++;
                            @endphp
                        <div class="col-lg-4 col-md-4 col-12">
                            <!-- Single Feature -->
                            <div class="single-feature">
                                <a href="{{ $post->url }}"
                                   title="{{ $post->name }}"
                                   class="media-news-img">
                                    <div class="feature-head">
                                        <img class="img-full img-bg"
                                             src="{{ get_object_image($post->image, 'medium') }}"
                                             style="background-image: url('{{ get_object_image($post->image) }}');"
                                             alt="{{ $post->name }}">
                                    </div>
                                    <div class="event-content">
                                        <a href="{{ $post->url }}">
                                                <h2>{{ $post->name }}</h2>
                                                <p>{{ $post->description }}</p>
                                            </a>
                                    </div>
                                </a>
                            </div>
                            <!--/ End Single Feature -->
                        </div>
                            @if($i > 2 )
                                @break
                            @endif
                        @endforeach
                    </div>
                </div>
            </section>
            <!-- End Features -->
        @elseif($category->name == "Tin tức")
            <div class="fun-facts overlay" data-stellar-background-ratio="0.5" style="background-position: 50% 50%;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-6">
                            <!-- Single Fact -->
                            <div class="single-fact">
                                <i class="fa fa-institution"></i>
                                <div class="number"><span class="counter">{{ theme_option('ctdt') }}</span>+</div>
                                <p>Chương trình đào tạo</p>
                            </div>
                            <!--/ End Single Fact -->
                        </div>
                        <div class="col-lg-3 col-md-6 col-6">
                            <!-- Single Fact -->
                            <div class="single-fact">
                                <i class="fa fa-graduation-cap"></i>
                                <div class="number"><span class="counter">{{ theme_option('sinhvien') }}</span>+</div>
                                <p>Sinh viên</p>
                            </div>
                            <!--/ End Single Fact -->
                        </div>
                        <div class="col-lg-3 col-md-6 col-6">
                            <!-- Single Fact -->
                            <div class="single-fact">
                                <i class="fa fa-video-camera"></i>
                                <div class="number"><span class="counter">{{ theme_option('ctkh') }}</span>+</div>
                                <p>Chương trình khoa học</p>
                            </div>
                            <!--/ End Single Fact -->
                        </div>
                        <div class="col-lg-3 col-md-6 col-6">
                            <!-- Single Fact -->
                            <div class="single-fact">
                                <i class="fa fa-trophy"></i>
                                <div class="number"><span class="counter">{{ theme_option('doitac') }}</span>+</div>
                                <p>Dối tác</p>
                            </div>
                            <!--/ End Single Fact -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Blogs -->
            <section class="blog section">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title">
                                <h2>{{ $category->name }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="blog-slider">
                                @php
                                    $i =0;
                                @endphp
                                @foreach($posts as $post)
                                    @php
                                        $i++;
                                    @endphp
                                <div class="single-blog">
                                    <div class="blog-head overlay">
                                        <div class="date">
                                            <h4>25<span>Feb</span></h4>
                                        </div>
                                        <img class="img-full img-bg"
                                             src="{{ get_object_image($post->image, 'medium') }}"
                                             style="background-image: url('{{ get_object_image($post->image) }}');"
                                             alt="{{ $post->name }}">
                                    </div>
                                    <div class="blog-content">
                                        <h4 class="blog-title"><a href="{{ $post->url }}">{{ $post->name }}</a></h4>
                                        <p>{{ $post->description }}</p>
                                        <div class="button">
                                            <a href="{{ $post->url }}" class="btn">Xem thêm<i class="fa fa-angle-double-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                    @if($i > 5 )
                                        @break
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ End Blogs -->
        @else
        <section class="events section">
            <div class="container">
                <div class="event-grid">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title">
                                <h2>{{ $category->name }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($posts as $post)
                            <div class="col-lg-4 col-sm-12">
                                <div class="single-event">
                                    <a href="{{ $post->url }}"
                                       title="{{ $post->name }}"
                                       class="media-news-img">
                                        <div class="head">
                                            <img class="img-full img-bg"
                                                 src="{{ get_object_image($post->image, 'medium') }}"
                                                 style="background-image: url('{{ get_object_image($post->image) }}');"
                                                 alt="{{ $post->name }}">
                                        </div>
                                        <div class="event-content">
                                            <h4><a href="#"><p class="common-title">
                                                        <a href="{{ $post->url }}"
                                                           title="{{ $post->name }}">
                                                            {{ $post->name }}
                                                        </a>
                                                    </p></a></h4>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
        </div>
    </section>
        @endif
    @endforeach
@endif

