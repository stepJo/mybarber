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

                    <img src="{{ asset('public/assets/uploads/'.$reservation_header->rsv_hd_image) }}" alt="{{ $reservation_header->rsv_hd_title }}" />
                
                </div>
                
                <div class="container">
                   
                    <div class="row">
                  
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            
                            <div class="title title-1 text-center">
                              
                                <div class="title--heading">

                                    <h1>{{ $reservation_header->rsv_hd_title }}</h1>

                                </div>

                                <div class="clearfix"></div>

                                <ol class="breadcrumb">

                                    <li><a href="{{ URL::to('/') }}">Home</a></li>

                                    <li class="active">Reservation</li>

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

            <section id="booking" class="booking bg-white">

                <div class="container">

                    <div class="row clearfix">

                        <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
                            
                            <div class="heading heading-2 mb-80 text--center">

                                <h2 class="heading--title">{{ $reservation_header->rsv_hd_title }}</h2>

                                <p class="heading--desc">
                                    
                                    {!! $reservation_header->rsv_hd_caption !!}

                                </p>

                                <div class="divider--line"></div>

                            </div>

                        </div>
                        <!-- .col-md-6 end -->

                    </div>
                    <!-- .row end -->

                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">

                            <div class="booking-form">

                                <form action="{{ route('reservation.reserve') }}" method="POST">

                                    @csrf

                                    <div class="row">

                                        <div class="col-xs-12 col-sm-12 col-md-12">

                                            @if ($errors->has('rsv_name'))

                                                <br>

                                                <span class="text-danger font-weight-bold">{{ $errors->first('rsv_name') }}</span>

                                            @endif

                                            <input type="text" class="form-control" name="rsv_name" id="rsv_name" placeholder="Name" value="{{ old('rsv_name') }}">

                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12">

                                            @if ($errors->has('rsv_email'))

                                                <br>

                                                <span class="text-danger font-weight-bold">{{ $errors->first('rsv_email') }}</span>

                                            @endif

                                            <input type="text" class="form-control" name="rsv_email" id="rsv_email" placeholder="Email" value="{{ old('rsv_email') }}">

                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12">

                                            @if ($errors->has('rsv_phone'))

                                                <br>

                                                <span class="text-danger font-weight-bold">{{ $errors->first('rsv_phone') }}</span>

                                            @endif

                                            <input type="text" class="form-control" name="rsv_phone" id="rsv_phone" placeholder="Phone Number" value="{{ old('rsv_phone') }}">

                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12">

                                            @if ($errors->has('rsv_treat'))

                                                <br>

                                                <span class="text-danger font-weight-bold">{{ $errors->first('rsv_treat') }}</span>

                                            @endif

                                            <div class="form-select">

                                                <select class="form-control" name="rsv_treat" id="rsv_treat">

                                                    <option value="">Treatment</option>

                                                    @foreach($treatments as $treatment)

                                                        <option value="{{ $treatment->treat_id }}">{{ $treatment->treat_name }}</option>

                                                    @endforeach

                                                </select>

                                            </div>

                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12">

                                            @if ($errors->has('rsv_date'))

                                                <br>

                                                <span class="text-danger font-weight-bold">{{ $errors->first('rsv_date') }}</span>

                                            @endif

                                            <div class="form-select">

                                                <select class="form-control" name="rsv_date" id="rsv_date">

                                                    <?php 

                                                        $begin = new DateTime(date('Y-m-d'));
                                                        $end = new DateTime(date('Y-m-d', strtotime('+3 days')));
                                                        $daterange = new DatePeriod($begin, new DateInterval('P1D'), $end);

                                                    ?>

                                                    <option value="">Date</option>

                                                    @foreach($daterange as $day)

                                                        <option value="{{ $day->format('Y-m-d') }}">{{ $day->format('d F Y') }}</option>

                                                    @endforeach

                                                </select>

                                            </div>

                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12">

                                            @if ($errors->has('rsv_time'))

                                                <br>

                                                <span class="text-danger font-weight-bold">{{ $errors->first('rsv_time') }}</span>

                                            @endif

                                            <div class="clockpicker" data-placement="left" data-align="top" data-autoclose="true">

                                                <input type="text" name="rsv_time" id="rsv_time" class="form-control" placeholder="Time" value="{{ old('rsv_time') }}">

                                            </div>

                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12">

                                            <input type="submit" value="Reserve" name="submit" class="btn btn--secondary btn--rounded btn--block">

                                        </div>

                                    </div>
                                    <!-- .row end -->

                                </form>
                                <!-- form end -->

                            </div>
                            <!-- .booking-form end -->

                        </div>
                        <!-- .col-md-8 end -->

                    </div>
                    <!-- .row end -->

                    <div class="divider--shape-1down"></div>

                </div>
                <!-- .container end -->

            </section>
            <!-- #booking end -->

        </div>

    @endsection
        
