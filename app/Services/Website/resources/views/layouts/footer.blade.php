<footer>
    <div class="container-fluid quick-links-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 quick-links gutter-right">
                    {{ menu('activities', 'website::menu.footer_nav') }}
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 quick-links">
                    {{ menu('best-travel-packages', 'website::menu.footer_nav') }}
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 quick-links">
                    {{ menu('about-us', 'website::menu.footer_nav') }}
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 quick-links">
                    {{ menu('nepal-travel-info', 'website::menu.footer_nav') }}
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="container-fluid foot-info">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 foot-info1">
                    <div class="footer-logo">
                        <a href="{{ route('website.home') }}"><img
                                src="{{ public_asset('website/img/logo-white.png') }}" class="img-responsive"
                                alt="Doko Tours Logo"></a>
                    </div>
                    <ul>
                        <li>
                            @foreach (explode(',', setting('mail')) as $mail)
                                <a href="mailto:{{ $mail }}">{{ $mail }}</a></br>
                            @endforeach
                        </li>
                        <li>{{ setting('address') }}</li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 foot-info2">
                    <div class="social">
                        <a target="_blank" href="{{ setting('extras.facebook') }}">
                            <p class="round facebook"><i class="fa fa-facebook-f"></i></p>
                        </a>
                        <a target="_blank" href="{{ setting('extras.twitter') }}">
                            <p class="round twitter"><i class="fa fa-twitter"></i></p>
                        </a>
                        <a target="_blank" href="{{ setting('extras.youtube') }}">
                            <p class="round youtube"><i class="fa fa-youtube"></i></p>
                        </a>
                        <a target="_blank" href="{{ setting('extras.instagram') }}">
                            <p class="round instagram"><i class="fa fa-instagram"></i></p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <form method="post" id="subscribe-form" action="{{ route('website.subscribe.post') }}">
                        <div class="subscribe-wrapper">
                            <input type="text" name="email" required placeholder="Enter your email address">
                            <button type="submit">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class=" text-center">
                        <p>Copyright. All rights reserved. {{ setting('extras.company_name') }}. Website brought in to
                            life by <a href="//makuracreations.com/" target="_blank">Makura Creations</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="#">
        <div class="scrollup"><i class="fa fa-chevron-up"></i></div>
    </a>
    @yield('extraFooter')
</footer>
@section('includedJs')
    @parent

@stop
