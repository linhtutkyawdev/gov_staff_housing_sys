<section id="guide" class="relative pt-20 about-area">
    <div class="container">
        <div class="row">
            <div class="w-full lg:w-1/2">
                <div class="mx-4 mt-12 about-content wow fadeInLeftBig" data-wow-duration="1s" data-wow-delay="0.5s">
                    <div class="mb-4 section-title">
                        <div class="line"></div>
                        <h3 class="title">{{ __('messages.GUIDE')[0]['title'] }} <span>
                                {{ __('messages.GUIDE')[0]['sub-title'] }}</span></h3>
                    </div> <!-- section title -->
                    <p class="mb-8">{{ __('messages.GUIDE')[0]['desc'] }}</p>
                    <a href="{{ route('download') }}"
                        class="main-btn gradient-btn">{{ __('messages.GUIDE')[0]['cta'] }}</a>
                </div> <!-- about content -->
            </div>
            <div class="w-full lg:w-1/2">
                <div class="mx-4 mt-12 text-center about-image wow fadeInRightBig" data-wow-duration="1s"
                    data-wow-delay="0.5s">
                    <img src="assets/images/about1.svg" alt="about">
                </div> <!-- about image -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
    <div class="about-shape-1">
        <img src="assets/images/about-shape-1.svg" alt="shape">
    </div>
</section>


<section class="relative pt-20 about-area">
    <div class="about-shape-2">
        <img src="assets/images/about-shape-2.svg" alt="shape">
    </div>
    <div class="container">
        <div class="row">
            <div class="w-full lg:w-1/2 lg:order-last">
                <div class="mx-4 mt-12 about-content wow fadeInLeftBig" data-wow-duration="1s" data-wow-delay="0.5s">
                    <div class="mb-4 section-title">
                        <div class="line"></div>
                        <h3 class="title">{{ __('messages.GUIDE')[1]['title'] }}<span>
                                {{ __('messages.GUIDE')[1]['sub-title'] }}</span></h3>
                    </div> <!-- section title -->
                    <p class="mb-8">{{ __('messages.GUIDE')[1]['desc'] }}</p>
                    <a href="javascript:void(0)"
                        class="main-btn gradient-btn gradient-btn-2">{{ __('messages.GUIDE')[1]['cta'] }}</a>
                </div> <!-- about content -->
            </div>
            <div class="w-full lg:w-1/2 lg:order-first">
                <div class="mx-4 mt-12 text-center about-image wow fadeInRightBig" data-wow-duration="1s"
                    data-wow-delay="0.5s">
                    <img src="assets/images/about2.svg" alt="about">
                </div> <!-- about image -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>
