<section class="breadcrumbs ">
{{--                <h2>{{ $profile->name}}</h2>--}}
                <img src="{{get_object_image(get_data_tuyensinh("banner")->image)}}" width="100%">

</section>
<div class="container">
    <br>
    {!! apply_filters(PAGE_FILTER_FRONT_PROFILE_CONTENT, $profile->content, $profile) !!}
    <br>
</div>

