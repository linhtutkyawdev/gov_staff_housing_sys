<section id="status" class="pt-20 video-counter">
    <div class="container">
        <div class="row">
            <div class="w-full lg:w-1/2">
                <div class="pr-0 mt-12 counter-wrapper lg:pr-16 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                    <div class="counter-content">
                        <div class="mb-8 section-title">
                            <div class="line"></div>
                            <h3 class="title">{{ __('messages.STATUS.title') }} <span> {{ __('messages.STATUS.sub-title') }} </span></h3>
                        </div> <!-- section title -->
                        <p class="text">{{ __('messages.STATUS.desc') }} </p>
                    </div> <!-- counter content -->
                    <div class="row no-gutters">
                        <livewire:welcome.filled_info_count_button />
                        
                    </div> <!-- row -->
                </div> <!-- counter wrapper -->
            </div>
            <div class="w-full lg:w-1/2">
                <div class="relative pb-8 mt-12 video-content wow fadeIn" data-wow-duration="1s" data-wow-delay="0.8s">
                    <img class="absolute bottom-0 right-0 -ml-8 dots" src="assets/images/dots.svg" alt="dots">
                    <div class="relative mr-6 rounded-lg shadow-md video-wrapper">
                        <div class="video-image">
                            <img src="assets/images/video.png" alt="video">
                        </div>
                    </div> <!-- video wrapper -->
                </div> <!-- video content -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>
