<section id="cd-timeline" class="cd-container">
    @foreach(get_development_histories() as $dt)
    <div class="cd-timeline-block">
        <div class="cd-timeline-img cd-picture text-center">
{{--            <span class="date_history">{{$dt->date}}</span>--}}
            <img src="{{ get_object_image($dt->image, 'medium') }}" alt="Picture">
        </div> <!-- cd-timeline-img -->

        <div class="cd-timeline-content">
            <article class="post clearfix">
                <div class="entry-header">
                    <div class="post-thumb">
                        @if($dt->video == null)
                        <img alt="" src="{{ get_object_image($dt->image, 'medium') }}">
                        @else
                        {!! apply_filters(DEVELOPMENTHISTORY_MODULE_SCREEN_NAME, $dt->video, $dt) !!}
                        @endif
                    </div>
{{--                    <h5 class="entry-title">{{$dt->name}}</h5>--}}
{{--                    <ul class="list-inline font-12 mb-20 mt-10">--}}
{{--                        <li>posted by <a href="#" class="text-theme-colored">Admin |</a></li>--}}
{{--                        <li><span class="text-theme-colored">{{date_format($dt->created_at,"d/m/yy H:i:s")}}</span></li>--}}
{{--                    </ul>--}}
                </div>
                <div class="entry-content">
                    <h3 class="entry-title">{{$dt->name}}</h3>
                    <p class="mb-30">{{$dt->content}}</p>
{{--                    <ul class="list-inline like-comment pull-left font-12">--}}
{{--                        <li><i class="pe-7s-comment"></i>36</li>--}}
{{--                        <li><i class="pe-7s-like2"></i>125</li>--}}
{{--                    </ul>--}}
{{--                    <a class="pull-right text-gray font-13" href="#"><i class="fa fa-angle-double-right text-theme-colored"></i> Read more</a>--}}
                </div>
            </article>
        </div> <!-- cd-timeline-content -->
    </div> <!-- cd-timeline-block -->
    @endforeach
</section>