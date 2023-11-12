<?php

use App\Models\Info;
use Livewire\Volt\Component;

new class extends Component {
    public $nric,
        $row,
        $not_found = false;

    public function checkStatus()
    {
        $validatedData = $this->validate([
            'nric' => 'required|string',
        ]);
        $this->row = Info::where('nric', $validatedData['nric'])->first();
        if (!$this->row) {
            $this->not_found = true;
        } else {
            $this->not_found = false;
        }
    }
}; ?>

<footer id="footer" class="relative z-10 footer-area pt-120">
    <div class="footer-bg" style="background-image: url(assets/images/footer-bg.svg);"></div>
    <div class="container">
        <div id="status-check"
            class="px-6 pt-10 pb-20 mb-12 bg-white rounded-lg shadow-xl md:px-12 subscribe-area wow fadeIn"
            data-wow-duration="1s" data-wow-delay="0.5s">
            <div class="row">
                <div class="w-full lg:w-1/2">
                    <div class="lg:mt-12 subscribe-content mx-2">
                        <h2 class="text-2xl font-bold sm:text-4xl subscribe-title">
                            {{ $not_found ? __('messages.FOOTER.prompt_not_found') : ($row ? __('messages.FOOTER.prompt_found') . $row->full_name : __('messages.FOOTER.prompt')) }}
                            <span
                                class="block sm:text-2xl font-normal mt-4">{{ $row ? ($row->verified ? __('messages.FOOTER.sub_prompt_found_valid') : __('messages.FOOTER.sub_prompt_found_pending')) : __('messages.FOOTER.sub_prompt') }}</span>
                        </h2>
                    </div>
                </div>
                <div class="w-full lg:w-1/2">
                    <div class="mt-12 subscribe-form">
                        <form class="relative focus:outline-none" wire:submit="checkStatus">
                            @csrf
                            <input type="type" name="nric" autocomplete="nric" placeholder="Enter your NRIC"
                                wire:model="nric"
                                class="w-full py-4 pl-6 pr-40 duration-300 border-2 rounded focus:border-theme-color focus:outline-none">
                            <button type="submit"
                                class="main-btn gradient-btn">{{ __('messages.FOOTER.submit') }}</button>
                        </form>
                        @error('nric')
                            <p class="text-red-500 text-sm italic">
                                {{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- subscribe area -->
        {{-- <div class="footer-widget pb-120">
            <div class="row">
                <div class="w-4/5 md:w-3/5 lg:w-2/6">
                    <div class="mt-12 footer-about wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                        <a class="inline-block mb-8 logo" href="/">
                            <img src="assets/images/logo.svg" alt="logo" class="w-40">
                        </a>
                        <p class="pb-10 pr-10 leading-snug text-white">{{ __('messages.DESCRIPTION') }}</p>
                        <ul class="flex footer-social">
                            <li><a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="lni lni-twitter-filled"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="lni lni-instagram-filled"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="lni lni-linkedin-original"></i></a>
                            </li>
                        </ul>
                    </div> <!-- footer about -->
                </div>
                <div class="w-4/5 sm:w-2/3 md:w-3/5 lg:w-2/6">
                    <div class="row">
                        <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/2">
                            <div class="mt-12 link-wrapper wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s">
                                <div class="footer-title">
                                    <h4 class="mb-8 text-2xl font-bold text-white">Quick Link</h4>
                                </div>
                                <ul class="link">
                                    <li><a href="javascript:void(0)">Road Map</a></li>
                                    <li><a href="javascript:void(0)">Privacy Policy</a></li>
                                    <li><a href="javascript:void(0)">Refund Policy</a></li>
                                    <li><a href="javascript:void(0)">Terms of Service</a></li>
                                    <li><a href="javascript:void(0)">Pricing</a></li>
                                </ul>
                            </div> <!-- footer wrapper -->
                        </div>
                        <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/2">
                            <div class="mt-12 link-wrapper wow fadeIn" data-wow-duration="1s" data-wow-delay="0.6s">
                                <div class="footer-title">
                                    <h4 class="mb-8 text-2xl font-bold text-white">Resources</h4>
                                </div>
                                <ul class="link">
                                    <li><a href="javascript:void(0)">Home</a></li>
                                    <li><a href="javascript:void(0)">Page</a></li>
                                    <li><a href="javascript:void(0)">Portfolio</a></li>
                                    <li><a href="javascript:void(0)">Blog</a></li>
                                    <li><a href="javascript:void(0)">Contact</a></li>
                                </ul>
                            </div> <!-- footer wrapper -->
                        </div>
                    </div>
                </div>
                <div class="w-4/5 sm:w-1/3 md:w-2/5 lg:w-2/6">
                    <div class="mt-12 footer-contact wow fadeIn" data-wow-duration="1s" data-wow-delay="0.8s">
                        <div class="footer-title">
                            <h4 class="mb-8 text-2xl font-bold text-white">Contact Us</h4>
                        </div>
                        <ul class="contact">
                            <li>+809272561823</li>
                            <li>info@gmail.com</li>
                            <li>www.yourweb.com</li>
                            <li>123 Stree New York City , United <br> States Of America 750.</li>
                        </ul>
                    </div> <!-- footer contact -->
                </div>
            </div> <!-- row -->
        </div> <!-- footer widget --> --}}
        <div class="py-8 border-t border-gray-200 footer-copyright">
            <p class="text-white">
                All rights served by <a class="duration-300 hover:text-green-300 cursor-pointer" rel="nofollow"
                    target="_blank">GSHS</a>
            </p>
        </div> <!-- footer copyright -->
    </div> <!-- container -->
    <div id="particles-2" class="particles"></div>
</footer>
