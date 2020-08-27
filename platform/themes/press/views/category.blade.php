@php
    $urli = NULL;
        foreach (request()->segments() as $segment){
            $urli = $urli."/".$segment;
        }

    //dd(request()->segments());
@endphp
{{--<section class="inner-header divider parallax layer-overlay overlay-dark-5"--}}
{{--         style="background-image: url({{get_object_image(get_slide('slide')->image)}});">--}}
{{--    <div class="container pt-70 pb-20 fix-padding-banner-mobile">--}}
{{--        <!-- Section Content -->--}}
{{--        <div class="section-content">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-12">--}}
{{--                    @if($urli == "/profile/all")--}}
{{--                        <h3 class="page-intro__title">Cán bộ giảng viên</h3>--}}
{{--                    @else--}}
{{--                        <h3 class="page-intro__title">{{ $category->name }}</h3>--}}
{{--                    @endif--}}
{{--                    {!! Theme::breadcrumb()->render() !!}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}
{{--{{dd(get_posts_in_category_outstanding('Tin tức tuyển sinh'))}}--}}
{{--{{dd(get_slide("tuyen_sinh")}}--}}
@if( $category->danhmuc == 'tuyen_sinh')
{{--    {{dd($category)->id}}--}}
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <?php $i=0?>
            @foreach(get_slide("tuyen_sinh") as $post_item_slide)
                <li data-target="#myCarousel" data-slide-to="{{$i}}"
                    @if($i==0)
                    class="active"
                    @endif
                ></li>
                <?php $i++?>
            @endforeach
        </ol>
        <div class="carousel-inner">
            <?php $i=0?>
            @foreach((get_slide("tuyen_sinh")) as $item_slide)
                @if(get_posts_in_category_outstanding('Tin tức tuyển sinh')->count())
                    @foreach((get_posts_in_category_outstanding('Tin tức tuyển sinh')) as $post_item_slide)
                        <div
                            @if($i==0)
                            class="item active"
                            @else
                            class="item"
                            @endif
                        >
                            <img src="{{get_object_image($item_slide->image )}}" style="width:100%;">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>{{$post_item_slide->name}}</h5>
                                <p>{{$post_item_slide->description}}...</p>
                                <a href="{{$post_item_slide->url}}">Xem thêm</a>
                            </div>
                        </div>
                        <?php $i++?>
                    @endforeach
                @endif
            @endforeach

        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"><i class="fa fa-chevron-left" aria-hidden="true"></i></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class ="container">
        <main class="pb-40 pt-40">
            <div id="TrainDetail" class="page faqs-page page-train" filter-action="https://ts.hust.edu.vn/training-cate/filter" data-action="https://ts.hust.edu.vn/saving-training">
                <div class="container">
                    @if(get_categoty_child($category->id)->count())
                        @foreach(get_categoty_child($category->id) as $item)
                            <div class="alphabet">
                                <a href="javascript:void(0)" class="active_tap" data-filter="">{{$item->name}}</a>
                            </div>
                            @if(get_posts_in_category($item->name) ->count())
                                <div class="content_alpha">
                                    <ul class="menu-child list-trainings">
                                        @foreach(get_posts_in_category($item->name) as $post_item)
                                            <li class="item-cate">
                                                <a href="javascript:void(0);" class="toggle-cate">
                                                    <i class="fa fa-angle-right fix_croll" aria-hidden="true"></i>
                                                    {{$post_item->name}}
                                                </a>

                                                <ul class="sub_child">
                                                    {!!$post_item->content_description!!}
{{--                                                    <a class="chitiet" href="{{$post_item->url}}"><i class="fa fa-angle-right" aria-hidden="true"></i>Xem thêm chi tiết</a>--}}
                                                </ul>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        @endforeach
                    @endif

                </div>
            </div>
        </main>
    </div>
@else
<div class="banner">
    <img src="{{ get_object_image(get_data_tuyensinh("banner")->image )}}">
    <div class="container">
        {!! Theme::breadcrumb()->render() !!}
    </div>
</div>
<div class="container">
    <!-- Blogs -->
    <section class="blog b-archives section">
        @if($urli == "/profile/all")
            <div style="margin-top: 20px;">
                @php
                    $profiles = get_all_profile();
                @endphp
                @if ($profile->count() > 0)
                    <div id="content" class="row">
                        @foreach ($profiles as $profile)
                            @php
                                $slug = get_slug_profile($profile->id);
                            @endphp
                            <section id="team">
                                <div class="col-xs-12 col-sm-6 col-md-3 sm-text-center mb-30 mb-sm-30">
                                    <div class="team maxwidth400">
                                        <div class="thumb"><img class="img-fullwidth"
                                                                src="{{ get_object_image($profile->image, 'post') }}"
                                                                alt="{{ $profile->name }}"></div>
                                        <div class="content border-1px border-bottom-theme-color-2-2px p-15 bg-light clearfix">
                                            <h4 class="name text-theme-color-2 mt-0"> {{ $profile->name }}</h4>
                                            <p class="mb-20 min-height-40">{{ $profile->chucvu}}</p>
                                            <ul class="styled-icons icon-dark icon-circled icon-theme-colored icon-sm pull-left flip">
                                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                            </ul>
                                            <a class="btn btn-theme-colored btn-sm pull-right flip"
                                               href="{{ asset($slug->key) }}">Xem thêm</a>
                                        </div>
                                    </div>
                                </div>
                            </section>
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
            <br>
        @elseif($category->danhmuc == 'daotao')
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 blog-pull-right">
                            <div class="row">
                                {{--                                @if ($posts->count() > 0)--}}
                                {{--                                    @foreach($posts as $post)--}}
                                {{--                                        <div class="col-sm-12 col-md-6 mt-10">--}}
                                {{--                                            <div class="thumb"><img alt="featured project"--}}
                                {{--                                                                    src="{{ get_object_image($post->image, 'post') }}"--}}
                                {{--                                                                    class="img-fullwidth" width="100%"></div>--}}
                                {{--                                            <h4 class="line-bottom mt-0 mt-sm-20">{{$post->name}}</h4>--}}
                                {{--                                            <a class="btn btn-dark btn-theme-colored btn-sm text-uppercase mt-10"--}}
                                {{--                                               href="{{$post->url}}">Xem thêm</a>--}}
                                {{--                                        </div>--}}
                                {{--                                    @endforeach--}}
                                {{--                                @else--}}
                                {{--                                    <h4>Không tìm thấy bài viết nào!</h4>--}}
                                {{--                                @endif--}}
                                {{--                            </div>--}}
                                {{--                            @if ($posts->count() > 0)--}}
                                {{--                                <nav class="pagination-wrap">--}}
                                {{--                                    {!! $posts->links() !!}--}}
                                {{--                                </nav>--}}
                                {{--                            @endif--}}
                                <div class="owl-carousel-4col owl-carousel owl-theme owl-loaded" data-dots="true">
                                    @if(get_posts_in_category('Đào tạo')->count() >0)
                                        @foreach(get_posts_in_category('Đào tạo') as $row)
                                            <div class="item">
                                                <div class="service-block mb-md-30 bg-white">
                                                    <div class="thumb"
                                                         style="background-image: url({{ $row->image}}); height: 220px;">
                                                        <img alt="featured project"
                                                             src="{{get_object_image($row->image, 'small') }}"
                                                             class="img-responsive img-fullwidth">
                                                    </div>
                                                    <div class="content text-left flip p-25 pt-0">
                                                        <h4 class="line-bottom mb-10">{{ $row->name }}</h4>
                                                        <p>{{ $row->description }}</p>
                                                        <a class="btn btn-dark btn-theme-colored btn-sm text-uppercase mt-10"
                                                           href="{{ $row->url }}">Xem thêm</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @elseif($category->danhmuc == 'danhmuc_daotao')
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 blog-pull-right">
                            {{--                            <div class="single-service">--}}
                            {{--                                <img src="images/services/lg9.jpg" alt="">--}}
                            {{--                                <h3 class="text-theme-colored">Chemical Engineering</h3>--}}
                            {{--                                <h5><em>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo unde, <span class="text-theme-color-2">chemical engineering</span> corporis dolorum blanditiis ullam officia <span class="text-theme-color-2">our university </span>natus minima fugiat repellat! Corrupti voluptatibus aperiam voluptatem. Exercitationem, placeat, cupiditate.</em></h5>--}}
                            {{--                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore suscipit, inventore aliquid incidunt, quasi error! Natus esse rem eaque asperiores eligendi dicta quidem iure, excepturi doloremque eius neque autem sint error qui tenetur, modi provident aut, maiores laudantium reiciendis expedita. Eligendi</p>--}}
                            {{--                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore voluptatem officiis quod animi possimus a, iure nam sunt quas aperiam non recusandae reprehenderit, nesciunt cumque pariatur totam repellendus delectus? Maxime quasi earum nobis, dicta, aliquam facere reiciendis, delectus voluptas, ea assumenda blanditiis placeat dignissimos quas iusto repellat cumque.</p>--}}
                            {{--                            </div>--}}


                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="sidebar sidebar-left mt-sm-30 ml-40">
                                <div class="widget">
                                    <h4 class="widget-title line-bottom">Danh mục <span class="text-theme-color-2"> Đào tạo</span>
                                    </h4>
                                    <div class="services-list">
                                        <ul class="list list-border angle-double-right">
                                            {{--                                            {!!--}}
                                            {{--                                                Menu::renderMenuLocation('content-menu', [--}}
                                            {{--                                                    'theme' => true,--}}
                                            {{--                                                    'view' => 'category_daotao_menu',--}}
                                            {{--                                                ])--}}
                                            {{--                                            !!}--}}
                                            <?php $i = 0?>
                                            @foreach(get_posts_in_category('Đào tạo') as $row)

                                                <li
                                                        @if($i==0)
                                                        class="active"
                                                        @endif
                                                ><a href="{{ $row->url }}">{{ $row->name }}</a></li>

                                                <?php $i++;?>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        @elseif($category->danhmuc == 'conso')
            <div class="col-lg-12 col-12">
                <!-- Start main-content -->
                <div class="main-content">

                    <!-- Section: About  -->
                    <section>
                        <div class="container">
                            <div class="section-content">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-6 pb-sm-20 ">
                                        <h3 class="line-bottom font-20 text-theme-colored text-uppercase mb-10 mt-0">{{$category->name}}</h3>
                                        <p>{{$category->description}}</p>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6 pb-sm-20 ">
                                        <img class="img-fullwidth" alt=""
                                             src="{{ get_object_image($category->image, 'post') }}">
                                    </div>
                                    <div class="col-md-12">
                                        @foreach($posts as $cat)
                                            <div class="col-xs-12 col-sm-6 col-md-3 pb-sm-20">
                                                <div class="image-box-thum">
                                                    <img class="img-fullwidth" alt=""
                                                         src="{{ get_object_image($cat->image, 'post') }}">
                                                </div>
                                                <div class="image-box-details pt-20 pb-sm-20">
                                                    <h4 class="title text-uppercase line-bottom mt-0">{{$cat->name}}</h4>
                                                    <p class="desc mb-10">{{$cat->description}}</p>
                                                    <a href="{{$cat->url}}" class="btn btn-xs btn-theme-colored">Xem
                                                        Thêm</a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Section: Features -->

                </div>
            </div>
        @elseif($category->danhmuc == 'lab')
            <div class="col-lg-12 col-12">
                <!-- Start main-content -->
                <div class="main-content">

                    <!-- Section: About  -->
                    <section>
                        <div class="container">
                            <div class="section-content">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-3 pb-sm-20 ">
                                        <h2 class="line-bottom font-20 text-theme-colored text-uppercase mb-10 mt-0">
                                            Centers<span class="text-theme-color-2">&Labs</span></h2>
                                        <p>{{$category->description}}</p>
                                    </div>
                                    @foreach($posts as $cat)
                                        <div class="col-xs-12 col-sm-6 col-md-3 pb-sm-20">
                                            <div class="image-box-thum">
                                                <img class="img-fullwidth" alt=""
                                                     src="{{ get_object_image($cat->image, 'post') }}">
                                            </div>
                                            <div class="image-box-details pt-20 pb-sm-20">
                                                <h4 class="title text-uppercase line-bottom mt-0">{{$cat->name}}</h4>
                                                <p class="desc mb-10">{{$cat->description}}</p>
                                                <a href="{{$cat->url}}" class="btn btn-xs btn-theme-colored">Xem
                                                    Thêm</a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Section: Features -->

                </div>
            </div>
        @elseif( $category->danhmuc == 'nghiencuu')
            <div class="col-lg-12 col-12">
                <!-- Start main-content -->
                <div class="main-content">
                    <!-- Section: About  -->
                    <section>
                        <div class="container">
                            <div class="section-content">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-3 pb-sm-20 ">
                                        <h2 class="line-bottom font-20 text-theme-colored text-uppercase mb-10 mt-0">
                                            Chào mừng đến với<span class="text-theme-color-2"> SET</span></h2>
                                        <p>{{$category->description}}</p>
                                    </div>
                                    @foreach(get_page_nghien_cuu('nghiencuu') as $cat)
                                        <div class="col-xs-12 col-sm-6 col-md-3 pb-sm-20">
                                            <div class="image-box-thum">
                                                <img class="img-fullwidth" alt=""
                                                     src="{{ get_object_image($cat->image, 'post') }}">
                                            </div>
                                            <div class="image-box-details pt-20 pb-sm-20">
                                                <h4 class="title text-uppercase line-bottom mt-0">{{$cat->name}}</h4>
                                                <p class="desc mb-10">{{$cat->description}}</p>
                                                @if($cat->name == "Trung tâm & phòng thí nghiệm")
                                                    <a href="/trung-tam-va-phong-thi-nghiem"
                                                       class="btn btn-xs btn-theme-colored">Xem
                                                        Thêm</a>
                                                @else
                                                    <a href="{{$cat->url}}" class="btn btn-xs btn-theme-colored">Xem
                                                        Thêm</a>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Section: Features -->

                </div>
            </div>
        @elseif( $category->danhmuc == 'mucnghiencuu')
        <!-- Section: Course list -->
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 blog-pull-right">
                            @if ($posts->count() > 0)
                                @foreach($posts as $post)
                                    <div class="row mb-15">
                                        <div class="col-sm-6 col-md-4">
                                            <div class="thumb"><img alt="featured project"
                                                                    src="{{ get_object_image($post->image, 'post') }}"
                                                                    class="img-fullwidth"></div>
                                        </div>
                                        <div class="col-sm-6 col-md-8">
                                            <h4 class="line-bottom mt-0 mt-sm-20">{{$post->name}}</h4>
                                            <ul class="review_text list-inline">
                                            </ul>
                                            <p>{{$post->description}}</p>
                                            <a class="btn btn-dark btn-theme-colored btn-sm text-uppercase mt-10"
                                               href="{{$post->url}}">Xem thêm</a>
                                        </div>
                                    </div>
                                    <hr>
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
                        <div class="col-md-3" style="border-right: 2px solid;">
                            <div class="sidebar sidebar-left mt-sm-30">
                                @if(count(get_menu_con_dao_tao($category->id)) > 0)
                                    <div class="widget">
                                        <h5 class="widget-title line-bottom">Danh mục con</h5>
                                        <div class="categories">
                                            <ul class="list list-border angle-double-right">
                                                @foreach(get_menu_con_dao_tao($category->id) as $sub)
                                                    <li>
                                                        <a href="{{ $sub->url }}" target="{{ $sub->target }}">
                                                            {{ $sub->name }}</a></li>
                                                    @if(get_menu_con_dao_tao($sub->id)->count() > 0)
                                                        @foreach(get_menu_con_dao_tao($sub->id) as $child)
                                                            <li>
                                                                <a href="{{ $child->url }}"
                                                                   target="{{ $child->target }}">
                                                                    {{ $child->name }}</a>
                                                            </li>
                                                            @if(get_menu_con_dao_tao($child->id)->count() > 0)
                                                                @foreach(get_menu_con_dao_tao($child->id) as $last)
                                                                    <li>
                                                                        <a href="{{ $last->url }}"
                                                                           target="{{ $last->target }}">
                                                                            {{ $last->name }}</a>
                                                                    </li>
                                                                @endforeach
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @endif
                                <div class="widget">
                                    <h5 class="widget-title line-bottom">Bài viết mới nhất</h5>
                                    <div class="latest-posts">
                                        @foreach (get_post_new() as $related_item)
                                            <article class="post media-post clearfix pb-0 mb-10">
                                                <a class="post-thumb" href="{{ $related_item->url }}"><img
                                                            src="{{ get_object_image($related_item->image) }}" alt=""
                                                            width="50%"></a>
                                                <div class="post-right">
                                                    <h5 class="post-title mt-0"><a
                                                                href="#">{{ $related_item->name }}</a>
                                                    </h5>
                                                    <p>{{ $related_item->discription }}</p>
                                                </div>
                                            </article>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        @elseif( $category->danhmuc == 'btandtt' )
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 blog-pull-right">
                            @if ($posts->count() > 0)
                                @foreach($posts as $post)
                                    <div class="row mb-15">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="thumb">
                                                @if($post->image != null)
                                                    <img alt="featured project"
                                                         src="{{ get_object_image($post->image, 'post') }}"
                                                         class="img-fullwidth">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12">
                                            <div style="background-color: #ececec; padding: 15px;">
                                                <h4 class="line-bottom">{{$post->name}}</h4>
                                                <p>{{$post->description}}</p>
                                                <a class="btn btn-dark btn-theme-colored btn-sm text-uppercase mt-10"
                                                   href="{{$post->url}}">Xem thêm</a>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
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
                                            <a class="post-thumb" href="{{ $related_item->url }}"><img
                                                        src="{{ get_object_image($related_item->image) }}" alt=""
                                                        width="75" height="75"> </a>
                                            <div class="post-right">
                                                <h5 class="post-title mt-0"><a
                                                            href="{{ $related_item->url }}">{{ $related_item->name }}</a>
                                                </h5>
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

        @elseif( $category->danhmuc == 'tintuc' )
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 blog-pull-right">
                            @foreach($posts as $menu_child)
                                <div class="row mb-15">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="thumb">
                                            @if($menu_child->image != null)
                                                <img alt="featured project"
                                                     src="{{ get_object_image($menu_child->image, 'post') }}"
                                                     class="img-fullwidth">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div style="background-color: #ececec; padding: 15px;">
                                            <h4 class="line-bottom">{{$menu_child->name}}</h4>
                                            <p>{{$menu_child->description}}</p>
                                            <a class="btn btn-dark btn-theme-colored btn-sm text-uppercase mt-10"
                                               href="{{$menu_child->url}}">Xem thêm</a>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                        </div>
                        <div class="col-md-3">
                            <h3 class="title">Danh mục tin tức</h3>
                            <ul id="menu-dt list list-border angle-double-right">
                                @foreach(get_child_menu('Tin tức') as $sub)
                                    <li class="border_bottom_dashed">
                                        <a href="{{ $sub->url }}" target="{{ $sub->target }}">
                                            {{ $sub->name }}</a>
                                        @if(get_child_menu_where_id($sub->id)->count() > 0)
                                            <ul>
                                                @foreach(get_child_menu_where_id($sub->id) as $e_sub)
                                                    <li class="border_bottom_dashed">
                                                        <a href="{{ $e_sub->url }}"
                                                           target="{{ $e_sub->target }}">
                                                            {{ $e_sub->name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                            <h3 class="line-bottom mt-0 line-height-1">Tin tức mới nhất</h3>
                            <div class="latest-posts">
                                @foreach (get_post_by_category_id_and_child_category($category->id, 17) as $related_item)
                                    <article class="post media-post clearfix pb-0 mb-10 border_bottom_dashed">
                                        <a class="post-thumb" href="{{ $related_item->url }}"><img
                                                    src="{{ get_object_image($related_item->image) }}" alt="" width="75"
                                                    height="75"> </a>
                                        <div class="post-right">
                                            <h5 class="post-title mt-0"><a
                                                        href="{{ $related_item->url }}">{{ $related_item->name }}</a>
                                            </h5>
{{--                                            <p>Create at:{{$related_item->created_at->format('d-m-Y')}}</p>--}}
                                            <a href="{{ $related_item->url }}" class="btn-read-more">Xem thêm</a>
                                        </div>
                                    </article>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @elseif( $category->danhmuc == 'tintuc_daotao' )
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 blog-pull-right">
                            <div class="row">
                                @if ($posts->count() > 0)
                                    @foreach($posts as $post)
                                        <div class="row mb-15">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="thumb">
                                                    @if($post->image != null)
                                                        <img alt="featured project"
                                                             src="{{ get_object_image($post->image, 'post') }}"
                                                             class="img-fullwidth">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                                <div style="background-color: #ececec; padding: 15px;">
                                                    <h4 class="line-bottom">{{$post->name}}</h4>
                                                    <p>{{$post->description}}</p>
                                                    <a class="btn btn-dark btn-theme-colored btn-sm text-uppercase mt-10"
                                                       href="{{$post->url}}">Xem thêm</a>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
{{--                                        <div class="col-sm-12 col-md-3 mt-10">--}}
{{--                                            <div class="thumb">--}}
{{--                                                <img alt="featured project"--}}
{{--                                                     src="{{ get_object_image($post->image, 'post') }}"--}}
{{--                                                     class="img-fullwidth" width="100%">--}}
{{--                                            </div>--}}
{{--                                            <h4 class="line-bottom mt-0 mt-sm-20">{{$post->name}}</h4>--}}
{{--                                            <a class="btn btn-dark btn-theme-colored btn-sm text-uppercase mt-10"--}}
{{--                                               href="{{$post->url}}">Xem thêm--}}
{{--                                            </a>--}}
{{--                                        </div>--}}
                                    @endforeach
                                @else
                                    <h4>Không tìm thấy bài viết nào!</h4>
                                @endif
                            </div>
                            @if ($posts->count() > 0)
                                <nav class="pagination-wrap">
                                    {!! $posts->links() !!}
                                </nav>
                            @endif
                        </div>
                        <div class="col-md-3">
                                <!-- Categories -->
                                    <h3 class="line-bottom mt-0 line-height-1">Tin tức nổi bật</h3>
                                    <ul id="menu-dt list list-border angle-double-right">
                                        @foreach(get_post_is_featured_by_category_id($category->id, 12) as $sub)
                                            <li class="border_bottom_dashed">
                                                <a href="{{ $sub->url }}" target="{{ $sub->target }}">{{ $sub->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                            <h3 class="line-bottom mt-0 line-height-1">Tin tức mới nhất</h3>
                            <div class="latest-posts">
                                @foreach (get_post_by_category_id($category->id, 17) as $related_item)
                                    <article class="post media-post clearfix pb-0 mb-10 border_bottom_dashed">
                                        <a class="post-thumb" href="{{ $related_item->url }}"><img
                                                    src="{{ get_object_image($related_item->image) }}" style="max-width:100%;background-size: 100% 100%" alt="" width="65"
                                                    height="65"> </a>
                                        <div class="post-right">
                                            <h5 class="post-title mt-0"><a
                                                        href="{{ $related_item->url }}">{{ $related_item->name }}</a>
                                            </h5>
{{--                                            <p>Create at:{{$related_item->created_at->format('d-m-Y')}}</p>--}}
                                            <a href="{{ $related_item->url }}" class="btn-read-more">Xem thêm</a>
                                        </div>
                                    </article>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @elseif( $category->danhmuc == 'cơ_cau_to_chuc' )
            <section class="bg-lighter">
                <div class="container pb-60">
                    <div class="section-content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="owl-carousel-4col owl-carousel owl-theme owl-loaded" data-dots="true">
                                    {{--                                    {{dd(get_posts_in_category('Cơ cấu tổ chức'))}}--}}
                                    @foreach(get_posts_in_category('Cơ cấu tổ chức') as $post_child)
                                        <div class="item">
                                            <div class="service-block mb-md-30 bg-white">
                                                <div class="thumb"
                                                     style="background-image: url({{ $post_child->image}}); max-height: 220px;">
                                                    <img alt="featured project"
                                                         src="{{get_object_image($post_child->image, 'medium') }}"
                                                         class="img-responsive img-fullwidth">
                                                </div>
                                                <div class="content text-left flip p-25 pt-0">
                                                    <h4 class="line-bottom mb-10">{{ $post_child->name }}</h4>
                                                    <a class="btn btn-dark btn-theme-colored btn-sm text-uppercase mt-10"
                                                       href="{{ $post_child->url }}">Xem thêm</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @else
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 blog-pull-right">
                            @if ($posts->count() > 0)
                                @foreach($posts as $post)
                                    <div class="row mb-15">
                                        <div class="col-sm-6 col-md-4">
                                            <div class="thumb"><img alt="featured project"
                                                                    src="{{ get_object_image($post->image, 'post') }}"
                                                                    class="img-fullwidth"></div>
                                        </div>
                                        <div class="col-sm-6 col-md-8">
                                            <h4 class="line-bottom mt-0 mt-sm-20">{{$post->name}}</h4>
                                            <ul class="review_text list-inline">
                                            </ul>
                                            <p>{{$post->description}}</p>
                                            <a class="btn btn-dark btn-theme-colored btn-sm text-uppercase mt-10"
                                               href="{{$post->url}}">Xem thêm</a>
                                        </div>
                                    </div>
                                    <hr>
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
                        <div class="col-md-3">
                            <div class="sidebar sidebar-left mt-sm-30">
                                <div class="widget">
                                    <h5 class="widget-title line-bottom">Bài viết mới nhất</h5>
                                    <div class="latest-posts">
                                        @foreach (get_post_new(3) as $related_item)
                                            <article class="post media-post clearfix pb-0 mb-10">
                                                <a class="post-thumb" href="{{ $related_item->url }}"><img
                                                            src="{{ get_object_image($related_item->image) }}"
                                                            alt=""></a>
                                                <div class="post-right">
                                                    <h5 class="post-title mt-0"><a
                                                                href="#">{{ $related_item->name }}</a>
                                                    </h5>
                                                    <p>{{ $related_item->discription }}</p>
                                                </div>
                                            </article>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        @endif
    </section>
</div>
@endif
</section>

