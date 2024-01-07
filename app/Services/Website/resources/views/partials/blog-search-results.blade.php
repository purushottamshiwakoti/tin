    <div class="row">
        @forelse($posts as $p)
            <div class="col-md-6 blog-card-two-wrapper">
                <div class="blog-card">
                    <a href="{{ route('website.blog.detail', $p->slug) }}" class="img-div d-block">
                        <img src="{{ asset('ruploads/' . $p->getCoverImage()) . pages_parallax() }}"
                            alt="{{ $p->title }}">
                    </a>
                    <div class="text-content">
                        <a href="{{ route('website.blog.detail', $p->slug) }}" class="title">
                            {{ $p->title }}
                        </a>
                        <div class="info d-flex">
                            <span><i class="fal fa-clock"></i>16 Minutes Read</span>
                            <span>written on {{ $p->created_at->format('d M Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>

        @empty
            <div class="col-md-12 col-sm-12 package-item float-left trips text-center">
                <h3>Result not Found</h3>
            </div>
        @endforelse

    </div>
