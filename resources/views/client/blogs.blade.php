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

                    <img src="{{ asset('public/assets/uploads/'.$blog_header->blog_hd_image) }}" alt="{{ $blog_header->blog_hd_title }}" />

                </div>

                <div class="container">

                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12">

                            <div class="title title-1 text-center">

                                <div class="title--heading">

                                    <h1>{{ $blog_header->blog_hd_title }}</h1>

                                </div>

                                <div class="clearfix"></div>

                                <ol class="breadcrumb">

                                    <li><a href="{{ URL::to('/') }}">Home</a></li>

                                    <li class="active">Blogs</li>

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

            <section id="blog" class="blog blog-grid">

                <div class="container">

                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-8">

                            <div class="row">

                                @foreach($blogs as $blog)
                                
                                    <div class="col-xs-12 col-sm-6 col-md-6">

                                        <div class="blog-entry">

                                            <div class="entry--img">

                                                <a href="{{ route('blogs.details', $blog->blog_id) }}">

                                                    <img src="{{ asset('public/assets/uploads/'.$blog->blog_image) }}" alt="{{ $blog->blog_title }}" />
                                        
                                                </a>
                                            
                                            </div>

                                            <div class="entry--content">

                                                <div class="entry--meta">

                                                    <span>{{ date('d F Y', strtotime($blog->blog_post_date)) }}</span>

                                                    <span><a href="#">{{ $blog->blogCategory->blog_cat_name }}</a></span>

                                                </div>

                                                <div class="entry--title">

                                                    <h4><a href="{{ route('blogs.details', $blog->blog_id) }}">{{ $blog->blog_title }}</a></h4>

                                                </div>

                                                <div class="entry--bio">

                                                    {!! Str::limit($blog->blog_content, 100, ' ...') !!}

                                                </div>
                                                
                                                <div class="entry--more">
                                                 
                                                    <a href="{{ route('blogs.details', $blog->blog_id) }}">Read More <i class="fa fa-angle-double-right"></i></a>

                                                </div>

                                            </div>

                                        </div>
                                        <!-- .blog-entry end -->

                                    </div>
                                    <!-- .col-md-4 end -->

                                @endforeach

                            </div>
                            <!-- .row end -->

                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12 clearfix mt-30 text--center">
                                   
                                    <ul class="pagination">
                                    
                                        @if($blogs->hasPages())

                                            @if(!$blogs->onFirstPage())

                                                <li>
                                                    
                                                    <a class="pagination-next page-link" href="{{ $blogs->previousPageUrl() }}" aria-label="Prev">

                                                        <span aria-hidden="true">prev <i class="fa fa-angle-left"></i></span>

                                                    </a>

                                                </li>

                                            @endif

                                            @foreach ($blogs->getUrlRange(1, $blogs->lastPage()) as $page => $url)

                                                @if($page == $blogs->currentPage())

                                                    <li class="active"><a href="#" class="page-link">{{ $blogs->currentPage() }}</a></li>

                                                @else 

                                                    <li><a href="{{ $url }}" class="page-link">{{ $page }}</a></li>

                                                @endif

                                            @endforeach

                                            @if($blogs->hasMorePages())

                                                <li>
                                                    
                                                    <a class="pagination-next page-link" href="{{ $blogs->nextPageUrl() }}" aria-label="Prev">

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
                        <!-- .col-md-8 end -->

                        <div class="col-xs-12 col-sm-12 col-md-4">

                            <div class="sidebar">

                                <div class="widget widget-search">

                                    <div class="widget--content">

                                        <form action="{{ route('blogs.search') }}" class="form-search" method="POST">

                                            @csrf

                                            <div class="input-group">

                                                <input type="text" class="form-control" placeholder="Search Blog..." name="keyword">

                                                <span class="input-group-btn">

                                                    <button class="btn" type="submit"><i class="fa fa-search"></i></button>

                                                </span>

                                            </div>
                                            <!-- /input-group -->

                                        </form>
                                    
                                    </div>
                                
                                </div>
                                <!-- .widget-search end -->

                                <div class="widget widget-categories">

                                    <div class="widget--title">

                                        <h5>categories</h5>

                                    </div>

                                    <div class="widget--content">

                                        <ul class="list-unstyled">

                                            <li><a href="{{ URL::to('blogs') }}">All Blogs ({{ count($blogs) }})</a></li>

                                            @foreach($blog_categories as $blog_category)

                                                <li>

                                                    <a href="{{ route('blogs.categories', $blog_category->blog_cat_id) }}">{{ $blog_category->blog_cat_name }} ({{ $blog_category->blogs->count() }})</a>

                                                </li>

                                            @endforeach

                                        </ul>

                                    </div>

                                </div>

                                <div class="widget widget-recent-posts">

                                    <div class="widget--title">

                                        <h5>Recent Posts</h5>

                                    </div>

                                    <div class="widget--content">

                                        @foreach($recents as $recent)

                                            <div class="entry">

                                                <a href="{{ route('blogs.details', $recent->blog_id) }}">

                                                    <img src="{{ asset('public/assets/uploads/'.$recent->blog_image) }}" alt="{{ $recent->blog_title }}" />
                                                
                                                </a>

                                                <div class="entry-desc">

                                                    <div class="entry-title">

                                                        <a href="{{ route('blogs.details', $recent->blog_id) }}">{{ $recent->blog_title }}</a>

                                                    </div>

                                                    <div class="entry-meta">

                                                        <span><a>{{ date('d F Y', strtotime($recent->blog_post_date)) }}</a></span>

                                                        <br/>

                                                        <span><a href="{{ route('blogs.categories', $recent->blog_cat_id) }}">{{ $recent->blog_cat_name }}</a></span>

                                                    </div>

                                                </div>

                                            </div>
                                            <!-- .recent-entry end -->

                                        @endforeach

                                    </div>

                                </div>
                                <!-- .widget-recent end -->

                            </div>

                        </div>
                        
                        <!-- .col-md-4 end -->
                    
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