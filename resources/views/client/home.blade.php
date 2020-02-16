@extends('client.layouts.layout')
    
    @section('content')

        <div class="preloader">

            <div class="spinner">
            
                <div class="bounce1"></div>
            
                <div class="bounce2"></div>
            
                <div class="bounce3"></div>
            
            </div>

        </div>

        <!-- Document Wrapper
    	============================================= -->
        <div id="wrapper" class="wrapper clearfix">

            <header id="navbar-spy" class="header header-topbar header-transparent header-fixed">
    	
                <!-- TOP -->
                @include('client.layouts.top')    
                <!--------->

    	        <!-- NAV -->
                @include('client.layouts.nav')    
                <!--------->

            </header>

            <!-- SLIDER -->
            @include('client.layouts.slider')    
            <!------------->

            <!-- SERVICE -->
            @include('client.layouts.service')    
            <!------------->

            <!-- TREATMENT -->
            @include('client.layouts.treatment')    
            <!------------->

            <!-- TEAM -->
            @include('client.layouts.team')    
            <!------------->

            <!-- TESTIMONIAL -->
            @include('client.layouts.testimonial')    
            <!------------->

            <!-- PRODUCT -->
            @include('client.layouts.product')    
            <!------------->

            @if(config('reservation_mode.rsv_mode_active') == 1)

                <!-- RESERVATION -->
                @include('client.layouts.reservation')    
                <!------------->

            @endif

            <!-- FOOTER -->
            @include('client.layouts.footer')    
            <!------------->

        </div>
        <!-- #wrapper end -->

    @endsection