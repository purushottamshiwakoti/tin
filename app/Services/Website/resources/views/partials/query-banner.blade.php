@if (!empty(settings()->get('query_banner_title')))

    <section class="query-banner mt-80 bg-primary">
        <div class="container">
            <div class="row">
                <div class="col-md-6 py-120 text-content">
                    <h2>
                        {{ settings()->get('query_banner_title') }}</h2>
                    <div class="d-sm-flex justify-content-between">
                        @php
                            $details = settings()->get('query_banner_details');
                            $array = json_decode($details);
                            
                        @endphp
                        @foreach ($array as $f)
                        {{-- @dd($f) --}}
                            <div class="item">
                                <a href="tel:{{ $f->title }}" class="d-flex align-items-center">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.83203 7.5L9.9987 10.4167L14.1654 7.5" stroke="#FAA61A"
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path
                                            d="M1.66797 14.1665V5.83317C1.66797 5.39114 1.84356 4.96722 2.15612 4.65466C2.46868 4.3421 2.89261 4.1665 3.33464 4.1665H16.668C17.11 4.1665 17.5339 4.3421 17.8465 4.65466C18.159 4.96722 18.3346 5.39114 18.3346 5.83317V14.1665C18.3346 14.6085 18.159 15.0325 17.8465 15.345C17.5339 15.6576 17.11 15.8332 16.668 15.8332H3.33464C2.89261 15.8332 2.46868 15.6576 2.15612 15.345C1.84356 15.0325 1.66797 14.6085 1.66797 14.1665Z"
                                            stroke="#FAA61A" stroke-width="1.5" />
                                    </svg>
                                    {{ $f->title }}
                                </a>
                                <p>{{ $f->content }}</p>
                            </div>
                        @endforeach

                    </div>
                </div>
                <div class="col-md-6 img-div">
                    <img src="{{ asset('ruploads/' . settings()->get('query_banner_image')) }}" alt="">
                </div>
            </div>
        </div>
    </section>
@endif
