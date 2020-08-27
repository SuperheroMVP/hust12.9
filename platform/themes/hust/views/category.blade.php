<section class="main-box">
    <div class=" ">
        @php
            $urli = NULL;
                foreach (request()->segments() as $segment){
                    $urli = $urli."/".$segment;
                }
        @endphp
        {{--                    @if($urli == "/profile/all")--}}
        {{--                        <h2>Cán bộ</h2>--}}
        {{--                    @else--}}
        {{--                        <h2>{{ $category->name}}</h2>--}}
        {{--                    @endif--}}
        {{--                    {{dd(get_object_image(get_data_tuyensinh("banner")->image)) }}--}}
        <img src="{{get_object_image(get_data_tuyensinh("banner")->image)}}" width="100%">
    </div>
    <div class="container">
        <!-- Blogs -->
        <section class="blog b-archives section">
            {!! Theme::breadcrumb()->render() !!}
                @if(check_url_dao_tao(request()->segment(count(request()->segments()))) == 'tintuc')
                    <div class="row">
                        @if ($posts->count() > 0)
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-8 col-12">
                                                <?php $i = 0; ?>
                                                @foreach ($posts as $post)
                                                    @if($i < 1)
                                                            <!-- Single Blog -->
                                                            <div class="single-blog">
                                                                <div class="blog-head overlay col-6 p-0">
                                                                    <div class="date">
                                                                        <h4>
                                                                            <time datetime="">{{ date_from_database($post->created_at, 'M d, Y') }}</time>
                                                                        </h4>
                                                                    </div>
                                                                    <div>
                                                                        <img class="img-full img-bg"
                                                                             src="{{ get_object_image($post->image, 'medium') }}"
                                                                             style="background-image: url('{{ get_object_image($post->image) }}');"
                                                                             alt="{{ $post->name }}">
                                                                    </div>
                                                                </div>
                                                                <div class="blog-content col-6 "
                                                                     style=" background-color: #e9ecef;padding-left: 20px">
                                                                    <h4 class="blog-title"><a href="{{ $post->url }}"
                                                                                              title="{{ $post->name }}">
                                                                            {{ $post->name }}
                                                                        </a></h4>
                                                                    <p>{{ $post->description }} lorem ipsum dolor sit amet
                                                                        consectetur adipiscing elit. aliquam tincidunt elementum sem
                                                                        non luctus </p>
                                                                    <div class="button">
                                                                        <a href="{{ $post->url }}" class="btn">Xem thêm<i
                                                                                    class="fa fa-angle-double-right"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- End Single Blog -->
                                                    @endif
                                                    <?php $i++; ?>
                                                @endforeach
                                                <div class="row d-flex justify-content-center align-items-center" style="margin-top: 25px;">
                                                <?php $i = 0; ?>
                                                @foreach ($posts as $post)
                                                    @if($i>2)
                                                            <div class="col-lg-12">
                                                                <!-- Single Blog -->
                                                                <div class="d-flex flex-row p-2">
                                                                    <div class="blog-content col-lg-8 ">
                                                                        <h4 class="blog-title"><a href="{{ $post->url }}"
                                                                                                  title="{{ $post->name }}">
                                                                                {{ $post->name }}
                                                                            </a></h4>
                                                                        <p>{{ $post->description }}</p>
                                                                        <a href="{{ $post->url }}" style="color: orange">Xem thêm</a>
                                                                    </div>
                                                                    <div class="blog-head overlay col-lg-4 p-0">
                                                                        <div class="date">
                                                                            <h4>
                                                                                <time datetime="">{{ date_from_database($post->created_at, 'M d, Y') }}</time>
                                                                            </h4>
                                                                        </div>
                                                                        <div style="text-align: right">
                                                                            <img class="img-full img-bg" width="100px"
                                                                                 src="{{ get_object_image($post->image, 'medium') }}"
                                                                                 style="background-image: url('{{ get_object_image($post->image) }}');"
                                                                                 alt="{{ $post->name }}">
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <!-- End Single Blog -->
                                                                <hr>
                                                            </div>
                                                    @endif
                                                    <?php $i++; ?>
                                                @endforeach
                                                </div>
                                                @if ($posts->count() > 0)
                                                    <nav class="pagination-wrap">
                                                        {!! $posts->links() !!}
                                                    </nav>
                                                @endif
                                            </div>
                                            <div class="col-lg-4 col-12">
                                                <div class="learnedu-sidebar">
                                                    <!-- Posts -->
                                                    <div class="single-widget posts">
                                                        <h3>Bài viết gần đây</h3>
                                                        @foreach(get_post_new() as $newpost)
                                                            @php
                                                                $slug = get_slug_newpost($newpost->id);
                                                            @endphp
                                                            <div class="single-post">
                                                                <div class="post-img">
                                                                    <img src="{{ get_object_image($newpost->image) }}" alt="">
                                                                </div>
                                                                <div class="post-info">
                                                                    <h4><a href="{{ asset($slug->key) }}">{{$newpost->name}}</a></h4>
                                                                    <span><i class="fa fa-calendar"></i>{{$newpost->created_at}}</span>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <!--/ End Posts -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div>
                                        <br>
                                        <p>{{ __('Không tìm thấy bài viết nào!') }}</p>
                                    </div>
                                @endif
                    </div>
                @else
                    <div class="row">
                        @if(check_url_dao_tao(request()->segment(count(request()->segments()))) == 'daotao')
                            <div class="col-lg-3 col-12">
                                <div class="learnedu-sidebar left">
                                    <!-- Categories -->
                                    <div class="single-widget categories">
                                        <h3 class="title">Chương trình đào tạo</h3>
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
                                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                                                            <ul class="dropdown {{ $sub->id }}"
                                                                style="margin-left: 15px;">
                                                                @foreach(get_menu_con_dao_tao($sub->id) as $child)
                                                                    <li>
                                                                        <a href="{{ $child->url }}"
                                                                           target="{{ $child->target }}">
                                                                            {{ $child->name }}</a>
                                                                        @if(get_menu_con_dao_tao($child->id)->count() > 0)
                                                                            <i class="fa fa-chevron-circle-right dropbtn"
                                                                               id="{{ $child->id }}"></i> @endif
                                                                    </li>
                                                                    @if(get_menu_con_dao_tao($child->id)->count() > 0)
                                                                        <ul class="dropdown  {{ $child->id }}"
                                                                            id="{{ $sub->id }}"
                                                                            style="margin-left: 30px;">
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
                                    </div>
                                </div>
                            </div>
                        @elseif(check_url_dao_tao(request()->segment(count(request()->segments()))) == 'nghiencuu')
                            <div class="col-lg-3 col-12">
                                <div class="learnedu-sidebar left">
                                    <div class="single-widget posts">
                                        <h3>Bài viết mới nhất</h3>
                                        @foreach (get_posts_by_tag_nghiencuu(6) as $related_item)
                                            <div class="single-post">
                                                <div class="post-img">
                                                    <a href="{{ $related_item->url }}">
                                                        <img src="{{ get_object_image($related_item->image) }}"
                                                             alt="{{ $related_item->name }}">
                                                    </a>
                                                </div>
                                                <div class="post-info">
                                                    <h4>
                                                        <a href="{{ $related_item->url }}"> {{ $related_item->name }}</a>
                                                    </h4>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="col-lg-3 col-12">
                                <div class="learnedu-sidebar left">
                                    <!-- Posts -->
                                    <div class="single-widget posts">
                                        <h3>Bài viết gần đây</h3>
                                        @foreach(get_post_new() as $newpost)
                                            @php
                                                $slug = get_slug_newpost($newpost->id);
                                            @endphp
                                            <div class="single-post">
                                                <div class="post-img">
                                                    <img src="{{ get_object_image($newpost->image) }}" alt="">
                                                </div>
                                                <div class="post-info">
                                                    <h4><a href="{{ asset($slug->key) }}">{{$newpost->name}}</a></h4>
                                                    <span><i class="fa fa-calendar"></i>{{$newpost->created_at}}</span>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <!--/ End Posts -->
                                </div>
                            </div>
                        @endif
                        <div class="col-lg-9 col-12">
                            @if($urli == "/profile/all")
                                <div>
                                    @php
                                        $profiles = get_all_profile();
                                    @endphp
                                    @if ($profile->count() > 0)
                                        <div id="content" class="row">
                                            @foreach ($profiles as $profile)
                                                @php
                                                    $slug = get_slug_profile($profile->id);
                                                @endphp
                                                <div class="col-lg-4 col-12">
                                                    <!-- Single Blog -->
                                                    <div class="single-blog">
                                                        <div class="blog-head overlay">
                                                            <div style="height: 255px;">
                                                                <img class="img-full img-bg"
                                                                     src="{{ get_object_image($profile->image, 'medium') }}"
                                                                     style="max-height: none; background-image: url('{{ get_object_image($profile->image) }}'); overflow: hidden;"
                                                                     alt="{{ $profile->name }}">
                                                            </div>
                                                        </div>
                                                        <div class="blog-content">
                                                            <h4 class="blog-title"><a href="{{ asset($slug->key) }}"
                                                                                      title="{{ $profile->name }}">
                                                                    {{ $profile->name }}
                                                                </a></h4>
                                                            <p>{{ $profile->chucvu}}</p>
                                                            <div class="button">
                                                                <a href="{{ asset($slug->key) }}" class="btn">Xem thêm<i
                                                                            class="fa fa-angle-double-right"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Single Blog -->
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <div>
                                            <p>{{ __('Không tìm thấy bài viết nào!') }}</p>
                                        </div>
                                    @endif
                                </div>
                                <input type='hidden' id='current_page'/>
                                <input type='hidden' id='show_per_page'/>
                                <div id="page_navigation"></div>
                            @else
                                <div class="row">
                                    @if ($posts->count() > 0)
                                        @foreach ($posts as $post)
                                            <div class="col-lg-4 col-12">
                                                <!-- Single Blog -->
                                                <div class="single-blog">
                                                    <div class="blog-head overlay">
                                                        <div class="date">
                                                            <h4>
                                                                <time datetime="">{{ date_from_database($post->created_at, 'M d, Y') }}</time>
                                                            </h4>
                                                        </div>
                                                        <div>
                                                            <img class="img-full img-bg"
                                                                 src="{{ get_object_image($post->image, 'medium') }}"
                                                                 style="background-image: url('{{ get_object_image($post->image) }}');"
                                                                 alt="{{ $post->name }}">
                                                        </div>
                                                    </div>
                                                    <div class="blog-content">
                                                        <h4 class="blog-title"><a href="{{ $post->url }}"
                                                                                  title="{{ $post->name }}">
                                                                {{ $post->name }}
                                                            </a></h4>
                                                        <p>{{ $post->description }}</p>
                                                        <div class="button">
                                                            <a href="{{ $post->url }}" class="btn">Xem thêm<i
                                                                        class="fa fa-angle-double-right"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Single Blog -->
                                            </div>
                                        @endforeach
                                    @else
                                        <div>
                                            <br>
                                            <p>{{ __('Không tìm thấy bài viết nào!') }}</p>
                                        </div>
                                    @endif
                                    @if ($posts->count() > 0)
                                        <nav class="pagination-wrap">
                                            {!! $posts->links() !!}
                                        </nav>
                                    @endif
                                </div>
                            @endif
                        </div>

                    </div>
                @endif
        </section>
    </div>
</section>

