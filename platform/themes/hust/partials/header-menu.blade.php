{{--<table style="margin: 0;">--}}
{{--    <tr>--}}
        @foreach ($menu_nodes as $key => $row)
{{--            <td>--}}
            <div class="single-widget">
                <a href="{{ $row->url }}" target="{{ $row->target }}">
                    @if ($row->icon_font)<i class="{{$row->icon_font}}"></i> @endif
                    <h4>{{ $row->title }}</h4>
                </a>
            </div>
{{--            </td>--}}
        @endforeach
{{--    </tr>--}}
{{--    <tr>--}}
{{--        <td colspan="3">--}}
{{--        @if (is_plugin_active('blog'))--}}
{{--            <div class="form-search">--}}
{{--                <form class="quick-search" action="{{ route('public.search') }}">--}}
{{--                    <input type="text" name="q" placeholder="{{ __('Tìm kiếm...') }}" autocomplete="off">--}}
{{--                    <a href="#" class="btn-search"><i class="fa fa-search" aria-hidden="true"></i></a>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        @endif--}}
{{--        </td>--}}
{{--    </tr>--}}
{{--</table>--}}
