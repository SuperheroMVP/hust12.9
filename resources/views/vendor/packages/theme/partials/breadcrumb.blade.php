<ul class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
    @foreach ($crumbs as $i => $crumb)
        @if ($i != (count($crumbs) - 1))
        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
            <meta itemprop="position" content="{{ $i + 1}}" />
            <a href="{{ $crumb['url'] }}" class="line-bottom" itemprop="item" title="{{ $crumb['label'] }}">
                {!! $crumb['label'] !!}
                <meta itemprop="name" content="{{ $crumb['label'] }}" />
            </a>
{{--            <i class="fa fa-angle-right"></i>--}}

        </li>
            <span>/</span>
        @else
        <li class="active">{!! $crumb['label'] !!}</li>
        @endif
    @endforeach
</ul>
