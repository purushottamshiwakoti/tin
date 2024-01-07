<div class="pcoded-inner-navbar main-menu">
    <div class="pcoded-navigation-label">Navigation</div>
    <ul class="pcoded-item pcoded-left-item">
        @php
                @endphp
        @foreach($items as $item)
            @php

                $originalItem = $item;

                $isActive = null;
                // Check if link is current
                if(url($item->link) == url()->current()){
                    $isActive = 'active';
                }

            @endphp
            @if($originalItem->children->isEmpty())
                <li class="pcoded-hasmenu {{ setActive($item->link) }}">
                    <a href="{{ url('admin/'.$item->link) }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i data-feather="{{ trim($item->icon) }}"></i></span>
                        <span class="pcoded-mtext">{{ $item->name }}</span>
                    </a>

                </li>
                {{--<li class="">--}}
                    {{--<a href="{{ url($item->link()) }}">{{ $item->name }}</a>--}}
                {{--</li>--}}
            @else
                @php
                    $active = '';
                    foreach ($item->children as $child)
                    {
                    $active .= setActive($child->link);
                    }


                @endphp
                <li class="pcoded-hasmenu {{ $active }}">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i data-feather="{{ trim($item->icon) }}"></i></span>
                        <span class="pcoded-mtext">{{ $item->name }}</span>
                    </a>
                    <ul class="pcoded-submenu ">
                        @foreach($item->children as $child)
                        <li class="{{ setActive('dashboard') }}">
                            <a href="{{ url('admin/'.$child->link) }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">{{ $child->name }}</span>
                            </a>
                        </li>
                        @endforeach

                    </ul>
                </li>

            @endif
        @endforeach



    </ul>

</div>