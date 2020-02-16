<div id="top-bar" class="top-bar">

    <div class="container">

        <div class="bottom-bar-border">

            <div class="row">

	            <div class="col-xs-12 col-sm-6 col-md-6 top--contact hidden-xs">
		
                    <ul class="list-inline mb-0 ">
			          
                        <li>
				
                            <i class="lnr lnr-phone-handset"></i>

                            <span> {{ $profile->profile_phone }}</span>
			              
                        </li>
		           
                    </ul>
	
                </div><!-- .col-md-6 end -->

                <div class="col-xs-12 col-sm-6 col-md-6 top--info text-right text-center-xs">

			        <span class="top--social">
				
                        <a class="facebook" href="{{ $links->facebook }}" target="_blank"><i class="fab fa-facebook"></i></a>
				
                        <a class="instagram" href="{{ $links->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a>
				
                        <a class="twitter" href="{{ $links->twitter }}" target="_blank"><i class="fa fab fa-twitter"></i></a>
			       
                    </span>
		        
                </div><!-- .col-md-6 end -->
        
            </div>

        </div>

    </div>

</div>