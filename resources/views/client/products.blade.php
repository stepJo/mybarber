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

                    <img src="{{ asset('public/assets/uploads/'.$product_header->prd_hd_image) }}" alt="{{ $product_header->prd_hd_title }}" />

                </div>

                <div class="container">

                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12">

                            <div class="title title-1 text-center">

                                <div class="title--heading">

                                    <h1>{{ $product_header->prd_hd_title }}</h1>

                                </div>

                                <div class="clearfix"></div>

                                <ol class="breadcrumb">

                                    <li><a href="{{ URL::to('/') }}">Home</a></li>

                                    <li class="active">Products</li>

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

            <section id="shop" class="shop shop-4">

                <div class="container">

                    <div class="row">

                        <div class="col-xs-12 col-sm-12  col-md-12 product-options">

                            <div class="product-num pull-left pull-none-xs">

                                <h2>Showing {{ $total }} products</h2>

                            </div>
                            <!-- .product-num end -->

                        </div>
                        <!-- .col-md-12 end -->

                    </div>

                    <div class="row fetch-products">

                        @foreach($products as $product)

                            <!-- Product #1 -->
                            <div class="col-xs-12 col-sm-6 col-md-3 product-item">

                                <div class="product--img">

                                    <img src="{{ asset('public/assets/uploads/'.$product->prd_image) }}" alt="{{ $product->prd_name }}" />

                                </div>
                                <!-- .product-img end -->

                                <div class="product--content">

                                    <div class="product--title">

                                        <h3><a>{{ $product->prd_name }}</a></h3>

                                    </div>
                                    <!-- .product-title end -->

                                    <div class="product--price">

                                        <span>@rupiah($product->prd_price)</span>

                                    </div>
                                    <!-- .product-price end -->

                                </div>
                                <!-- .product-bio end -->

                            </div>
                            <!-- .product end -->

                        @endforeach

                    </div>
                    <!-- .row end -->

                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12 clearfix mt-40 text--center">
                            
                            <ul class="pagination">

                                @if($products->hasPages())

                                    @if(!$products->onFirstPage())

                                        <li>
                                            
                                            <a class="pagination-next page-link" href="{{ $products->previousPageUrl() }}" aria-label="Prev">

                                                <span aria-hidden="true">prev <i class="fa fa-angle-left"></i></span>

                                            </a>

                                        </li>

                                    @endif

                                    @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)

                                        @if($page == $products->currentPage())

                                            <li class="active"><a href="#" class="page-link">{{ $products->currentPage() }}</a></li>

                                        @else 

                                            <li><a href="{{ $url }}" class="page-link">{{ $page }}</a></li>

                                        @endif

                                    @endforeach

                                    @if($products->hasMorePages())

                                        <li>
                                            
                                            <a class="pagination-next page-link" href="{{ $products->nextPageUrl() }}" aria-label="Prev">

                                                <span aria-hidden="true">next <i class="fa fa-angle-right"></i></span>

                                            </a>

                                        </li>

                                    @endif

                                @endif

                            </ul>

                        </div>
                        <!-- .col-md-12 end -->

                    </div>
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