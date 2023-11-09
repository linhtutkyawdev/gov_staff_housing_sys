<section id="status" class="pt-20 video-counter">
    <div class="container">
        <div class="row">
            <div class="w-full lg:w-1/2">
                <div class="pr-0 mt-12 counter-wrapper lg:pr-16 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                    <div class="counter-content">
                        <div class="mb-8 section-title">
                            <div class="line"></div>
                            <h3 class="title">Check Status <span> of your application. </span></h3>
                        </div> <!-- section title -->
                        <p class="text">Stay informed about the progress of your housing application. You can
                            easily
                            track the status of your application, whether it's pending, approved, or rejected. </p>
                    </div> <!-- counter content -->
                    <div class="row no-gutters">
                        <livewire:welcome.download_count_button />
                        <livewire:welcome.filled_info_count_button />
                        {{-- <button class="flex items-center justify-center single-counter counter-color-2">
                            <div class="text-center counter-items">
                                <span class="text-2xl font-bold text-white"><span class="counter">87</span></span>
                                <p class="text-white">Filled Info</p>
                            </div>
                        </button> <!-- single counter --> --}}
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
                        <div
                            class="absolute top-0 left-0 flex items-center justify-center w-full h-full bg-blue-900 bg-opacity-25 rounded-lg video-icon">
                            <a href="/status" class="video-popup"><i class="lni lni-play"></i></a>
                        </div>
                    </div> <!-- video wrapper -->
                </div> <!-- video content -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>
