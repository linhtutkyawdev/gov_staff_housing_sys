<header class="header-area">
    <div class="navbar-area">
        <div class="container relative">
            <div class="row">
                <div class="w-full">
                    <nav class="flex items-center justify-between navbar navbar-expand-lg">
                        <a class="my-2 navbar-brand flex items-center" href="/">
                            <img class="w-12 h-12 mr-4" src={{ __('messages.LOGO_URL') }} alt="Logo">
                            <div class="text-white text-4xl font-mono font-bold">
                                {{ __('messages.TITLE_SHORT') }}
                            </div>
                        </a>
                        <button class="block navbar-toggler focus:outline-none lg:hidden" type="button"
                            data-toggle="collapse" data-target="#navbarOne" aria-controls="navbarOne"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>

                        <div class="absolute hide-to-top top-12 duration-200 collapse left-0 z-20 w-full px-5 py-3 bg-white shadow lg:w-auto navbar-collapse lg:block mt-full lg:static lg:bg-transparent lg:shadow-none lg:visible lg:translate-y-0"
                            id="navbarOne">
                            <ul id="nav"
                                class="items-center content-start mr-auto lg:justify-end navbar-nav lg:flex">

                                @forelse (__('messages.NAV_LINKS') as $link)
                                    @if ($loop->first)
                                        <li class="nav-item active">
                                            <a class="page-scroll"
                                                href="#{{ strtolower($link) }}">{{ $link }}</a>
                                        </li>
                                        @continue
                                    @endif

                                    <li class="nav-item">
                                        <a class="page-scroll" href="#{{ strtolower($link) }}">{{ $link }}</a>
                                    </li>
                                @empty
                                    <li class="nav-item active">
                                        <a class="page-scroll" href="#">No Link</a>
                                    </li>
                                @endforelse

                            </ul>
                        </div> <!-- navbar collapse -->

                        <div
                            class="absolute right-0 hidden mt-2 mr-24 navbar-btn navbar-nav sm:inline-block lg:mt-0 lg:static lg:mr-0">
                            <div class="flex">
                                <div class="items-center space-x-4 nav-item">
                                    @foreach (config('languages') as $key => $language)
                                        @if ($key === app()->getLocale())
                                            @continue
                                        @endif
                                        <a
                                            href="{{ route('change-locale', ['locale' => $key]) }}">{{ strtoUpper($key) }}</a>
                                    @endforeach
                                </div>
                                {{-- <a href={{ route('change-locale', ['locale' => locale]) }}>{{ strtoupper(locale) }}</a> --}}
                                <a class="main-btn gradient-btn text-white" data-scroll-nav="0"
                                    href="{{ route('download') }}" rel="nofollow">{{ __('messages.CTA_TEXT') }}</a>
                            </div>
                        </div>
                    </nav> <!-- navbar -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- navbar area -->

    <div id="home" class="header-hero" style="background-image: url(assets/images/banner-bg.svg)">
        <div class="container">
            <div class="justify-center row">
                <div class="w-full lg:w-2/3">
                    <div class="pt-32 mb-12 text-center lg:pt-48 header-hero-content">
                        <h3 class="text-4xl font-light leading-tight text-white header-sub-title wow fadeInUp"
                            data-wow-duration="1.3s" data-wow-delay="0.2s">{{ __('messages.TITLE_SHORT') }} -
                            {{ __('messages.TITLE') }}</h3>
                        <h2 class="mb-3 text-4xl font-bold text-white header-title wow fadeInUp"
                            data-wow-duration="1.3s" data-wow-delay="0.5s">{{ __('messages.QUOTE') }}</h2>
                        <p class="mb-8 text-white text wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.8s">
                            {{ __('messages.DESCRIPTION') }}
                        </p>
                        <a href="#guide" class="page-scroll main-btn gradient-btn gradient-btn-2 wow fadeInUp"
                            data-wow-duration="1.3s" data-wow-delay="1.1s">{{ __('messages.CTA_TEXT_2') }}</a>
                    </div> <!-- header hero content -->
                </div>
            </div> <!-- row -->
            <div class="justify-center row">
                <div class="w-full lg:w-2/3">
                    <div class="text-center header-hero-image wow fadeIn" data-wow-duration="1.3s"
                        data-wow-delay="1.4s">
                        <img src="assets/images/header-hero.png" alt="hero">
                    </div> <!-- header hero image -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
        <div id="particles-1" class="particles"></div>
    </div> <!-- header hero -->
</header>
