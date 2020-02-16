<!-- Team #1
============================================= -->
<section id="team1" class="team team-1">

    <div class="container">

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">

                <div class="text--center heading heading-2 mb-70">

                    <h2 class="heading--title">{{ $team_header->tm_hd_title }}</h2>

                    <p class="heading--desc mb-0">{{ $team_header->tm_hd_caption }}</p>

                    <div class="divider--line divider--center"></div>

                </div>

            </div>
            <!-- .col-md-6 end -->

        </div>
        <!-- .row end -->

        <div class="row">

            @foreach($teams as $team)

                <!-- Member #1 -->
                <div class="col-xs-12 col-sm-4 col-md-4">

                    <div class="member">

                        <div class="member-img">

                            <img src="{{ asset('public/assets/uploads/'.$team->tm_image) }}" alt="{{ $team->tm_name }}" />

                            <div class="member-overlay">

                                <div class="member-social">

                                    <div class="pos-vertical-center">
                                
                                        <p style="padding:20px; color:#fff;">{{ $team->tm_profile }}</p>

                                    </div>

                                </div>

                            </div>
                            <!-- .memebr-ovelay end -->

                        </div>
                        <!-- .member-img end -->

                        <div class="member-info">

                            <h5>{{ $team->tm_name }}</h5>

                            <h6>{{ $team->tm_job }}</h6>

                        </div>
                        <!-- .member-info end -->

                    </div>
                    <!-- .member end -->
                </div>
                <!-- .col-md-4 end -->

            @endforeach

        </div>

    </div>

</section>
<!-- #team4 end  -->