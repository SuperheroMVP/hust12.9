<ul class="list angle-double-right list-border">
    @foreach ($menu_nodes as $key => $row)
        <li>
            <a href="{{ $row->url }}" target="{{ $row->target }}">
                @if ($row->icon_font)<i class="{{$row->icon_font}}"></i> @endif
                {{ $row->title }}
            </a>
        </li>
    @endforeach
</ul>
