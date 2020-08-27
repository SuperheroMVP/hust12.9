<?php  $i=0?>

@foreach($menu_nodes as $row)
    <li
     @if( $row->url == url()->current())
         class="active"
        @endif
    >
        <a href="{{$row->url}}">{{$row->title}}</a>
    </li>
    <?php  $i++?>
@endforeach
