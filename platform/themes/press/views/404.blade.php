{{--@extends('theme.press::views.error-master')--}}

{{--@section('code', '404')--}}
{{--@section('title', __('Page could not be found'))--}}

{{--@section('message')--}}
{{--    <h4>{{ __('This may have occurred because of several reasons') }}</h4>--}}
{{--    <ul>--}}
{{--        <li>{{ __('The page you requested does not exist.') }}</li>--}}
{{--        <li>{{ __('The link you clicked is no longer.') }}</li>--}}
{{--        <li>{{ __('The page may have moved to a new location.') }}</li>--}}
{{--        <li>{{ __('An error may have occurred.') }}</li>--}}
{{--        <li>{{ __('You are not authorized to view the requested resource.') }}</li>--}}
{{--    </ul>--}}
{{--@endsection--}}
<style type="text/css">
    *{
        padding:0;
        margin:0;
    }
    .error_div
    {
        text-align:center;
        width:100%;
        height: 1000px;
        background:#6F8BA4;
    }
    .content-error{
        padding-top:100px;
    }
    .content-error ul{
        margin-top:20px;
    }
</style>
<div class="error_div">
   <div class="content-error">
       <h4>Không tìm thấy đường dẫn</h4>
       <ul>
           <li><a href="javascript:history.back()">Quay lại</a></li>
       </ul>
   </div>
</div>
