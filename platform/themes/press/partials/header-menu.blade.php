<div class="col-xs-6 col-sm-10 col-md-10">
@foreach ($menu_nodes as $key => $row)
        <div class="widget no-border pull-right sm-pull-none sm-text-center mt-20 m-5">
            <ul class="list-inline single-widget" style="font-size: 28px;">
                <li>@if ($row->icon_font)<i class="{{$row->icon_font}}"></i> @endif</li>
                <li class="display-text-mobile">
                    <a href="{{ $row->url }}" class="font-8 text-gray text-uppercase"><h6>{{ $row->title }}</h6></a>
                </li>
            </ul>
        </div>
@endforeach
</div>