<section class="inner-header divider parallax layer-overlay overlay-dark-5"
         style="background-image: url({{get_object_image(get_slide('slide')->image)}}); background-position: 50% 97px;">
    <div class="container pt-70 pb-20">
        <!-- Section Content -->
        <div class="section-content">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="page-intro__title">{{ $post->name }}</h3>
                    {!! Theme::breadcrumb()->render() !!}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blogs -->
<section class="blog b-archives single section">
    <div class="container">
        <div class="row">
        @php
            $name = false;
            foreach($post->tags as $tag){
                if ($tag->name == "Đào tạo"){
                    $name = true;
                }
            }
        @endphp
        @php
            foreach($post->categories as $tag){
                if ($tag->danhmuc == "lab"){
                    $name = $tag->danhmuc;
                }
                if ($tag->danhmuc == "btandtt"){
                    $name = $tag->danhmuc;
                }
                if ($tag->danhmuc == "tintuc"){
                    $name = $tag->danhmuc;
                }
            }
        @endphp
        @if($name == 'lab')
            <!-- Start main-content -->
                <div class="main-content">
                    <section>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <p>{{$post->description}}</p>
                                </div>
                                <div class="col-md-8">
                                    <img src="{{ get_object_image($post->image, 'medium') }}" alt="">
                                </div>
                            </div>
                            <div class="row mt-60">
                                <div class="col-md-12">
                                    <blockquote>
                                        <p>{!! $post->content !!}</p>
                                        <footer>Someone famous <i></i>n <cite title="Source Title">Source Title</cite>
                                        </footer>
                                    </blockquote>
                                </div>
                            </div>
                            {{--                            <div class="row mt-30">--}}
                            {{--                                <div class="col-md-12">--}}
                            {{--                                    <h4 class="mb-20">Recent Projects</h4>--}}
                            {{--                                    <div class="owl-carousel-6col owl-carousel owl-theme owl-loaded">--}}
                            {{--                                        @foreach (get_post_by_categorys($post->categories, 12) as $related_item)--}}
                            {{--                                            <div class="item"><img--}}
                            {{--                                                        src="{{ get_object_image($related_item->image, 'medium') }}"--}}
                            {{--                                                        alt="">--}}
                            {{--                                            </div>--}}
                            {{--                                        @endforeach--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                        </div>
                    </section>
                </div>
                {!! apply_filters(BASE_FILTER_PUBLIC_COMMENT_AREA, null) !!}
            @elseif($name == 'btandtt')
                <section>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9 blog-pull-right">
                                {!! $post->content !!}
                            </div>
                            <div class="col-md-3">
                                <div class="learnedu-sidebar left widget">
                                    <!-- baif vieets nooir baatj -->
                                    <div class="single-widget categories">
                                        <h3 class="line-bottom">{{$post->categories[0]->name}}</h3>
                                        <ul id="menu-dt list list-border angle-double-right">
                                            @foreach(get_post_is_featured_by_categorys( $post->categories , 12 ) as $postt)
                                                <li>
                                                    <a href="{{$postt->url}}" target="">{{$postt->name}}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <!-- baif vieest mowis -->
                                    <!-- Categories -->
                                    <div class="single-widget categories">
                                        <h3 class="line-bottom">Bài viết mới nhất</h3>
                                        @foreach (get_post_by_categorys( $post->categories , 12 ) as $related_item)
                                            <article class="post media-post clearfix pb-0 mb-10">
                                                <a class="post-thumb"  href="{{ $related_item->url }}"><img src="{{ get_object_image($related_item->image) }}"   alt="" width="75" height="75"> </a>
                                                <div class="post-right">
                                                    <h5 class="post-title mt-0"><a href="{{ $related_item->url }}">{{ $related_item->name }}</a></h5>
                                                </div>
                                            </article>
                                            <hr>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                {!! apply_filters(BASE_FILTER_PUBLIC_COMMENT_AREA, null) !!}
            @elseif($name == 'tintuc')
                <div class="col-lg-3 col-12">
                    <div class="learnedu-sidebar left widget">
                        <!-- Categories -->
                        <div class="single-widget categories">
                            <h3 class="line-bottom mt-0 line-height-1">Danh mục tin tức</h3>
                            <ul id="menu-dt list list-border angle-double-right">
                                @foreach(get_child_menu('Tin tức') as $sub)
                                    <li>
                                        <a href="{{ $sub->url }}" target="{{ $sub->target }}">
                                            {{ $sub->name }}</a>
                                        @if(get_child_menu_where_id($sub->id)->count() > 0)
                                            <ul>
                                                @foreach(get_child_menu_where_id($sub->id) as $e_sub)
                                                    <li>
                                                        <a href="{{ $e_sub->url }}" target="{{ $e_sub->target }}">
                                                            {{ $e_sub->name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div>
                        <h3 class="line-bottom mt-0 line-height-1">Tin tức mới nhất</h3>
                        <div class="latest-posts">
                            @foreach (get_posts_in_category_limit('Tin tức đào tạo',3) as $related_item)
                                <article class="post media-post clearfix pb-0 mb-10">
                                    <a class="post-thumb"  href="{{ $related_item->url }}"><img src="{{ get_object_image($related_item->image) }}"   alt="" width="75" height="75"> </a>
                                    <div class="post-right">
                                        <h5 class="post-title mt-0"><a href="{{ $related_item->url }}">{{ $related_item->name }}</a></h5>
                                        <p>Create at:{{$related_item->created_at->format('d-m-Y')}}</p>
                                        <a href="{{ $related_item->url }}" class="btn-read-more">Xem thêm</a>
                                    </div>
                                </article>
                            @endforeach
                        </div>

                    </div>
                </div>
                <div class="col-lg-9 col-12">
                    <div class="blog-detail">
                        <div class="title">
                            <h4>{{$post->name}}</h4>
                            <div style="width: 100px; border-top: 3px solid;"></div>
                            <br>
                        </div>
                        <div class="conten">
                            {!! $post->content !!}
                        </div>
                        <br>
                        <div class="discription">
                            <h6>Đăng bởi: {{get_name_user($post->author_id)}}</h6>
                            <p>{{$post->created_at}}</p>
                        </div>
                        <br/>
                        {!! apply_filters(BASE_FILTER_PUBLIC_COMMENT_AREA, null) !!}
                    </div>
                </div>
            @elseif($name == true)
                <div class="col-lg-3 col-12">
                    <div class="learnedu-sidebar left">
                        <!-- Categories -->
                        <div class="single-widget categories">
                            <h3 class="title">Chương trình đào tạo</h3>
                            <ul>
                                @foreach(get_menu_dao_tao('daotao') as $daotao)
                                    @if(get_menu_con_dao_tao($daotao->id))
                                        <style>
                                            #menu-dt li i {
                                                margin-top: 5px;
                                                float: right;
                                            }

                                            #menu-dt .dropdown {
                                                display: none;
                                            }

                                            #menu-dt .show {
                                                display: block;
                                            }
                                        </style>
                                        <script
                                                src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                                        <script>
                                            jQuery(document).ready(function () {
                                                jQuery('.dropbtn').click(function (event) {
                                                    var id = event.target.id;
                                                    jQuery(`.${id}`).toggleClass('show');
                                                });
                                            });
                                        </script>
                                        <ul id="menu-dt">
                                            @foreach(get_menu_con_dao_tao($daotao->id) as $sub)
                                                <li>
                                                    <a href="{{ $sub->url }}" target="{{ $sub->target }}">
                                                        {{ $sub->name }}</a> @if(get_menu_con_dao_tao($sub->id)->count() > 0)
                                                        <i class="fa fa-chevron-circle-right dropbtn"
                                                           id="{{ $sub->id }}"></i> @endif </li>
                                                @if(get_menu_con_dao_tao($sub->id)->count() > 0)
                                                    <ul class="dropdown {{ $sub->id }}" style="margin-left: 15px;">
                                                        @foreach(get_menu_con_dao_tao($sub->id) as $child)
                                                            <li>
                                                                <a href="{{ $child->url }}"
                                                                   target="{{ $child->target }}">
                                                                    {{ $child->name }}</a>
                                                                @if(get_menu_con_dao_tao($child->id)->count() > 0) <i
                                                                        class="fa fa-chevron-circle-right dropbtn"
                                                                        id="{{ $child->id }}"></i> @endif
                                                            </li>
                                                            @if(get_menu_con_dao_tao($child->id)->count() > 0)
                                                                <ul class="dropdown  {{ $child->id }}"
                                                                    id="{{ $sub->id }}" style="margin-left: 30px;">
                                                                    @foreach(get_menu_con_dao_tao($child->id) as $last)
                                                                        <li>
                                                                            <a href="{{ $last->url }}"
                                                                               target="{{ $last->target }}">
                                                                                {{ $last->name }}</a>
                                                                        </li>
                                                                    @endforeach
                                                                    <li></li>
                                                                </ul>
                                                            @endif
                                                        @endforeach
                                                        <li></li>
                                                    </ul>
                                                @endif
                                            @endforeach
                                        </ul>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-12">
                    <div class="blog-detail">
                        <div class="title">
                            <h4>{{$post->name}}</h4>
                            <div style="width: 100px; border-top: 3px solid;"></div>
                            <br>
                        </div>
                        <div class="conten">
                            {!! $post->content !!}
                        </div>
                        <br>
                        <div class="discription">
                            <h6>Đăng bởi: {{get_name_user($post->author_id)}}</h6>
                            <p>{{$post->created_at}}</p>
                        </div>
                        <br/>
                        {!! apply_filters(BASE_FILTER_PUBLIC_COMMENT_AREA, null) !!}
                    </div>
                </div>
            @else
                <div class="col-md-12">
                    <div class="conten">
                        {!! $post->content !!}
                    </div>
                    {!! apply_filters(BASE_FILTER_PUBLIC_COMMENT_AREA, null) !!}
                </div>
            @endif
        </div>
    </div>
</section>
