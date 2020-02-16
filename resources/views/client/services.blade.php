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

            <section id="page-title" class="page-title bg-overlay bg-overlay-dark bg-parallax">
                <div class="bg-section">

                    <img src="{{ asset('public/assets/uploads/'.$service_header->serv_hd_image) }}" alt="{{ $service_header->serv_hd_title }}" />

                </div>

                <div class="container">

                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12">

                            <div class="title title-1 text-center">

                                <div class="title--heading">

                                    <h1>{{ $service_header->serv_hd_title }}</h1>

                                </div>

                                <div class="clearfix"></div>

                                <ol class="breadcrumb">

                                    <li><a href="{{ URL::to('/') }}">Home</a></li>

                                    <li class="active">Services</li>

                                </ol>

                            </div>
                            <!-- .title end -->

                        </div>
                        <!-- .col-md-12 end -->

                    </div>
                    <!-- .row end -->

                </div>
                <!-- .container end -->

            </section>
            <!-- #page-title end -->

            <section id="service1" class="services services-1 text-center">

                <div class="container">

                    <div class="row clearfix">

                        <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">

                            <div class="heading text--center mb-70">

                                <h2 class="heading--title">{{ $service_header->serv_hd_title }}</h2>

                                <div class="divider--line"></div>

                                <p class="heading--desc">{{ $service_header->serv_hd_caption }}</p>

                            </div>

                        </div>
                        <!-- .col-md-6 end -->

                    </div>
                    <!-- .row end -->

                    <div class="row">

                        @foreach($services as $service)

                            <!-- Service #1 -->
                            <div class="col-xs-12 col-sm-4 col-md-4">

                                <div class="service-panel">

                                    <div class="service--img">

                                        <img src="{{ asset('public/assets/uploads/'.$service->serv_image) }}" alt="img">

                                    </div>

                                    <h3>{{ $service->serv_name }}</h3>

                                    <p>{!! $service->serv_desc !!}</p>

                                    <br/><br/>

                                </div>
                                <!-- .container end -->

                            </div>
                            <!-- .col-md-4 end -->

                        @endforeach

                    </div>
                    <!-- .row end -->

                </div>
                <!-- .container end -->

            </section>
            <!-- #service1 end -->

            <!-- FOOTER -->
            @include('client.layouts.footer')    
            <!------------->

        </div>
        <!-- #wrapper end -->

    @endsection