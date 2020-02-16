<section id="shop" class="shop shop-4">

    <div class="container">

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">

                <div class="text--center heading heading-2 mb-70">

                    <h2 class="heading--title">{{ $product_header->prd_hd_title }}</h2>

                    <p class="heading--desc mb-0">{!! $product_header->prd_hd_caption !!}</p>

                    <div class="divider--line divider--center"></div>

                </div>

            </div>
            <!-- .col-md-6 end -->

        </div>
        <!-- .row end -->

        <div class="row">

            @foreach($products as $product)
            
                <div class="col-xs-12 col-sm-6 col-md-3 product-item">

                    <div class="product--img">

                        <img src="{{ asset('public/assets/uploads/'.$product->prd_image) }}" alt="{{ $product->prd_name }}" />

                    </div>
                    <!-- .product-img end -->

                    <div class="product--content">

                        <div class="product--title">

                            <h3><a href="{{ URL::to('products') }}">{{ $product->prd_name }}</a></h3>

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

            <div class="col-xs-12 col-sm-12 col-md-12 clearfix mt-30 text--center">
                
                <a href="{{ URL::to('products') }}" class="btn btn--secondary btn--bordered btn--rounded">View All Products</a>
            
            </div>
            <!-- .col-md-12 end -->

        </div>
        <!-- .row end -->

    </div>
    <!-- .container end -->

</section>
<!-- #shop end -->