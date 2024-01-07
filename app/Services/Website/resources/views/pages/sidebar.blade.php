<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-gutter">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="right-trip-panel right-quick-link">
            <h4>Useful Links</h4>
            <ul>
                @foreach ($pages as $page)
                    <li>
                        <a href="{{ route('website.page', $page->slug) }}">{{ ucwords($page->page_title) }}</a>
                    </li>
                @endforeach

            </ul>
        </div>
    </div>
</div>
