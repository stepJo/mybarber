<!-- Slider #2
============================================= -->
<section id="slider2" class="carousel slider slider-2 slider-navs" data-slide="1" data-slide-rs="1" data-autoplay="true" data-nav="true" data-dots="true" data-space="0" data-loop="true" data-speed="800">

    @foreach($sliders as $slider)
    
        <div class="slide--item bg-overlay bg-overlay-dark">
        
            <div class="bg-section">
                
                <img src="{{ asset('public/assets/uploads/'.$slider->slider_image) }}" alt="{{ $slider->slider_title }}">
        
            </div>
            
            <div class="pos-vertical-center">
                
                <div class="container">
                    
                    <div class="row">
                        
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            
                            <div class="slide--headline">{{ $slider->slider_title }}</div>
                        
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-6">
                        
                            <div class="slide--bio">
                                
                                {{ $slider->slider_caption }}

                            </div>
                        
                            {{-- <div class="slide-action">
                                
                                <a class="btn btn--secondary btn--white  btn--rounded mr-10" href="#">Read More </a>

                                <a class="btn btn--white btn--bordered  btn--rounded" href="#">Get Started</a>

                            </div> --}}

                        </div>

                    </div>
                    <!-- .row end -->

                </div>
                <!-- .container end -->

            </div>

        </div>
        <!-- .slide-item end -->

    @endforeach

</section>
<!-- #slider end