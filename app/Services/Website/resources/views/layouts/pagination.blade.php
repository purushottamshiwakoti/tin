@if ($paginator->hasPages())
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
        <a class="prev page-numbers" href="{{ $paginator->previousPageUrl() }}" aria-label="Previous">
            Previous
        </a>
    @else
        <a class="prev page-numbers" href="{{ $paginator->previousPageUrl() }}" aria-label="Previous">
            Previous
        </a>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
            <a class="page-link disabled">{{ $element }}</a>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <a class="page-numbers current" href="{{ $url }}">{{ $page }}</a>
                @else
                    <a class="page-numbers " href="{{ $url }}">{{ $page }}</a>
                @endif
            @endforeach
        @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <a class="next page-numbers" href="{{ $paginator->nextPageUrl() }}" aria-label="Next">
            Next
        </a>
    @else
        <a class="next page-numbers" href="{{ $paginator->nextPageUrl() }}" aria-label="Next">
            Next
        </a>
    @endif
    </ul>
@endif
