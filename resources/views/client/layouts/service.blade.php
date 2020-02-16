<!-- Services #2
============================================= -->
<section id="service2" class="services services-2 text-center">

    <div class="container">

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">

                <div class="heading text--center mb-70">

                    <h2 class="heading--title">{{ $service_header->serv_hd_title }}</h2>

                    <p class="heading--desc">{!! $service_header->serv_hd_caption !!}</p>

                    <div class="divider--line"></div>

                </div>

            </div>
            <!-- .col-md-6 end -->
            
        </div>
        <!-- .row end -->

        <div class="row">

            @foreach($services as $service)

                <!-- Service #2 -->
                <div class="col-xs-12 col-sm-4 col-md-4 mt-1 mb-1">

                    <div class="service-panel">

                        <div class="service--img">

                            <img src="{{ asset('public/assets/uploads/'.$service->serv_image) }}" alt="{{ $service->serv_name }}">
                        
                        </div>

                        <h3>{{ $service->serv_name }}</h3>

                        <p>{!! Str::limit($service->serv_desc, 100, ' ...') !!}</p>

                        <a class="btn btn--primary btn--rounded mt-1" href="{{ URL::to('services') }}">read more</a>

                    </div>
                    <!-- .container end -->

                </div>
                <!-- .col-md-4 end -->

            @endforeach

        </div>
        <!-- .row end -->

        {{-- <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12 clearfix mt-70 text--center">
                
                <a href="#" class="btn btn--secondary btn--bordered btn--rounded">View More</a>
            
            </div>
            <!-- .col-md-12 end -->
        
        </div>
        <!-- .row end --> --}}

    </div>
    <!-- .container end -->

</section>
<!-- #service1 end -->