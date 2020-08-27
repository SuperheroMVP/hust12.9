{{--<div class="banner">--}}
{{--    <img src="{{ get_object_image(get_data_tuyensinh("banner")->image )}}">--}}
{{--</div>--}}
{{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">--}}
<style type="text/css">
    a{
        color: #212529;
    }
    a:hover{
        color: #212529;
        text-decoration: none;
    }
    .carousel-indicators li {
        position: relative;
        width: 12px;
        height: 12px!important;
        margin-right: 3px;
        margin-left: 3px;
        text-indent: -999px;
        background-color: rgba(255,255,255,.5);
    }
    .carousel-indicators li.active{
        margin-top:1px;
    }
    .carousel-caption {
        position: absolute;
        right: 15%;
        bottom: 50px;
        left: 15%;
        z-index: 10;
        color: #fff;
        text-align: center;
        background-color: rgba(43, 116, 181, 0.69);
        width: 15%;
        text-align: left;
        padding: 35px 15px;
    }
    .carousel-inner .item >img{
        animation: thing 15s ;
    }
    @keyframes thing{
        from{
            transform: scale(1,1);
        }
        to{
            transform: scale(1.5,1.5);
        }
    }
    .carousel-caption h5{
        font-size: 30px;
        font-weight: 400;
        color: #fff;
    }
    .carousel-caption p{
        font-weight: 400;
        font-size: 15px;
        padding-bottom: 10px;
    }
    .carousel-caption a{
        font-weight: 400;
        font-size: 18px;
        background:#fff;
        padding: 10px 15px;
        color: #212529!important;
        cursor: pointer;
    }
    .carousel-inner {
        position: relative;
        width: 100%;
        overflow: hidden;
    }
    .glyphicon-chevron-right:before,
    .glyphicon-chevron-left:before {
        content: ""!important;
    }
</style>
{{--{{ dd(get_posts_in_category_outstanding_limit('Tin tức tuyển sinh',5)) }}--}}
{{--{{dd(get_slide("tuyen_sinh"))}}--}}

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
                    @foreach((get_posts_in_category_outstanding_limit('Tin tức tuyển sinh',3)) as $post_item_slide)
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
                                        {!!$post_item->content!!}
                                        <a class="chitiet" href="{{$item->url}}"><i class="fa fa-angle-right" aria-hidden="true"></i>Chi tiết</a>
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

{{--    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>--}}
{{--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>--}}
{{--<div class="container">--}}
{{--    <ul class="nav tab-admissions" id="pills-tab" role="tablist">--}}
{{--        @foreach(get_data_tuyen_sinh() as  $key => $ts)--}}
{{--        <li role="presentation" @if($key == 0) class="active" @endif><a href="#pills-profile-{{$key}}" aria-controls="home" role="tab" data-toggle="tab">{{$ts->name}}</a></li>--}}
{{--        @endforeach--}}
{{--            <li role="presentation" class=""><a href="#pills-profile" aria-controls="home" role="tab" data-toggle="tab">Hệ thống điện tử thông minh & IOT</a></li>--}}
{{--        <li role="presentation" class=""><a href="#pills-profile-2" aria-controls="home" role="tab" data-toggle="tab"> Hệ thống kỹ thuật điện tử viễn thông</a></li>--}}
{{--        <li role="presentation" class=""><a href="#pills-profile-3" aria-controls="home" role="tab" data-toggle="tab"> Hệ thống kỹ thuật y sinh</a></li>--}}
{{--        <li role="presentation" class=""><a href="#pills-profile-4" aria-controls="home" role="tab" data-toggle="tab"> Hệ thống kỹ thuật điện tử viễn thông tiên tiến</a></li>--}}
{{--    </ul>--}}
{{--    <div class="tab-content content-admissions">--}}
{{--        @foreach(get_data_tuyen_sinh() as  $key => $ts)--}}
{{--            <div  role="tabpanel" class="tab-pane @if($key == 0) active @endif" id="pills-profile-{{$key}}">--}}
{{--                    {!! apply_filters(PAGE_FILTER_FRONT_PROFILE_CONTENT, $ts->content, $ts) !!}--}}
{{--            </div>--}}
{{--          @endforeach--}}
{{--        <div  role="tabpanel" class="tab-pane active" id="home">--}}
{{--            @if( !is_null(get_data_tuyensinh("httm")) )--}}
{{--                {!! apply_filters(PAGE_FILTER_FRONT_PROFILE_CONTENT, get_data_tuyensinh("httm")->content, get_data_tuyensinh("httm")) !!}--}}
{{--            @endif--}}
{{--        </div>--}}
{{--        <div role="tabpanel" class="tab-pane " id="pills-profile">--}}
{{--            @if( ! is_null(get_data_tuyensinh("htdttm")) )--}}
{{--                {!! apply_filters(PAGE_FILTER_FRONT_PROFILE_CONTENT, get_data_tuyensinh("htdttm")->content, get_data_tuyensinh("htdttm")) !!}--}}
{{--            @endif--}}
{{--        </div>--}}
{{--        <div role="tabpanel" class="tab-pane " id="pills-profile-2">--}}
{{--            @if( !is_null(get_data_tuyensinh("htktdtvt")) )--}}
{{--                {!! apply_filters(PAGE_FILTER_FRONT_PROFILE_CONTENT, get_data_tuyensinh("htktdtvt")->content, get_data_tuyensinh("htktdtvt")) !!}--}}
{{--            @endif--}}
{{--        </div>--}}
{{--        <div role="tabpanel" class="tab-pane " id="pills-profile-3">--}}
{{--            @if( !is_null(get_data_tuyensinh("htktys")) )--}}
{{--                {!! apply_filters(PAGE_FILTER_FRONT_PROFILE_CONTENT, get_data_tuyensinh("htktys")->content, get_data_tuyensinh("htktys")) !!}--}}
{{--            @endif--}}
{{--        </div>--}}
{{--        <div role="tabpanel" class="tab-pane " id="pills-profile-4">--}}
{{--            @if( !is_null(get_data_tuyensinh("htktdtvttt")) )--}}
{{--                {!! apply_filters(PAGE_FILTER_FRONT_PROFILE_CONTENT, get_data_tuyensinh("htktdtvttt")->content, get_data_tuyensinh("htktdtvttt")) !!}--}}
{{--            @endif--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
