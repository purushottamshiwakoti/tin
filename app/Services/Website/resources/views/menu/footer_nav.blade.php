<h6>{{ ucwords($title) }}</h6>
<ul>
    @foreach ($items as $item)
        @php
            
            $originalItem = $item;
            
            $isActive = null;
            $styles = null;
            $icon = null;
            
            // Check if link is current
            if (url($item->link()) == url()->current()) {
                $isActive = 'active';
            }
            
        @endphp
        <li class="{{ $isActive }}"><a href="{{ url($item->link()) }}">{{ ucwords($item->name) }}</a></li>
    @endforeach
</ul>
