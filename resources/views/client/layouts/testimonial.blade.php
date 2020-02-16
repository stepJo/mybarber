<!-- Testimonial #2
============================================= -->
<section id="testimonial2" class="testimonial testimonial-1 bg-overlay bg-overlay-dark bg-parallax text-center">

    <div class="bg-section">

        <img src="{{ asset('public/assets/uploads/'.$testimonial_header->test_hd_image) }}" alt="Background" />
    </div>

    <div class="container">

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">

                <div class="text--center heading mb-70">

                    <h2 class="heading--title color-white">{{ $testimonial_header->test_hd_title }}</h2>

                    <p class="heading--desc mb-0 color-gray">
                        
                        {!! $testimonial_header->test_hd_caption !!}

                    </p>

                    <div class="divider--line divider--center"></div>

                </div>

            </div>
            <!-- .col-md-8 end -->

        </div>
        <!-- .row end -->

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div id="testimonial-carousel" class="carousel carousel-dots carousel-white" data-slide="3" data-slide-rs="1" data-autoplay="false" data-nav="false" data-dots="true" data-space="30" data-loop="true" data-speed="800">

                    @foreach($testimonials as $testimonial)
                    
                        <div class="testimonial-panel">

                            <div class="testimonial--meta">

                                <div class="testimonial--meta-img">

                                    <img src="{{ asset('public/assets/uploads/'.$testimonial->test_image) }}" alt="{{ $testimonial->test_name }}">

                                </div>

                            </div>

                            <!-- .testimonial-meta end -->
                            <div class="testimonial--body">

                                <p>"{{ $testimonial->test_caption }}"</p>

                            </div>
                            <!-- .testimonial-body end -->

                            <div class="testimonial--meta-content">

                                <h4>{{ $testimonial->test_name }}</h4>

                            </div>

                        </div>
                        <!-- .testimonial-panel end -->

                    @endforeach

                </div>

            </div>
            <!-- .col-md-12 end -->

        </div>
        <!-- .row end -->

    </div>
    <!-- .container end -->

</section>
<!-- #testimonial2 end -->