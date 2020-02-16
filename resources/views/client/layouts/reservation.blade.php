<section id="booking" class="booking booking-2 bg-overlay bg-overlay-dark bg-parallax text-center">
    
    <div class="bg-section">
    
        <img src="{{ asset('public/assets/uploads/'.$reservation_header->rsv_hd_image) }}" alt="{{ $reservation_header->rsv_hd_title }}" />
    
    </div>
    
    <div class="container">
        
        <div class="row clearfix">
            
            <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
                
                <div class="heading heading-2 mb-80 text--center">
                    
                    <h2 class="heading--title text-white">{{ $reservation_header->rsv_hd_title }}</h2>
                    
                    <p class="heading--desc text-white">{!! $reservation_header->rsv_hd_caption !!}</p>

                    <div class="divider--line"></div>

                </div>

            </div>
            <!-- .col-md-6 end -->

        </div>
        <!-- .row end -->
        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-4 col-md-offset-4">

                <a class="btn btn--primary btn--rounded btn--block" href="{{ URL::to('reservation') }}">Reserver Now</a>

            </div>
            <!-- .col-md-8 end -->

        </div>
        <!-- .row end -->

    </div>
    <!-- .container end -->

</section>
<!-- #booking end -->