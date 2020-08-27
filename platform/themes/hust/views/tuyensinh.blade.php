<style>
    .tab-admissions {
        width: 100%;
        z-index: 10;
        background: #fff;
        margin: 20px 0;
        border-bottom: 1px solid #ddd;
        text-align: center;
    }

    ul, ul li {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    #pills-tab li {
        width: 20%;
    }

    dl, ol, ul {
        margin-top: 0;
        margin-bottom: 1rem;
    }

    .tab-admissions li a.active, .tab-admissions li a:hover {
        background-color: #007ba5;
        color: #FFFFFF;
    }

    .tab-admissions li a {
        font-size: 16px;
        font-weight: 500;
        text-transform: uppercase;
        padding: 20px 10px;
        display: inline-block;
        color: #000000;
    }

    a:hover {
        text-decoration: none;
    }

    a {
        -webkit-transition: all 0.3s ease;
        -moz-transition: all 0.3s ease;
        transition: all 0.3s ease;
        outline: none;
        box-shadow: none;
        text-decoration: none;
        cursor: pointer;
    }
</style>
<div class="banner">
    <img src="{{ get_object_image(get_data_tuyensinh("banner")->image )}}">
</div>
<div class="container">
    <ul class="nav tab-admissions" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class=" active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
               aria-controls="pills-home" aria-selected="true">
                Hệ thống thông minh & IOT
            </a>
        </li>
        <li class="nav-item">
            <a class="" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile"
               aria-selected="false">
                Hệ thống điện tử thông minh & IOT
            </a>
        </li>
        <li class="nav-item">
            <a class="" data-toggle="pill" href="#pills-profile-2" role="tab" aria-controls="pills-profile"
               aria-selected="false">
                Hệ thống kỹ thuật điện tử viễn thông
            </a>
        </li>
        <li class="nav-item">
            <a class="" data-toggle="pill" href="#pills-profile-3" role="tab" aria-controls="pills-profile"
               aria-selected="false">
                Hệ thống kỹ thuật y sinh
            </a>
        </li>
        <li class="nav-item">
            <a class="" data-toggle="pill" href="#pills-profile-4" role="tab" aria-controls="pills-profile"
               aria-selected="false">
                Hệ thống kỹ thuật điện tử viễn thông tiên tiến
            </a>
        </li>
    </ul>
    <div class="tab-content content-admissions" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            @if( !is_null(get_data_tuyensinh("httm")) )
                {!! apply_filters(PAGE_FILTER_FRONT_PROFILE_CONTENT, get_data_tuyensinh("httm")->content, get_data_tuyensinh("httm")) !!}
            @endif
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            @if( ! is_null(get_data_tuyensinh("htdttm")) )
                {!! apply_filters(PAGE_FILTER_FRONT_PROFILE_CONTENT, get_data_tuyensinh("htdttm")->content, get_data_tuyensinh("htdttm")) !!}
            @endif
        </div>
        <div class="tab-pane fade" id="pills-profile-2" role="tabpanel" aria-labelledby="pills-profile-tab">
            @if( !is_null(get_data_tuyensinh("htktdtvt")) )
                {!! apply_filters(PAGE_FILTER_FRONT_PROFILE_CONTENT, get_data_tuyensinh("htktdtvt")->content, get_data_tuyensinh("htktdtvt")) !!}
            @endif
        </div>
        <div class="tab-pane fade" id="pills-profile-3" role="tabpanel" aria-labelledby="pills-profile-tab">
            @if( !is_null(get_data_tuyensinh("htktys")) )
                {!! apply_filters(PAGE_FILTER_FRONT_PROFILE_CONTENT, get_data_tuyensinh("htktys")->content, get_data_tuyensinh("htktys")) !!}
            @endif
        </div>
        <div class="tab-pane fade" id="pills-profile-4" role="tabpanel" aria-labelledby="pills-profile-tab">
            @if( !is_null(get_data_tuyensinh("htktdtvttt")) )
                {!! apply_filters(PAGE_FILTER_FRONT_PROFILE_CONTENT, get_data_tuyensinh("htktdtvttt")->content, get_data_tuyensinh("htktdtvttt")) !!}
            @endif
        </div>
    </div>
</div>
