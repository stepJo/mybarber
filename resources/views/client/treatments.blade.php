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

                    <img src="{{ asset('public/assets/uploads/'.$treatment_header->treat_hd_image) }}" alt="{{ $treatment_header->treat_hd_title }}" />

                </div>

                <div class="container">

                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12">

                            <div class="title title-1 text-center">

                                <div class="title--heading">

                                    <h1>{{ $treatment_header->treat_hd_title }}</h1>

                                </div>

                                <div class="clearfix"></div>

                                <ol class="breadcrumb">

                                    <li><a href="{{ URL::to('/') }}">Home</a></li>

                                    <li class="active">Treatments</li>

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

            <section>

                <div class="container">

                    <div class="row">

                        @foreach($treatments as $treatment)

                            <div class="col-md-3">

                                <h6 class="text-capitalize">{{ $treatment->treat_name }}</h6>

                                <img src="{{ asset('public/assets/uploads/'.$treatment->treat_image) }}" alt="{{ $treatment->treat_name }}" width="150" height="150"/>

                                <p class="mt-1">{!! $treatment->treat_desc !!}</p>

                                <p class="text-danger" style="margin: -15px 0 0 0;">{{ $treatment->treatmentType->treat_type_name }}</p>

                                <p><b>@rupiah($treatment->treat_price)</b></p>

                            </div>

                        @endforeach

                    </div>

                </div>

            </section>

            <!-- FOOTER -->
            @include('client.layouts.footer')    
            <!------------->

        </div>
        <!-- #wrapper end -->

    @endsection