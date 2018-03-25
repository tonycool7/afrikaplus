<ol class="general-playlist" style="visibility: hidden; position: absolute; top: 0pt;" data-thumbnail="">
    @foreach($songs as $item)
        @php
            $image = $item->image_path ?? $item->album->image_path ?? "";
        @endphp
        <li data-img="{{$image}}" data-title="{{$item->title}}" data-artist="{{($item->artist == NULL) ? $item->album->artist : $item->artist}}" data-value="{{$item->music_path}}">
            {{$item->name}}
            <span>
                <i class="fa fa-play"></i>
            </span>
        </li>
    @endforeach
</ol>