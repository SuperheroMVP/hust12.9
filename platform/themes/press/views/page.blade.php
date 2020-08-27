{{-- <!-- Section: inner-header -->--}}
{{--<section class="inner-header divider parallax layer-overlay overlay-dark-5"--}}
{{--         style="background-image: url({{get_object_image(get_slide('slide')->image)}});">--}}
{{--    <div class="container pt-70 pb-20 fix-padding-banner-mobile">--}}
{{--        <!-- Section Content -->--}}
{{--        <div class="section-content">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-12">--}}
{{--                    <h3 class="page-intro__title">{{ $page->name }}</h3>--}}
{{--                    {!! Theme::breadcrumb()->render() !!}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}
@if($page->temp_view == 'sinh_vien_tuong_lai')
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
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-9 blog-pull-right">
                    {!! apply_filters(PAGE_FILTER_FRONT_PAGE_CONTENT, $page->content, $page) !!}
                    <div >
                        <div class="line-bottom-full mb-20"></div>
                        @if(get_child_menu('Tuyển Sinh')->count())
                            @foreach(get_child_menu('Tuyển Sinh') as $item)
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
                                                        {{--                                                            <a class="chitiet" href="{{$post_item->url}}"><i class="fa fa-angle-right" aria-hidden="true"></i>Xem thêm chi tiết</a>--}}
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
                <div class="col-md-3">
                    <div class="learnedu-sidebar left widget">
                        <!-- baif vieets nooir baatj -->
                        <div class="single-widget categories">
                            <h3 class="line-bottom">Tin tức tuyển sinh</h3>
                            <ul id="menu-dt list list-border angle-double-right">
                                @if(get_posts_in_category_outstanding_limit('Tuyển Sinh',5)->count()>0)
                                    @foreach(get_posts_in_category_outstanding_limit('Tuyển Sinh',5) as $postt)
                                        <li>
                                            <a href="{{$postt->url}}" target="">{{$postt->name}}</a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                        <!-- baif vieest mowis -->
                        <!-- Categories -->
                        <div class="single-widget categories">
                            <h3 class="line-bottom">Bài viết mới nhất</h3>
                            @if(get_posts_in_category_limit('Tin tức tuyển sinh',17)->count()>0)
                                @foreach (get_posts_in_category_limit('Tin tức tuyển sinh',17) as $related_item)
                                    <article class="post media-post clearfix pb-0 mb-10">
                                        <a class="post-thumb"  href="{{ $related_item->url }}"><img src="{{ get_object_image($related_item->image) }}"  style="max-width:100%;background-size: 100% 100%"  alt="" width="65" height="65"> </a>
                                        <div class="post-right">
                                            <h5 class="post-title mt-0"><a href="{{ $related_item->url }}">{{ $related_item->name }}</a></h5>
                                        </div>
                                    </article>
                                    <hr>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@else
<div class="banner">
    <img src="{{ get_object_image(get_data_tuyensinh("banner")->image )}}">
</div>
<div>
    @if($page->name == "Liên hệ")
        <script>
            var msg = '{{Session::get('alert')}}';
            var exist = '{{Session::has('alert')}}';
            if (exist) {
                alert(msg);
            }
        </script>
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-8 col-sm-12">--}}
{{--                    <div>--}}
{{--                        <h2 style="font-size: 22px; text-align: center; padding-bottom: 15px;">Góp ý và phản hồi</h2>--}}
{{--                    </div>--}}
{{--                    {!! apply_filters(PAGE_FILTER_FRONT_PAGE_CONTENT, $page->content, $page) !!}--}}
{{--                    <br>--}}
{{--                    <form action="{{route('feedback')}}" method="post">--}}
{{--                        @csrf--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-md-4 col-sm-12">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="name">Tên của bạn:</label>--}}
{{--                                    <input type="text" name="name" class="form-control" id="name"--}}
{{--                                           aria-describedby="emailHelp" placeholder="Họ và tên" required>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-4 col-sm-12">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="email">Email:</label>--}}
{{--                                    <input type="email" name="email" class="form-control" id="email"--}}
{{--                                           aria-describedby="emailHelp" placeholder="Enter email" required>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-4 col-sm-12">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="sdt">Số điện thoại</label>--}}
{{--                                    <input type="tel" pattern="[0-9]{10}" name="phone" class="form-control" id="sdt"--}}
{{--                                           aria-describedby="emailHelp" placeholder="Số điện thoại" required>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-12">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="td">Tiêu đề:</label>--}}
{{--                                    <input type="text" name="title" class="form-control" id="td"--}}
{{--                                           aria-describedby="emailHelp" placeholder="Tiêu đề " required>--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="nd">Nội dung chi tiết:</label>--}}
{{--                                    <textarea name="content" class="form-control" id="nd" rows="3" required></textarea>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <button type="submit" class="btn btn-primary">Gửi đi</button>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--                <div class="col-md-4 col-sm-12">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-12">--}}
{{--                            <div>--}}
{{--                                <h2 style="font-size: 22px; text-align: center; padding-bottom: 15px;">Thông tin liên--}}
{{--                                    hệ</h2>--}}
{{--                            </div>--}}
{{--                            <ul class="list">--}}
{{--                                <li>Phone: {{ theme_option('phone') }}</li>--}}
{{--                                <li>Email: <a href="mailto:{{ theme_option('email') }}">{{ theme_option('email') }}</a>--}}
{{--                                </li>--}}
{{--                                <li>Address: {{ theme_option('address') }}</li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-12">--}}
{{--                            <div>--}}
{{--                                <h2 style="font-size: 22px; text-align: center; padding: 15px 15px;">Bản đồ</h2>--}}
{{--                            </div>--}}
{{--                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.6963246222786!2d105.84315191448522!3d21.004806686011328!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac76ccab6dd7%3A0x55e92a5b07a97d03!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBCw6FjaCBraG9hIEjDoCBO4buZaQ!5e0!3m2!1svi!2s!4v1591199534409!5m2!1svi!2s"--}}
{{--                                    width="600" height="350" frameborder="0" style="border:0;" allowfullscreen=""--}}
{{--                                    aria-hidden="false" tabindex="0"></iframe>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <section class="divider">
            <div class="container">
                <div class="row pt-30">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="icon-box left media bg-deep p-30 mb-20"> <a class="media-left pull-left" href="#"><i class="fa fa-map" aria-hidden="true"></i></a>
                                    <div class="media-body"> <strong>Địa Chỉ</strong>
                                        <p>{{theme_option('address') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-12">
                                <div class="icon-box left media bg-deep p-30 mb-20"> <a class="media-left pull-left" href="#"><i class="fa fa-phone" aria-hidden="true"></i></a>
                                    <div class="media-body"> <strong>Số Điện Thoại</strong>
                                        <p>{{ theme_option('phone') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-12">
                                <div class="icon-box left media bg-deep p-30 mb-20"> <a class="media-left pull-left" href="#"> <i class="fa fa-envelope-o" aria-hidden="true"></i></a>
                                    <div class="media-body"> <strong>Email</strong>
                                        <p>{{ theme_option('email') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h3 class="line-bottom mt-0 mb-20">Góp ý và phản hồi</h3>
                        <p class="mb-20"></p>
                        <!-- Contact Form -->
                        <form action="{{route('feedback')}}" method="post" >
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input name="name" id="name" class="form-control" type="text" aria-describedby="emailHelp" placeholder="Tên của bạn" required="required"  aria-required="true">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input name="email" id="email" class="form-control" type="email" aria-describedby="emailHelp" placeholder="Email của bạn" required="required"  aria-required="true">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input name="title" id="td" class="form-control" type="text" placeholder="Tiêu Đề" required="required"  aria-required="true">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input name="phone" id="sdt" class="form-control" type="tel" pattern="[0-9]{10}" placeholder="Số Điện Thoại" aria-describedby="emailHelp"  required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <textarea name="content" class="form-control" id="nd" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-flat btn-theme-colored text-uppercase mt-10 mb-sm-30 border-left-theme-color-2-4px">Gửi Đi</button>
                                <button type="reset" class="btn btn-flat btn-theme-colored text-uppercase mt-10 mb-sm-30 border-left-theme-color-2-4px">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container-fluid p-0">
                <div class="row">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.6963246222786!2d105.84315191448522!3d21.004806686011328!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac76ccab6dd7%3A0x55e92a5b07a97d03!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBCw6FjaCBraG9hIEjDoCBO4buZaQ!5e0!3m2!1svi!2s!4v1591199534409!5m2!1svi!2s" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen=""></iframe>
                </div>
            </div>
        </section>

    @elseif($page->temp_view == 'conso')
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <br>
                    {!! apply_filters(PAGE_FILTER_FRONT_PAGE_CONTENT, $page->content, $page) !!}
                </div>

            </div>
        </div>
    @elseif($page->temp_view == 'under_construction')
        <style type="text/css">
            #header,
            #footer,
            .banner{display: none;}
            .error_div
            {
                text-align:center;
                width:100%;
                height: 1000px;
                background:#6f8ba4b8;
            }
            .content-error{
                padding-top:100px;
            }
            .content-error h4{
                color:#222;
                font-weight: 700;
            }
            .content-error ul li a{
                color:dodgerblue;
                font-weight: 500;
                font-size: 15px;
                text-decoration: underline;
                cusor:pointer;
            }
            .content-error ul li span{
                color:dodgerblue;
                font-weight: 500;
                margin-right: 10px;
            }
        </style>
        <div class=" container error_div">
            <div class="content-error">
                <h4>Hệ thống đang xây dựng</h4>
                <ul class="mt-3">
                    <li><span><i class="fa fa-long-arrow-left" aria-hidden="true"></i></span><a href="#" onclick="location.href = document.referrer; return false;">Quay lại</a></li>
                </ul>
            </div>
        </div>

    @elseif($page->temp_view == 'sinh_vien_hien_tai')
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-9 blog-pull-right">
                        {!! apply_filters(PAGE_FILTER_FRONT_PAGE_CONTENT, $page->content, $page) !!}
                        <div >
                            <div class="line-bottom-full mb-20"></div>
                                @if(get_child_menu('Sinh viên hiện tại')->count())
                                    @foreach(get_child_menu('Sinh viên hiện tại') as $item)
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
{{--                                                                <a class="chitiet" href="{{$post_item->url}}"><i class="fa fa-angle-right" aria-hidden="true"></i>Xem thêm chi tiết</a>--}}
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
                    <div class="col-md-3">
                        <div class="learnedu-sidebar left widget">
                            <!-- baif vieets nooir baatj -->
                            <div class="single-widget categories">
                                <h3 class="line-bottom">Tin tức đào tạo</h3>
                                <ul id="menu-dt list list-border angle-double-right">
                                    @if(get_posts_in_category_outstanding_limit('Tin tức đào tạo',5)->count()>0)
                                        @foreach(get_posts_in_category_outstanding_limit('Tin tức đào tạo',5) as $postt)
                                            <li>
                                                <a href="{{$postt->url}}" target="">{{$postt->name}}</a>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                            <!-- baif vieest mowis -->
                            <!-- Categories -->
                            <div class="single-widget categories">
                                <h3 class="line-bottom">Bài viết mới nhất</h3>
                                @if(get_posts_new_in_category_limit('Tin tức đào tạo',17)->count()>0)
                                    @foreach (get_posts_new_in_category_limit('Tin tức đào tạo',17) as $related_item)
                                        <article class="post media-post clearfix pb-0 mb-10">
                                            <a class="post-thumb"  href="{{ $related_item->url }}"><img src="{{ get_object_image($related_item->image) }}"   alt="" width="65" height="65"> </a>
                                            <div class="post-right">
                                                <h5 class="post-title mt-0"><a href="{{ $related_item->url }}">{{ $related_item->name }}</a></h5>
                                            </div>
                                        </article>
                                        <hr>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
{{--        <div class="container mt-30 mb-30">--}}
{{--            <div class="col-lg-4 col-md-4">--}}
{{--                <div >--}}
{{--                    <h3 class="line-bottom mt-0 line-height-1">Tin tức đào tạo </h3>--}}
{{--                    @if(get_posts_in_category_outstanding_limit('Tin tức đào tạo',5)->count()>0)--}}
{{--                        @foreach(get_posts_in_category_outstanding_limit('Tin tức đào tạo',5) as $post_child)--}}
{{--                            <div class="latest-posts">--}}
{{--                                <article class="post media-post clearfix pb-0 mb-10">--}}
{{--                                    <a class="post-thumb" href="{{ $post_child->url }}"><img src="{{get_object_image($post_child->image, 'medium') }}" alt="" width="75" height="75"> </a>--}}
{{--                                    <div class="post-right">--}}
{{--                                        <h5 class="post-title mt-0"><a href="{{ $post_child->url }}">{{$post_child->name}}</a></h5>--}}
{{--                                        --}}{{--                                            <p>Create at:{{$post_child->created_at->format('d-m-Y')}}</p>--}}
{{--                                        <a href="{{ $post_child->url }}" class="btn-read-more">Xem thêm</a>--}}
{{--                                    </div>--}}
{{--                                </article>--}}
{{--                            </div>--}}
{{--                        @endforeach--}}
{{--                    @endif--}}
{{--                </div>--}}
{{--                <div >--}}
{{--                    <h3 class="line-bottom mt-0 line-height-1">Tin mới nhất</h3>--}}
{{--                    @if(get_posts_in_category_limit('Tuyển Sinh',5) )--}}
{{--                        @foreach(get_posts_in_category_limit('Tuyển Sinh',5) as $post_child)--}}
{{--                            <div class="latest-posts">--}}
{{--                                <article class="post media-post clearfix pb-0 mb-10">--}}
{{--                                    <a class="post-thumb" href="{{ $post_child->url }}"><img src="{{get_object_image($post_child->image, 'medium') }}" alt="" width="75" height="75"> </a>--}}
{{--                                    <div class="post-right">--}}
{{--                                        <h5 class="post-title mt-0"><a href="{{ $post_child->url }}">{{$post_child->name}}</a></h5>--}}
{{--                                        --}}{{--                                           <p>Create at:{{$post_child->created_at->format('d-m-Y')}}</p>--}}
{{--                                        <a href="{{ $post_child->url }}" class="btn-read-more">Xem thêm</a>--}}
{{--                                    </div>--}}
{{--                                </article>--}}
{{--                            </div>--}}
{{--                        @endforeach--}}
{{--                    @endif--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="col-lg-8 col-md-8">--}}
{{--                <div class="container">--}}
{{--                    <div class="row">--}}
{{--                        <br>--}}
{{--                        {!! apply_filters(PAGE_FILTER_FRONT_PAGE_CONTENT, $page->content, $page) !!}--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                @if(get_child_menu('Sinh viên hiện tại')->count())--}}
{{--                    @foreach(get_child_menu('Sinh viên hiện tại') as $item)--}}
{{--                        <div class="alphabet">--}}
{{--                            <a href="javascript:void(0)" class="active_tap" data-filter="">{{$item->name}}</a>--}}
{{--                        </div>--}}
{{--                        @if(get_posts_in_category($item->name) ->count())--}}
{{--                            <div class="content_alpha">--}}
{{--                                <ul class="menu-child list-trainings">--}}
{{--                                    @foreach(get_posts_in_category($item->name) as $post_item)--}}
{{--                                        <li class="item-cate">--}}
{{--                                            <a href="javascript:void(0);" class="toggle-cate">--}}
{{--                                                <i class="fa fa-angle-right fix_croll" aria-hidden="true"></i>--}}
{{--                                                {{$post_item->name}}--}}
{{--                                            </a>--}}

{{--                                            <ul class="sub_child">--}}
{{--                                                {!!$post_item->content_description!!}--}}
{{--                                                --}}{{--<a class="chitiet" href="{{$post_item->url}}"><i class="fa fa-angle-right" aria-hidden="true"></i>Xem thêm chi tiết</a>--}}
{{--                                            </ul>--}}
{{--                                        </li>--}}
{{--                                    @endforeach--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                    @endforeach--}}
{{--                @endif--}}
{{--            </div>--}}



{{--        </div>--}}
    @elseif($page->temp_view == 'cocautochuc')
        <div class="container">
            <div class="col-lg-12 col-12">
                <div class="container">
                    <div class="row">
                        <br>
                        {!! apply_filters(PAGE_FILTER_FRONT_PAGE_CONTENT, $page->content, $page) !!}
                    </div>
                </div>
            </div>

        </div>
        <section class="bg-lighter">
            <div class="container pb-60">
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="owl-carousel-4col owl-carousel owl-theme owl-loaded" data-dots="true">
                                {!!
                                    Menu::renderMenuLocation('cocautochuc-menu', [
                                        'theme' => true,
                                        'view' => 'page_daotao_sub_menu',
                                    ])
                                !!}
{{--                                @foreach(get_posts_in_category('Cơ cấu tổ chức') as $post_child)--}}
{{--                                    <div class="item">--}}
{{--                                        <div class="service-block mb-md-30 bg-white">--}}
{{--                                            <div class="thumb" style="background-image: url({{ $post_child->image}}); max-height: 220px;">--}}
{{--                                                <img alt="featured project"  src="{{get_object_image($post_child->image, 'medium') }}" class="img-responsive img-fullwidth">--}}
{{--                                            </div>--}}
{{--                                            <div class="content text-left flip p-25 pt-0">--}}
{{--                                                <h4 class="line-bottom mb-10">{{ $post_child->name }}</h4>--}}
{{--                                                <a class="btn btn-dark btn-theme-colored btn-sm text-uppercase mt-10"--}}
{{--                                                   href="{{ $post_child->url }}">Xem thêm</a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                @endforeach--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @elseif($page->temp_view == 'phong_thi_nghiem')
        <div class="container">
            <div class="col-lg-12 col-12">
                <div class="container">
                    <div class="row">
                        <br>
                        {!! apply_filters(PAGE_FILTER_FRONT_PAGE_CONTENT, $page->content, $page) !!}
                    </div>
                </div>
            </div>

        </div>
        <section class="bg-lighter">
            <div class="container pb-60">
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="owl-carousel-4col owl-carousel owl-theme owl-loaded" data-dots="true">
                                {!!
                                    Menu::renderMenuLocation('phong_thi_nghiem_menu', [
                                        'theme' => true,
                                        'view' => 'menu_phong_thi_nghiem',
                                    ])
                                !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @elseif($page->temp_view == 'daotao')
        <div class="container">
{{--            <div class="col-lg-12 col-12">--}}
{{--                <div class="learnedu-sidebar left">--}}
{{--                    <!-- Categories -->--}}
{{--                    <div class="single-widget categories">--}}
{{--                        <div>--}}
{{--                            <h3 class="title">Chương trình đào tạo</h3>--}}
{{--                            <ul class="list-group list-group-flush">--}}
{{--                            @foreach(get_posts_in_category('Cử nhân/kĩ sư Điện tử Viễn thông') as $post)--}}
{{--                                    <li class="list-group-item"><a href="{{$post->url}}">{{$post->name}}</a></li>--}}
{{--                            @endforeach--}}
{{--                                @foreach(get_posts_in_category('Đào tạo') as $post)--}}
{{--                                    <li class="list-group-item"><a href="{{$post->url}}">{{$post->name}}</a></li>--}}
{{--                                @endforeach--}}
{{--                                {!!--}}
{{--                                    Menu::renderMenuLocation('content-menu', [--}}
{{--                                        'theme' => true,--}}
{{--                                        'view' => 'content_menu',--}}
{{--                                    ])--}}
{{--                                !!}--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="col-lg-12 col-12">
                <div class="container">
                    <div class="row">
                        <br>
                        {!! apply_filters(PAGE_FILTER_FRONT_PAGE_CONTENT, $page->content, $page) !!}
                    </div>
                </div>
            </div>

        </div>
        <section class="bg-lighter">
            <div class="container pb-60">
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="owl-carousel-4col owl-carousel owl-theme owl-loaded" data-dots="true">
{{--                                @foreach(get_posts_in_category('Đào tạo') as $row)--}}
{{--                                    <div class="item">--}}
{{--                                        <div class="service-block mb-md-30 bg-white">--}}
{{--                                            <div class="thumb"--}}
{{--                                                 style="background-image: url({{ $row->image}}); height: 220px;">--}}
{{--                                                <img alt="featured project"  src="{{get_object_image($row->image, 'small') }}" class="img-responsive img-fullwidth">--}}
{{--                                            </div>--}}
{{--                                            <div class="content text-left flip p-25 pt-0">--}}
{{--                                                <h4 class="line-bottom mb-10">{{ $row->name }}</h4>--}}
{{--                                                <p>{{ $row->description }}</p>--}}
{{--                                                <a class="btn btn-dark btn-theme-colored btn-sm text-uppercase mt-10"--}}
{{--                                                   href="{{ $row->url }}">Xem thêm</a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                @endforeach--}}
                                {!!
                                    Menu::renderMenuLocation('daotao_submenu', [
                                        'theme' => true,
                                        'view' => 'page_daotao_sub_menu',
                                    ])
                                !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
{{--        <section>--}}
{{--            <div class="container">--}}
{{--                <div class="row">--}}

{{--                        <h3 class="text-uppercase line-bottom mt-0 line-height-1"><i class="fa fa-calendar mr-10"></i>Tin Tức <span class="text-theme-color-2">Đào Tạo</span></h3>--}}
{{--                        @foreach(get_posts_in_category_limit('Tin tức đào tạo',8) as $post)--}}

{{--                            <div class="col-sm-6 col-md-3">--}}
{{--                                <article class="post clearfix mb-30 bg-lighter">--}}
{{--                                    <div class="entry-header">--}}
{{--                                        <div class="post-thumb thumb">--}}
{{--                                            <img src="{{get_object_image($post->image, 'medium') }}" alt="" class="img-responsive img-fullwidth">--}}
{{--                                        </div>--}}
{{--                                        <div class="entry-date media-left text-center flip bg-theme-colored border-top-theme-color-2-3px pt-5 pr-15 pb-5 pl-15">--}}
{{--                                            <ul>--}}
{{--                                                <li class="font-16 text-white font-weight-600">{{$post->created_at->format('d-m')}}</li>--}}
{{--                                                <li class="font-12 text-white text-uppercase">{{$post->created_at->format('Y')}}</li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="entry-content p-15 pt-10 pb-10">--}}
{{--                                        <div class="entry-meta media no-bg no-border mt-0 mb-10">--}}
{{--                                            <div class="media-body pl-0">--}}
{{--                                                <div class="event-content pull-left flip">--}}
{{--                                                    <h4 class="entry-title text-white text-uppercase font-weight-600 m-0 mt-20"><a href="#">{{$post->name}}</a></h4>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <p class="mt-5">{{$post->description}}<a class="text-theme-color-2 font-12 ml-5" href="{{$post->url}}">Xem thêm</a></p>--}}
{{--                                    </div>--}}
{{--                                </article>--}}
{{--                            </div>--}}
{{--                        @endforeach--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}
        <section id="event" class="bg-lighter">
            <div class="container pb-50">
                <div class="section-content">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <h3 class="line-bottom mt-0 line-height-1">Tin tức đào tạo</h3>
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
                        <div class="col-lg-6 col-md-6">
                            @foreach(get_reason_set(5) as $index => $reason_set)
                                @if($index == 0)
                                    <h3 class="line-bottom mt-0 line-height-1">{{$reason_set->name}}</span>
                                    </h3>
                                    <p class="mb-10">{!! apply_filters(REASONHUST_MODULE_SCREEN_NAME, $reason_set->content, $reason_set) !!}</p>
                                @endif
                            @endforeach
                            <div id="accordion1" class="panel-group accordion">
                                @foreach(get_reason_set(5) as $index => $reason_set)
                                    @if($index != 0)
                                        <div class="panel">
                                            <div class="panel-title"><a class="active" data-parent="#accordion1"
                                                                        data-toggle="collapse"
                                                                        href="#accordion1{{$index}}"
                                                                        aria-expanded="true">
                                                    <span class="open-sub"></span>{{$reason_set->name}}</a></div>
                                            <div id="accordion1{{$index}}" class="panel-collapse collapse"
                                                 role="tablist"
                                                 aria-expanded="true">
                                                <div class="panel-content">
                                                    <p>{!! apply_filters(REASONHUST_MODULE_SCREEN_NAME, $reason_set->content, $reason_set) !!}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>


@elseif($page->temp_view == 'gioithieu')
    <!-- Start main-content -->
        <div class="container">
            <!-- Section: About -->
            <section class="">
                <div class="container">
                    <div class="section-content">
                        <div class="row">
                            {!! apply_filters(PAGE_FILTER_FRONT_PAGE_CONTENT, $page->content, $page) !!}
                        </div>
                        <div class="row">
                            <div class="section-content mt-3">
                                <h3>Tìm hiểu thêm về chúng tôi qua </h3>
                                <div class="row" style="margin-top:30px;" >
                                    <div class="col-md-12">
                                        <div class="owl-carousel-4col owl-carousel owl-theme owl-loaded" data-dots="true">
                                            {!!
                                                Menu::renderMenuLocation('about_us_menu', [
                                                    'theme' => true,
                                                    'view' => 'gioithieu_menu',
                                                ])
                                            !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- Section: Services -->
{{--        <section id="services" class="bg-lighter">--}}
{{--            <div class="container">--}}
{{--                <div class="section-title">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-12">--}}
{{--                            <h2 class="text-uppercase text-theme-colored title line-bottom">Mục tiêu <span--}}
{{--                                        class="text-theme-color-2 font-weight-400">Tôn chỉ</span></h2>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row mtli-row-clearfix">--}}
{{--                    @foreach(get_goals_and_principles(6) as $gap)--}}
{{--                        <div class="col-xs-12 col-sm-6 col-md-4">--}}
{{--                            <div class="icon-box iconbox-theme-colored bg-white p-15 mb-30 border-1px">--}}
{{--                                <button class="icon icon-dark border-left-theme-color-2-3px pull-left flip mb-0 mr-0 mt-5">--}}
{{--                                    <i class="pe-7s-scissors"></i>--}}
{{--                                </button>--}}
{{--                                <div class="icon-box-details">--}}
{{--                                    <h4 class="icon-box-title font-16 font-weight-600 m-0 mb-5">{{$gap->name}}</h4>--}}
{{--                                    <p class="text-gray font-13 mb-0">{!! apply_filters(GOALSANDPRINCIPLES_MODULE_SCREEN_NAME, $gap->content, $gap) !!}</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}
</div>
<!-- Divider: Funfact -->
</div>
@elseif($page->temp_view == 'sub_dao_tao')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <div class="sidebar sidebar-left mt-sm-30 ml-40">
                    <div class="widget">
                        <h4 class="widget-title line-bottom">Danh sách chương trình <span class="text-theme-color-2">Đào Tạo</span></h4>
                        <div class="services-list">
                            <ul class="list list-border angle-double-right" id="myDIV">
                                {!!
                                    Menu::renderMenuLocation('daotao_submenu', [
                                        'options' => [],
                                        'theme' => true,
                                        'view' => 'daotao_submenu',
                                    ])
                                !!}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 blog-pull-right">
               <div class="mt-5">
                   {!! apply_filters(PAGE_FILTER_FRONT_PAGE_CONTENT, $page->content, $page) !!}
               </div>
            </div>
        </div>
    </div>

@elseif($page->temp_view == 'connguoi')
    <div class="col-lg-12 col-12">
        <!-- Start main-content -->
        <div class="main-content">

            <!-- Section: About  -->
            <section>
                <div class="container">
                    <div class="section-content">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-3 pb-sm-20 ">
                                <h2 class="line-bottom font-20 text-theme-colored text-uppercase mb-10 mt-0">{{$page->name}}</h2>
                                <p>{{$page->description}}</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-9 pb-sm-20 ">
                                <div class="row"></div>
                            @foreach(get_page_con_nguoi('subconnguoi') as $cat)
                                <div class="col-xs-12 col-sm-6 col-md-4 pb-sm-20">
                                    <div class="image-box-thum">
                                        <img class="img-fullwidth" alt=""
                                             src="{{ get_object_image($cat->image, 'medium') }}">
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
                </div>
            </section>
            <!-- Section: Features -->

        </div>
    </div>
@elseif($page->temp_view == 'subconnguoi')
    <div class="container">
        @if($page->name == 'Đội ngũ giảng dạy')
            <div style="margin-top: 20px;">
                @php
                    $profiles = get_all_profile_giang_day();
                @endphp
                @if ($profiles->count() > 0)
                    <div id="content" class="row">
                        @foreach ($profiles as $profile)
                            @php
                                $slug = get_slug_profile($profile->id);
                            @endphp
                            <section id="team">
                                <div class="col-xs-12 col-sm-6 col-md-3 sm-text-center mb-30 mb-sm-30">
                                    <div class="team maxwidth400">
                                        <div class="thumb">
                                            <img class="img-fullwidth img_doingugiangday" src="{{ get_object_image($profile->image, 'avatar-big') }}"  alt="{{ $profile->name }}">
                                        </div>
                                        <div class="content border-1px border-bottom-theme-color-2-2px p-15 bg-light clearfix">
                                            <h4 class="name text-theme-color-2 mt-0"> {{ $profile->name }}</h4>
                                            <p class="mb-20 min-height-40">{{ $profile->chucvu}}</p>
                                            <ul class="styled-icons icon-dark icon-circled icon-theme-colored icon-sm pull-left flip">
                                                <li><a href="http://{{$profile->facebook}}" target="_blank"><i
                                                                class="fa fa-facebook"></i></a></li>
{{--                                                <li><a href="http://{{$profile->zalo}}" target="_blank"><img--}}
{{--                                                                src="https://zalo-chat-static.zadn.vn/v1/favicon-96x96.png"--}}
{{--                                                                alt=""></a></li>--}}
                                                <li><a href="mailto:{{$profile->email}}" target="_blank"><i
                                                                class="fa fa-google-plus"></i></a></li>
                                            </ul>
                                            <a class="btn btn-theme-colored btn-sm pull-right flip"
                                               href="{{ $slug->key }}">Xem thêm</a>
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
            @if ($profiles->count() > 12)
                <input type='hidden' id='current_page'/>
                <input type='hidden' id='show_per_page'/>
                <div id="page_navigation"></div>
                <br>
            @endif
        @elseif($page->name == 'Sinh viên')
            <div class="container">
                <div class="row">
                    <br>
                    {!! apply_filters(PAGE_FILTER_FRONT_PAGE_CONTENT, $page->content, $page) !!}
                </div>
            </div>

        @elseif($page->name == 'Đội ngũ quản lý')
            <div style="margin-top: 20px;">
                @php
                    $profiles = get_all_profile_quan_ly();
                @endphp
                @if ($profiles->count() > 0)
                    <div id="content" class="row">
                        @foreach ($profiles as $profile)
                            @php
                                $slug = get_slug_profile($profile->id);
                            @endphp
                            <section id="team">
                                <div class="col-xs-12 col-sm-6 col-md-3 sm-text-center mb-30 mb-sm-30">
                                    <div class="team maxwidth400">
                                        <div class="thumb"><img class="img-fullwidth"
                                                                src="{{ get_object_image($profile->image, 'avatar-big') }}"
                                                                alt="{{ $profile->name }}" width="100%"></div>
                                        <div class="content border-1px border-bottom-theme-color-2-2px p-15 bg-light clearfix">
                                            <h4 class="name text-theme-color-2 mt-0"> {{ $profile->name }}</h4>
                                            <p class="mb-20  min-height-40">{{ $profile->chucvu}}</p>
                                            <ul class="styled-icons icon-dark icon-circled icon-theme-colored icon-sm pull-left flip">
                                                <li><a href="http://{{$profile->facebook}}" target="_blank"><i
                                                                class="fa fa-facebook"></i></a></li>
                                                <li><a href="http://{{$profile->zalo}}" target="_blank"><img
                                                                src="https://zalo-chat-static.zadn.vn/v1/favicon-96x96.png"
                                                                alt=""></a></li>
                                                <li><a href="mailto:{{$profile->email}}" target="_blank"><i
                                                                class="fa fa-google-plus"></i></a></li>
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
            @if ($profiles->count() > 12)
                <input type='hidden' id='current_page'/>
                <input type='hidden' id='show_per_page'/>
                <div id="page_navigation"></div>
                <br>
            @endif
        @else
            <div class="container" style="margin-top: 20px;">
                <h4>Danh mục đội ngũ cán bộ viện Điện Tử Viễn Thông</h4>
                <br>
                @php
                    $profiles = get_all_profile();
                @endphp
                @if ($profiles->count() > 0)
                    <table class="table">
                        <tr>
                            <th>Họ Và Tên</th>
                            <th>Văn Phòng</th>
                            <th>phone</th>
                            <th>email</th>
                            <th>Status</th>
                        </tr>
                        @foreach ($profiles as $profile)
                            @php
                                $slug = get_slug_profile($profile->id);
                            @endphp
                            <tr>
                                <td><a href="{{ asset($slug->key) }}">{{$profile->name}}</a></td>
                                <td>{{$profile->diachi}}</td>
                                <td>{{$profile->sdt}}</td>
                                <td>{{$profile->email}}</td>
                                <td>{{$profile->loai}}</td>
                            </tr>
                        @endforeach
                    </table>
                @else
                    <div>
                        <p>{{ __('Không tìm thấy bài viết nào!') }}</p>
                    </div>
                @endif
            </div>
        @endif
    </div>
@elseif($page->temp_view == 'nghiencuu')
    <div class="container">
        <div class="row">
            <br>
            {!! apply_filters(PAGE_FILTER_FRONT_PAGE_CONTENT, $page->content, $page) !!}
        </div>
    </div>

@else
    <div class="container">
        {{--        <div class="row">--}}
        {{--            <div class="video-popup col-md-6">--}}
        {{--                {!! apply_filters(PAGE_FILTER_FRONT_PAGE_CONTENT, $page->video, $page) !!}--}}
        {{--            </div>--}}
        {{--            <div class="col-md-6">--}}
        {{--                <b>{{ $page->description }}</b>--}}
        {{--            </div>--}}

        {{--        </div>--}}
        <div class="row">
            <br>
            {!! apply_filters(PAGE_FILTER_FRONT_PAGE_CONTENT, $page->content, $page) !!}
        </div>
    </div>
    @endif
    @endif
    </div>

