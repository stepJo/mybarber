<nav id="primary-menu" class="navbar navbar-fixed-top">
  
    <div class="container">
	   
        <div class="">
	        
            <!-- Brand and toggle get grouped for better mobile display -->
	        <div class="navbar-header">
		
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
		
                    <span class="sr-only">Toggle navigation</span>
		
                    <span class="icon-bar"></span>
		
                    <span class="icon-bar"></span>
		
                    <span class="icon-bar"></span>
		        
                </button>
		        
                <a class="logo" href="{{ URL::to('/') }}">
			
                    <img src="{{ asset('public/assets/uploads/'.$setting->set_web_logo) }}" alt="{{ $setting->set_web_title }}" width="60">
	
                </a>
	        
            </div>
	
	        <!-- Collect the nav links, forms, and other content for toggling -->
	        <div class="collapse navbar-collapse pull-right" id="navbar-collapse-1">
		
                <ul class="nav navbar-nav nav-pos-right nav-bordered-right snavbar-left">
		
                    <!-- Home Menu -->
                    <li class="has-dropdown active">
                    
                        <a href="{{ URL::to('/') }}" class="menu-item">home</a>
                    
                    </li>
                    <!-- li end -->

                    <!-- Service Menu -->
                    <li class="has-dropdown active">
                    
                        <a href="{{ URL::to('/services') }}" class="menu-item">services</a>
                    
                    </li>
                    <!-- li end -->

                    <!-- Treatment Menu -->
                    <li class="has-dropdown active">
                    
                        <a href="{{ URL::to('/treatments') }}" class="menu-item">treatments</a>
                    
                    </li>
                    <!-- li end -->

                    <!-- Product Menu -->
                    <li class="has-dropdown active">
                    
                        <a href="{{ URL::to('/products') }}" class="menu-item">products</a>
                    
                    </li>
                    <!-- li end -->

                    <!-- Blog Menu -->
                    <li class="has-dropdown active">
                    
                        <a href="{{ URL::to('/blogs') }}" class="menu-item">blogs</a>
                    
                    </li>
                    <!-- li end -->

                    <!-- Blog Menu -->
                    <li class="has-dropdown active">
                    
                        <a href="{{ URL::to('/gallery') }}" class="menu-item">gallery</a>
                    
                    </li>
                    <!-- li end -->

        		</ul>
        		<!-- Module Cart -->

                {{-- <div class="module module-cart pull-left">
                    
                    <div class="module-icon cart-icon">
                        
                        <i class="lnr lnr-store"></i>
                        
                        <span class="title">shop cart</span>
                        
                        <label class="module-label">2</label>
                    
                    </div>
                
                    <div class="module-content module-box cart-box">

                        <div class="cart-overview">
        
                            <ul class="list-unstyled">

                                <li>
                                
                                    <a href="#">
                        		
                                		<img class="img-responsive" src="{{ asset('public/assets/client/images/shop/thumb/1.jpg') }}" alt="product" />
                        		
                                	</a>
                                
                                    <div class="product-meta">
                                        
                                        <h5 class="product-title"><a href="#">Gel Cream</a></h5>
                                        
                                        <p class="product-price">1 × $7.50</p>
                                    
                                    </div>
                                    
                                    <a class="cart-cancel" href="#">cancel</a>
                                
                                </li>
            
                            </ul>

                        </div>

                        <div class="cart-total">

                            <div class="total-desc">
                            
                                Subtotal:
                            
                            </div>
                            
                            <div class="total-price">
                            
                                $100.50
                            
                            </div>
                        
                        </div>

                        <div class="clearfix"></div>

                        <div class="cart--control">

                            <a class="btn btn--primary btn--bordered btn--rounded btn--block" href="#">View Cart & Checkout</a>

                        </div>
                
                    </div>
                
                </div>
                <!-- .module-cart end --> --}}
		
                {{-- <!-- Module Search -->
                <div class="module module-search pull-left">
                    
                    <div class="module-icon search-icon">

                        <i class="lnr lnr-magnifier"></i>
                    
                        <span class="title">search</span>
                    
                    </div>
                
                    <div class="module-content module-fullscreen module--search-box">
                        
                        <div class="pos-vertical-center">
                        
                            <div class="container">
                        
                                <div class="row">
                        
                                    <div class="col-xs-12 col-sm-12 col-md-8 
                                    col-md-offset-2">
                                    
                                        <form class="form-search">
                                    
                                            <input type="text" class="form-control" 
                                            placeholder="Search..">
                                            
                                            <button class="btn" type="button"><i class="lnr lnr-magnifier"></i></button>

                                        </form>
                                        <!-- .form-search end -->

                                    </div>
                                    <!-- .col-md-8 end -->

                                </div>
                                <!-- .row end -->

                            </div>
                            <!-- .container end -->

                        </div>

                        <a class="module-cancel" href="#"><i class="lnr lnr-cross"></i></a>

                    </div>
            
                </div>
                <!-- .module-search end --> --}}  

                <!-- Module Cart -->
                @if(config('reservation_mode.rsv_mode_active') == 1)
    		    
                    <div class="module module-cart pull-left">
        			    
                        <div class="module-icon">
        				
                        <a class="btn btn--white btn--bordered btn--rounded" href="{{ URL::to('reservation') }}">Reserve Online</a>

        			    </div>

            		</div>

                @endif
        		<!-- .module-cart end -->

        	</div>
        	<!-- /.navbar-collapse -->
	
        </div>
    
    </div>
    <!-- /.container-fluid -->

</nav>
