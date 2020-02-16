@extends('client.layouts.layout')
    
    @section('content')

    	<!-- Document Wrapper
    	============================================= -->
        <div id="wrapper" class="wrapper clearfix">

            <header id="navbar-spy" class="header header-topbar header-transparent header-fixed">
    	
            </header>

            <section class="page-404 text-center bg-overlay bg-overlay-dark fullscreen pb-0 mtop-100">

			    <div class="bg-section">

			        <img src="{{ asset('public/assets/uploads/'.$error->error_pg_image) }}" alt="{{ $error->error_pg_title }}" />
			    
			    </div>

				<div class="container">

					<div class="row">

						<div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
							
							<h3 class="text-white">{{ $error->error_pg_title }}</h3>
							
							<div class="clearfix"></div>

						</div>

						<div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">

							<div class="clearfix"></div>

							<p class="mb-40 text-white">{!! $error->error_pg_desc !!}</p>

							<a class="btn btn--primary btn--rounded" href="{{ URL::to('/') }}">Go Home</a>
						
						</div>

					</div>
					<!-- .row end -->

				</div>
				<!-- .cotainer end -->

			</section>
			<!-- .page-404 end -->

        </div>
        <!-- #wrapper end -->

    @endsection