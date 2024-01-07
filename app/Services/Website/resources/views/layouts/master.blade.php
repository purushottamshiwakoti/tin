<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if (isset($exception) && $exception->getStatusCode() == 404)
        <title>404 Page Error</title>
        <meta name="description" content="The page you are looking for is either unavailable or broken.">
    @else
        <meta name="description"
            content="{{ isset($metas) && $metas->meta_description ? $metas->meta_description : setting('meta_description') }}">
        <meta name="keywords"
            content="{{ isset($metas) && $metas->meta_keywords ? $metas->meta_keywords : setting('meta_keywords') }}">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>{{ isset($metas) && $metas->meta_title ? strip_tags($metas->meta_title) : setting('meta_title') }}
        </title>

        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:type" content="article">
        <meta property="og:image"
            content="{{ isset($metas) && $metas->image ? asset('ruploads/' . $metas->image) : public_asset('website/img/default-share-tan.jpg') }}">
        <meta property="og:title"
            content="{{ isset($metas) && $metas->page_title ? strip_tags($metas->page_title) : setting('meta_title') }}">
        <meta property="og:description"
            content="{{ isset($metas) && $metas->meta_description ? $metas->meta_description : setting('meta_description') }}">

        @if (app('request')->route()->getName() == 'website.home')
            <link rel="canonical" href="{{ url()->current() . '/' }}">
        @elseif(strpos(url()->current(), '/notes') !== false)
            <link rel="canonical" href="{{ str_replace('/notes', '', url()->current()) }}">
        @else
            <link rel="canonical" href="{{ url()->current() }}">
        @endif
    @endif


    @yield('header')
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-131654738-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-131654738-1');
    </script>

    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('website/assets/img/favicon.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Owl Carousel -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">



    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet">

    <!-- Sweet Alert -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" id="theme-styles">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css"
        integrity="sha512-ELV+xyi8IhEApPS/pSj66+Jiw+sOT1Mqkzlh8ExXihe4zfqbWkxPRi8wptXIO9g73FSlhmquFlUOuMSoXz5IRw=="
        crossorigin="anonymous" referrerpolicy="no-referrer">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">

    <!-- Light Gallery -->
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/lightgallery@1.6.11/dist/css/lightgallery.min.css">

    <!-- Youtube Video Player -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery.mb.YTPlayer/3.3.9/css/jquery.mb.YTPlayer.min.css"
        integrity="sha512-+HWFHCZZfMe4XQRKS0bOzQ1r4+G2eknhMqP+FhFIkcmWPJlB4uFaIagSIRCKDOZI3IHc0t7z4+N/g2hIaO/JIw=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
    <!-- Drop Zone -->
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- magnific-popup -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css"
        integrity="sha512-+EoPw+Fiwh6eSeRK7zwIKG2MA8i3rV/DGa3tdttQGgWyatG/SkncT53KHQaS5Jh9MNOT3dmFL0FjTY08And/Cw=="
        crossorigin="anonymous" referrerpolicy="no-referrer">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <!-- Custom CSS -->
    <link rel="shortcut icon" href="{{ asset('website/assets/img/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('website/assets/css/style.css') }}">

    @yield('css')

    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-M8TPLZN');
    </script>
    <!-- End Google Tag Manager -->

</head>

<body>


    {{ menu('header', 'website::menu.nav') }}

    @yield('content')



    <footer class="pt-60" style="background-color: white">
        <div class="top-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 content-wrapper">

                        {{ menu('activities', 'website::menu.footer_nav') }}

                    </div>
                    <div class="col-md-3 content-wrapper">

                        {{ menu('best-travel-packages', 'website::menu.footer_nav') }}

                    </div>
                    <div class="col-md-3 content-wrapper">

                        {{ menu('about-us', 'website::menu.footer_nav') }}

                    </div>
                    <div class="col-md-3 content-wrapper">
                        {{ menu('nepal-travel-info', 'website::menu.footer_nav') }}

                    </div>
                </div>
            </div>
        </div>
        <img src="{{ asset('website/assets/img/footer-bg.jpg') }}" class="deco-img w-100" alt="footer background">
        <div class="bottom-footer">
            <div class="container">
                <div class="row">
                    <div class="col-2 mb-4">
                        <img src="{{ asset('website/assets/img/logo.png') }}" alt="logo">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 mb-lg-0 mb-4 info">
                        <div class="item mb-2">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.83301 7.5L9.99967 10.4167L14.1663 7.5" stroke="#FAA61A"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M1.66699 14.1665V5.83317C1.66699 5.39114 1.84259 4.96722 2.15515 4.65466C2.46771 4.3421 2.89163 4.1665 3.33366 4.1665H16.667C17.109 4.1665 17.5329 4.3421 17.8455 4.65466C18.1581 4.96722 18.3337 5.39114 18.3337 5.83317V14.1665C18.3337 14.6085 18.1581 15.0325 17.8455 15.345C17.5329 15.6576 17.109 15.8332 16.667 15.8332H3.33366C2.89163 15.8332 2.46771 15.6576 2.15515 15.345C1.84259 15.0325 1.66699 14.6085 1.66699 14.1665Z"
                                    stroke="#FAA61A" stroke-width="1.5" />
                            </svg>
                            <a
                                href="mailto:{{ settings()->get('contact_email') }}">{{ settings()->get('contact_email') }}</a>
                        </div>
                        <div class="item">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M15.8337 8.5C15.8337 11.8142 10.0003 17.5 10.0003 17.5C10.0003 17.5 4.16699 11.8142 4.16699 8.5C4.16699 5.18667 6.77866 2.5 10.0003 2.5C13.222 2.5 15.8337 5.18667 15.8337 8.5Z"
                                    stroke="#FAA61A" stroke-width="1.5" />
                                <path
                                    d="M10.0003 9.16667C10.2213 9.16667 10.4333 9.07887 10.5896 8.92259C10.7459 8.76631 10.8337 8.55435 10.8337 8.33333C10.8337 8.11232 10.7459 7.90036 10.5896 7.74408C10.4333 7.5878 10.2213 7.5 10.0003 7.5C9.77931 7.5 9.56735 7.5878 9.41107 7.74408C9.25479 7.90036 9.16699 8.11232 9.16699 8.33333C9.16699 8.55435 9.25479 8.76631 9.41107 8.92259C9.56735 9.07887 9.77931 9.16667 10.0003 9.16667Z"
                                    fill="#FAA61A" stroke="#FAA61A" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            {{ settings()->get('contact_address') }}
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-lg-0 mb-4 social-links-wrapper text-md-center">
                        <h5 class="font-16 text-white fw-600 mb-4" style="color: white !important">Follow us on social
                        </h5>
                        <div class="social-links ">
                            <ul class="justify-content-start justify-content-md-center">
                                <li>
                                    <a href="{{ settings()->get('facebook_link') }}" target="_blank"><svg
                                            width="12" height="20" viewBox="0 0 12 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M7.27484 20V10.8777H10.5777L11.0732 7.32156H7.27484V5.05147C7.27484 4.0222 7.582 3.32076 9.17653 3.32076L11.2069 3.31999V0.13923C10.8558 0.0969453 9.65049 0 8.24767 0C5.31834 0 3.31287 1.65697 3.31287 4.69927V7.32156H0V10.8777H3.31287V20H7.27484Z"
                                                fill="white" />
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ settings()->get('instagram_link') }}" target="_blank"><svg
                                            width="21" height="20" viewBox="0 0 21 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M20.0798 5.88007C20.0331 4.81739 19.8619 4.08681 19.6166 3.45375C19.3636 2.78177 18.9743 2.18015 18.4643 1.68002C17.966 1.17211 17.3626 0.777437 16.7008 0.527448C16.0664 0.281275 15.3423 0.109427 14.2835 0.0625734C13.2167 0.0117516 12.8781 0 10.1726 0C7.4671 0 7.12846 0.0117516 6.0657 0.0586054C5.00689 0.105459 4.27896 0.27746 3.64836 0.52348C2.97868 0.777437 2.37924 1.16814 1.88094 1.68002C1.37487 2.18015 0.98179 2.78574 0.732559 3.44993C0.487283 4.08681 0.31606 4.81342 0.269377 5.8761C0.21874 6.94672 0.207031 7.2866 0.207031 10.002C0.207031 12.7174 0.21874 13.0572 0.265423 14.1239C0.312106 15.1866 0.483481 15.9172 0.728758 16.5502C0.98179 17.2222 1.37487 17.8238 1.88094 18.3239C2.37924 18.8319 2.98263 19.2265 3.6444 19.4765C4.27896 19.7227 5.00293 19.8945 6.06189 19.9414C7.12451 19.9884 7.4633 20 10.1688 20C12.8743 20 13.2129 19.9884 14.2757 19.9414C15.3345 19.8945 16.0624 19.7227 16.693 19.4765C18.0323 18.9569 19.0911 17.8942 19.6088 16.5502C19.854 15.9133 20.0253 15.1866 20.072 14.1239C20.1187 13.0572 20.1304 12.7174 20.1304 10.002C20.1304 7.2866 20.1265 6.94672 20.0798 5.88007ZM18.2853 14.0458C18.2424 15.0225 18.0789 15.55 17.9427 15.9016C17.6079 16.7729 16.9189 17.4644 16.0507 17.8005C15.7004 17.9372 15.171 18.1013 14.2017 18.1442C13.1506 18.1912 12.8354 18.2028 10.1766 18.2028C7.51774 18.2028 7.19856 18.1912 6.15131 18.1442C5.17811 18.1013 4.65258 17.9372 4.30223 17.8005C3.87022 17.6402 3.47698 17.3863 3.1578 17.0542C2.82692 16.7299 2.57388 16.3391 2.41422 15.9056C2.27797 15.5539 2.1145 15.0225 2.07177 14.0497C2.02494 12.9948 2.01338 12.6783 2.01338 10.0098C2.01338 7.34124 2.02494 7.02089 2.07177 5.96996C2.1145 4.99321 2.27797 4.46576 2.41422 4.11413C2.57388 3.68039 2.82692 3.28587 3.16176 2.96537C3.48474 2.63327 3.87402 2.37932 4.30618 2.21922C4.65653 2.08247 5.18602 1.91841 6.15526 1.87537C7.20632 1.82852 7.5217 1.81677 10.1804 1.81677C12.8431 1.81677 13.1583 1.82852 14.2056 1.87537C15.1788 1.91841 15.7043 2.08247 16.0547 2.21922C16.4867 2.37932 16.8799 2.63327 17.1991 2.96537C17.53 3.28968 17.783 3.68039 17.9427 4.11413C18.0789 4.46576 18.2424 4.99702 18.2853 5.96996C18.332 7.02486 18.3437 7.34124 18.3437 10.0098C18.3437 12.6783 18.332 12.9909 18.2853 14.0458Z"
                                                fill="white" fill-opacity="0.5" />
                                            <path
                                                d="M10.1683 5C7.41855 5 5.1875 7.23948 5.1875 10C5.1875 12.7605 7.41855 15 10.1683 15C12.9183 15 15.1492 12.7605 15.1492 10C15.1492 7.23948 12.9183 5 10.1683 5ZM10.1683 13.2434C8.38442 13.2434 6.9374 11.7909 6.9374 10C6.9374 8.20907 8.38442 6.75662 10.1683 6.75662C11.9524 6.75662 13.3993 8.20907 13.3993 10C13.3993 11.7909 11.9524 13.2434 10.1683 13.2434Z"
                                                fill="white" fill-opacity="0.5" />
                                            <path
                                                d="M16.3947 5C16.3947 5.69029 15.8372 6.25 15.1494 6.25C14.4618 6.25 13.9043 5.69029 13.9043 5C13.9043 4.30955 14.4618 3.75 15.1494 3.75C15.8372 3.75 16.3947 4.30955 16.3947 5Z"
                                                fill="white" fill-opacity="0.5" />
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ settings()->get('twitter_link') }}" target="_blank">
                                        <svg width="25" height="20" viewBox="0 0 25 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M24.652 2.36769C23.7401 2.76923 22.7684 3.03538 21.7554 3.16462C22.7975 2.54 23.5929 1.55846 23.9669 0.375385C22.9952 0.956923 21.9224 1.36769 20.7792 1.59692C19.8565 0.610769 18.5416 0 17.1071 0C14.324 0 12.0834 2.26769 12.0834 5.04769C12.0834 5.44769 12.1171 5.83231 12.1998 6.19846C8.02052 5.99385 4.32243 3.98308 1.83814 0.92C1.40442 1.67538 1.15002 2.54 1.15002 3.47077C1.15002 5.21846 2.04657 6.76769 3.38297 7.66462C2.57531 7.64923 1.78297 7.41385 1.1117 7.04308C1.1117 7.05846 1.1117 7.07846 1.1117 7.09846C1.1117 9.55077 2.85423 11.5877 5.13929 12.0569C4.7301 12.1692 4.28412 12.2231 3.82128 12.2231C3.49944 12.2231 3.17454 12.2046 2.86956 12.1369C3.5209 14.1354 5.36918 15.6046 7.56688 15.6523C5.85653 16.9954 3.68489 17.8046 1.33393 17.8046C0.921665 17.8046 0.526262 17.7862 0.130859 17.7354C2.35768 19.1769 4.99676 20 7.84274 20C17.0933 20 22.1508 12.3077 22.1508 5.64C22.1508 5.41692 22.1431 5.20154 22.1324 4.98769C23.1301 4.27692 23.9684 3.38923 24.652 2.36769Z"
                                                fill="white" fill-opacity="0.5" />
                                        </svg>

                                    </a>
                                </li>
                                <li>
                                    <a href="{{ settings()->get('linkedin_link') }}" target="_blank">
                                        <svg width="21" height="20" viewBox="0 0 21 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M19.1388 0H2.08923C1.29562 0 0.652344 0.645752 0.652344 1.44241V18.5576C0.652344 19.3542 1.29562 20 2.08923 20H19.1388C19.9325 20 20.5757 19.3542 20.5757 18.5576V1.44241C20.5757 0.645752 19.9325 0 19.1388 0V0ZM7.71928 15.1172H5.29316V7.79007H7.71928V15.1172ZM6.5063 6.78955H6.49049C5.67636 6.78955 5.14982 6.22696 5.14982 5.52383C5.14982 4.80484 5.69247 4.25781 6.52241 4.25781C7.35235 4.25781 7.86308 4.80484 7.87889 5.52383C7.87889 6.22696 7.35235 6.78955 6.5063 6.78955ZM16.4674 15.1172H14.0416V11.1974C14.0416 10.2122 13.6903 9.54041 12.8125 9.54041C12.1423 9.54041 11.7431 9.99359 11.5677 10.4311C11.5036 10.5876 11.4879 10.8064 11.4879 11.0254V15.1172H9.06193C9.06193 15.1172 9.0937 8.47748 9.06193 7.79007H11.4879V8.82751C11.8103 8.32825 12.3872 7.6181 13.6743 7.6181C15.2705 7.6181 16.4674 8.66531 16.4674 10.9158V15.1172Z"
                                                fill="white" fill-opacity="0.5" />
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 newsletter">
                        <h5 class="font-16 text-white fw-600 mb-4" style="color: white !important">Join a Newsletter
                        </h5>
                        <div class="newsletter-wrapper">

                            <form class="newletterValidate" id="newletter" method="post"
                                action="{{ route('website.subscribe.post') }}">
                                {!! csrf_field() !!}
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="email" name="email" placeholder="email"
                                            class="form-control" required>

                                    </div>
                                </div>

                                <button type="submit">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M3.24062 16.6002L16.9513 10.723C17.5878 10.448 17.5878 9.55233 16.9513 9.27733L3.24062 3.40019C2.72205 3.17233 2.14848 3.55733 2.14848 4.11519L2.14062 7.73733C2.14062 8.13019 2.43134 8.46804 2.8242 8.51519L13.9263 10.0002L2.8242 11.4773C2.43134 11.5323 2.14062 11.8702 2.14062 12.263L2.14848 15.8852C2.14848 16.443 2.72205 16.828 3.24062 16.6002V16.6002Z"
                                            fill="white" />
                                    </svg>
                                    <span class="spinner-border spinner-border-md" style="display:none"
                                        id="ajaxLoader"></span>
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
                <div class="row copyright">
                    <div class="col-md-6 mb-4 mb-md-0">{{ settings()->get('copyright') }}</div>
                    <div class="col-md-6">Website brought in to life by <a href="https://makuracreations.com/"
                            target="_blank">Makura
                            Creations</a></div>
                </div>

            </div>
        </div>

    </footer>
    <a href="javascript:void(0)" id="return-to-top">
        <svg viewBox="0 0 24 24" width="24" height="24" stroke="#fff" stroke-width="2" fill="none"
            stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
            <polyline points="18 15 12 9 6 15"></polyline>
        </svg>
    </a>

    <div class="toaster-wrapper" style="display: none;">
        <div class="close-toaster">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="18"
                height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="#767676" fill="none"
                stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <line x1="18" y1="6" x2="6" y2="18" />
                <line x1="6" y1="6" x2="18" y2="18" />
            </svg>
        </div>
        <div class="icon-div">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="24"
                height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#767676" fill="none"
                stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M5 12l5 5l10 -10" />
            </svg>
        </div>
        <div class="text-content">
            <span id="toastStatus"></span>
            <p id="toastMessage"></p>
        </div>
    </div>

    <div class="toaster-wrapper-error" style="display: none;">
        <div class="close-toaster" id="close-toaster-error">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="18"
                height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="#767676" fill="none"
                stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <line x1="18" y1="6" x2="6" y2="18" />
                <line x1="6" y1="6" x2="18" y2="18" />
            </svg>
        </div>
        <div class="icon-div">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-exclamation"
                width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff2825"
                fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <circle cx="9" cy="7" r="4" />
                <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                <line x1="19" y1="7" x2="19" y2="10" />
                <line x1="19" y1="14" x2="19" y2="14.01" />
            </svg>
        </div>
        <div class="text-content">
            <span id="errorToastStatus"></span>
            <p id="errorToastMessage"></p>
        </div>
    </div>

    <!-- scripts -->
    <script>
        function addLoadEvent(o) {
            var n = window.onload;
            "function" != typeof window.onload ? window.onload = o : window.onload = function() {
                n && n(), o()
            }
        }
    </script>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- jquery-validate -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"
        integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
    </script>
    {{-- <script  src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
    </script> --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@1.6.11/dist/js/lightgallery-all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mb.YTPlayer/3.3.9/jquery.mb.YTPlayer.min.js"
        integrity="sha512-rVFx7vXgVV8cmgG7RsZNQ68CNBZ7GL3xTYl6GAVgl3iQiSwtuDjTeE1GESgPSCwkEn/ijFJyslZ1uzbN3smwYg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- DropZone -->
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <!-- magnific-popup -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"
        integrity="sha512-IsNh5E3eYy3tr/JiX2Yx4vsCujtkhwl7SLqgnwLNgf04Hrt9BT9SXlLlZlWx+OK4ndzAoALhsMNcCmkggjZB1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"
        integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/wnumb/1.2.0/wNumb.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"
        integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        var customer_id = "{{ optional(auth()->user())->id }}";
    </script>
    <script src="{{ asset('website/assets/js/style.js') }}"></script>
    <script src="{{ asset('website/assets/js/wishlist.js') }}"></script>

    @yield('js')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    @if (session('alert-type') == 'success')
        <script>
            $('#toastMessage').text("{{ session('message') }}");
            $('#toastStatus').text("{{ session('alert-type') }}");
            $('.toaster-wrapper').show();
        </script>
    @endif

    @if (session('alert-type') == 'error')
        <script>
            $('#errorToastMessage').text("{{ session('message') }}");
            $('#errorToastStatus').text("{{ session('alert-type') }}");
            $('.toaster-wrapper-error').show();
        </script>
    @endif
    <script>
        $('#newletter').submit(function(e) {
            e.preventDefault();
            $(".newletterValidate").validate({});
            $.post($(this).attr('action'), $(this).serialize(), function(data) {
                if (data.alert_type == 'error') {
                    $('#errorToastMessage').text(data.message);
                    $('#errorToastStatus').text("Error");
                    $('.toaster-wrapper-error').show();

                } else {
                    $('#toastMessage').text(data.message);
                    $('#toastStatus').text("Success");
                    $('.toaster-wrapper').show();
                }
            }).fail(function(err) {
                $('#errorToastMessage').text(err.responseJSON.errors.email[0])
                $('#errorToastStatus').text("Error")
                $('.toaster-wrapper-error').show();
            })
        });
    </script>
    <script>
        $(document).ready(function() {

            if ("session('check-wishlist')") {
                var fav_trips = $.cookie('fav_trips');
                fav_trips = fav_trips ? JSON.parse(fav_trips) : [];
                var url = "{{ route('website.trips.favourite.store') }}";
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })

            }
        });
    </script>
    <script>
        jQuery(function() {
            $(document).ready(function() {

                $("#ajaxLoader").hide();
                $("#newletter").validate();
                $("#newletter").css("opacity", "1");
                $("#newletter").submit(function(e) {
                    e.preventDefault();




                    if ($(this).valid()) {
                        //  alert('here');
                        //  return false;

                        $("#ajaxLoader").show();

                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                            }
                        })
                        $.ajax({
                            url: "{{ route('website.subscribe.post') }}",
                            data: $(this).serialize(),
                            method: 'POST',
                            dataType: 'text',
                            success: function(response) {
                                $('#newletter').trigger('reset');
                                $("#ajaxLoader").hide();
                                $('#quotemsg5').html(
                                    "<span style='color:#009ad1;'>Thank you for subscribing to our newsletter</span>"
                                );

                            },
                            error: function(response) {


                                $("#ajaxLoader").hide();
                                $("#newletter").css("opacity", "1");
                                $("#btnSubmit").removeAttr('disabled');
                                $('#quotemsg4').html(
                                    "<span style='color:red;'>Something Went Wrong!!</span>"
                                );


                            },
                        });
                        return false;
                    } else {
                        return false;
                    }


                });
                return false;

            });





        });
    </script>
    {{-- <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5bf139136fb45184"></script> --}}
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M8TPLZN" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
</body>

</html>
