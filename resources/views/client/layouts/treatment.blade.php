<!-- pricing #2
============================================= -->
<section id="pricing2" class="pricing pricing-2 bg-overlay bg-overlay-dark bg-parallax">
    
    <div class="bg-section">

        <img src="{{ asset('public/assets/uploads/'.$treatment_header->treat_hd_image) }}" alt="{{ $treatment_header->treat_hd_title }}">
    
    </div>

    <div class="container">

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">

                <div class="heading text--center mb-70">

                    <h2 class="heading--title text-white">{{ $treatment_header->treat_hd_title }}</h2>

                    <p class="heading--desc text-white">{!! $treatment_header->treat_hd_caption !!}</p>

                    <div class="divider--line"></div>

                </div>

            </div>
            <!-- .col-md-6 end -->
        
        </div>
        <!-- .row end -->

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">

                <div class="row panel-wrapper">

                    @foreach($treatments as $treatment)

                        <div class="col-xs-12 col-sm-6 col-md-12">

                            <div class="pricing-panel">

                                <div class="pricing--content">

                                    <h4 class="pricing--heading">{{ $treatment->treat_name }}</h4>

                                    <div class="pricing--divider"></div>

                                    <span class="price">@rupiah($treatment->treat_price)</span>

                                </div>

                                <p class="text-danger">{{ $treatment->treatmentType->treat_type_name }}</p>

                                <p class="pricing--desc">
                                    
                                    {!! $treatment->treat_desc !!}

                                </p>

                            </div>
                            <!-- .panel end -->

                        </div>
                        <!-- .col-md-12 end -->   

                    @endforeach    

                     <div class="col-xs-12 col-sm-12 col-md-2">

                        <a class="btn btn--primary btn--bordered btn--rounded" href="{{ URL::to('treatments') }}">See All Treatments</a>
                    
                    </div>    
                    
                </div>
                <!-- .row end -->

            </div>
            <!-- .col-md-8 end -->

        </div>
        <!-- .row end -->

    </div>
    <!-- .container end -->

</section>
<!-- #pricing1 end -->