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

                    <img src="{{ asset('public/assets/uploads/'.$gallery_header->gal_hd_image) }}" alt="{{ $gallery_header->gal_hd_title }}" />

                </div>

                <div class="container">

                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12">

                            <div class="title title-1 text-center">

                                <div class="title--heading">

                                    <h1>{{ $gallery_header->gal_hd_title }}</h1>

                                </div>

                                <div class="clearfix"></div>

                                <ol class="breadcrumb">

                                    <li><a href="{{ URL::to('/') }}">Home</a></li>

                                    <li class="active">Galleries</li>

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

            <section id="gallery" class="gallery gallery-grid gallery-3col">

                <div class="container">

                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12 gallery-filter">

                            <ul class="list-inline mb-0">

                                <li><a class="active-filter" href="#" data-filter="*">All</a></li>

                                @foreach($gallery_tags as $tag)

                                    <li><a href="#" data-filter=".filter-{{ $tag->gal_tag_name }}">{{ $tag->gal_tag_name }}</a></li>

                                @endforeach

                            </ul>

                        </div>
                        <!-- .gallery-filter end -->

                    </div>

                    <div id="gallery-all">

                        @foreach($galleries as $gallery)

                            <!-- gallery #1 -->
                            <div class="col-xs-12 col-sm-6 col-md-4 gallery-item filter-{{ $gallery->galleryTag->gal_tag_name }}">

                                <div class="gallery--img">

                                    <img src="{{ asset('public/assets/uploads/'.$gallery->gal_image) }}" alt="{{ $gallery->gal_name }}" width="100%">

                                    <div class="gallery--hover">

                                        <div class="gallery--action">

                                            <div class="pos-vertical-center">

                                                <div class="gallery--title">

                                                    <h4><a href="#">{{ $gallery->gal_title }}</a></h4>

                                                </div>

                                                <div class="gallery--cat">

                                                    <a href="#">{{ $gallery->galleryTag->gal_tag_name }}</a>

                                                </div>

                                            </div>

                                        </div>
                                        <!-- .gallery-action end -->

                                    </div>
                                    <!-- .gallery-hover end -->

                                </div>
                                <!-- .gallery-img end -->

                            </div>
                            <!-- . gallery-item end -->     

                        @endforeach              

                    </div>
                    <!-- .row end -->
                    <!-- .row end -->

                </div>
                <!-- .container end -->

            </section>

            <!-- FOOTER -->
            @include('client.layouts.footer')    
            <!------------->

        </div>
        <!-- #wrapper end -->

    @endsection