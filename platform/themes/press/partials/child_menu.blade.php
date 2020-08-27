<ul id="child" class="dropdown submenu" style="width: 300px;">
    @foreach ($menu_nodes as $key => $row)
        <li style="width: 300px;">
            <a href="{{ $row->url }}" target="{{ $row->target }}">
                @if ($row->icon_font)<i class="{{$row->icon_font}}"></i> @endif{{ $row->title }}
            </a>
            @if ($row->has_child)
                {!!
                    Menu::generateMenu([
                        'slug' => $menu->slug,
                        'view' => 'last_menu',
                        'options' => ['class' => 'submenu'],
                        'parent_id' => $row->id,
                    ])
                !!}
            @endif
        </li>
    @endforeach
</ul>
