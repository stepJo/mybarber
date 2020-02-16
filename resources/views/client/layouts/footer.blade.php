<!-- Footer #5
============================================= -->
<footer id="footer" class="footer">

    <!-- Widget Section
	============================================= -->
    <div class="footer-widget">

        <div class="container">

            <div class="row">

                <div class="col-xs-12 col-sm-6 col-md-4 footer--widget-about">

                    <div class="footer--widget-content">

                        <img src="{{ asset('public/assets/uploads/'.$setting->set_web_logo) }}" alt="{{ $setting->set_web_title }}" width="60">

                        <div class="work--schedule clearfix">

                            <ul class="list-unstyled">

                                <li>Monday - Friday <span>9.00 : 17.00</span></li>

                                <li>Saturday <span>9.00 : 15.00</span></li>

                                <li>Sunday <span>9.00 : 13.00</span></li>

                            </ul>

                        </div>

                    </div>

                </div>
                <!-- .col-md-4 end -->

                <div class="col-xs-12 col-sm-6 col-md-4 footer--widget-recent">

                    <div class="footer--widget-title">

                        <h5>Latest Blogs</h5>

                    </div>

                    <div class="footer--widget-content">

                        @if(count($blogs) == 0) 

                            No Posts Yet

                        @else

                            @foreach($blogs as $blog)

                                <div class="entry">

                                    <div class="entry--img">

                                        <a href="#">

        									<img src="{{ asset('public/assets/uploads/'.$blog->blog_image) }}" alt="{{ $blog->blog_title }}" width="80">
        								</a>

                                    </div>

                                    <div class="entry--content">

                                        <div class="entry--title">

                                            <a href="#">{{ $blog->blog_title }}</a>

                                        </div>

                                        <div class="entry--meta">

                                            <span>{{ date('d F Y', strtotime($blog->blog_post_date)) }}</span>

                                        </div>

                                    </div>

                                </div>
                                <!-- .entry end -->

                            @endforeach

                        @endif

                    </div>

                </div>
                <!-- .col-md-4 end -->

                <div class="col-xs-12 col-sm-6 col-md-4 footer--widget-contact">

                    <div class="footer--widget-title">

                        <h5>Get In Touch</h5>

                    </div>

                    <div class="footer--widget-content">

                        <ul class="list-unstyled mb-0">

                            <li><i class="fa fa-map-marker medium-text mr-1"></i> {!! $profile->profile_address !!}</li>

                            <li><i class="fa fa-phone medium-text mr-1"></i>{{ $profile->profile_phone }}</li>

                            <li><i class="fa fa-envelope medium-text mr-1"></i>{{ $profile->profile_email }}</li>
                            
                        </ul>

                    </div>

                </div>
                <!-- .col-md-4 end -->

            </div>

        </div>
        <!-- .container end -->

    </div>
    <!-- .footer-widget end -->

    <!-- Copyrights
	============================================= -->
    <div class="footer--copyright">

        <div class="container">

            <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-6">

                    <span>&copy; {{ date('Y') }}, All rights reserved.</span>

                </div>

                <div class="col-xs-12 col-sm-12 col-md-6 text-right">

                    <div class="social">

                        <a class="facebook" href="{{ $links->facebook }}" target="_blank"><i class="fab fa-facebook"></i></a>
                
                        <a class="instagram" href="{{ $links->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a>
                
                        <a class="twitter" href="{{ $links->twitter }}" target="_blank"><i class="fa fab fa-twitter"></i></a>

                    </div>

                </div>

            </div>

        </div>
        <!-- .container end -->

    </div>

</footer>