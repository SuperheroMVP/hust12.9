@foreach($menu_nodes as $row)
    <li class="list-group-item"><a href="{{$row->url}}">{{$row->title}}</a></li>
@endforeach
