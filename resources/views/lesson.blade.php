@if (isset($items))
    <ul>
        @foreach ($items as $item)
           {{ $item->name }}
           @if (!is_null($item->path))
                <img src="{{ asset($item->path) }}">
           @endif
           @foreach ($item->item_child as $child)
               {{ $child->id }}
           @endforeach
        @endforeach
    </ul>
@else
@endif