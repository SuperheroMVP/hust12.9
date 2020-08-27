@foreach($menu_nodes as $row)
    <div class="item">
        <div class="service-block mb-md-30 bg-white">
            <div class="thumb"
                 style="background-image: url({{ $row->image}}); height: 220px;">
                <img alt="featured project"  src="{{$row->icon_font}}" class="img-responsive img-fullwidth">
            </div>
            <div class="content text-left flip p-25 pt-0">
                <h4 class="line-bottom mb-10  min-height-60">{{ $row->title }}</h4>
                <p>{{ $row->description }}</p>
                <a class="btn btn-dark btn-theme-colored btn-sm text-uppercase mt-10"
                   href="{{ $row->url }}">Xem thêm</a>
            </div>
        </div>
    </div>
@endforeach
