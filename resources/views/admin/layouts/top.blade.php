Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <!-- Left navbar links -->
    <ul class="navbar-nav">
      
        <li class="nav-item">
        
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      
        </li>

        <li class="nav-item d-none d-sm-inline-block">
        
            <a href="{{ URL::to('admin/dashboard') }}" class="nav-link">Dashboard</a>
      
        </li>
      
        <li class="nav-item d-none d-sm-inline-block">
          
            <a href="{{ URL::to('admin/configs') }}" class="nav-link">Configurations</a>
      
        </li>

    </ul>

    @if(config('reservation_mode.rsv_mode_active') == 1)

        <a href="#" data-toggle="modal" data-target="#disabledModal" class="btn btn-danger btn-sm">Disabled Reservation System</a>

        <div class="modal fade" id="disabledModal" data-backdrop="false">

            <div class="modal-dialog">

                <div class="modal-content">

                    <div class="modal-header">

                        <h4 class="modal-title">Reservation System</h4>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                            <span aria-hidden="true">&times;</span>

                        </button>

                    </div>

                    <div class="modal-body">

                        <p>Are you sure want to disabled reservation system ?</p>

                    </div>

                    <div class="modal-footer justify-content-between">

                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

                        <form action="{{ route('reservations.off', config('reservation_mode.rsv_mode_id')) }}" method="POST">

                            @csrf

                            <button type="submit" class="btn btn-danger">Disabled System</button>
                      
                        </form>

                    </div>

                </div>
                <!-- /.modal-content -->

            </div>
            <!-- /.modal-dialog -->

        </div>
        <!-- /.modal -->

    @else

        <form method="POST" action="{{ route('reservations.on', config('reservation_mode.rsv_mode_id')) }}">
            @csrf

            <button type="submit" class="btn btn-success btn-sm">Enabled Reservation System</button>

        </form>

    @endif

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

       {{--  <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">

            <a class="nav-link" data-toggle="dropdown" href="#">

                <i class="far fa-comments"></i>

                <span class="badge badge-danger navbar-badge">3</span>

            </a>

            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                <a href="#" class="dropdown-item">

                    <!-- Message Start -->
                    <div class="media">

                        <img src="{{ asset('public/assets/uploads/'.config('admin')) }}" alt="" class="img-size-50 mr-3 img-circle">

                        <div class="media-body">

                            <h3 class="dropdown-item-title">

                                Brad Diesel

                                <span class="float-right text-sm text-danger">

                                    <i class="fas fa-star"></i>

                                </span>

                            </h3>

                            <p class="text-sm">Call me whenever you can...</p>

                            <p class="text-sm text-muted">

                                <i class="far fa-clock mr-1"></i> 4 Hours Ago

                            </p>

                        </div>

                    </div>
                    <!-- Message End -->

                </a>

                <div class="dropdown-divider"></div>

                <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>

            </div>

        </li> --}}

        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">

            <a class="nav-link" data-toggle="dropdown" href="#">

                <i class="far fa-bell mr-5" style="font-size: 1.5em;"></i>

                @if(count(config('reservations')) > 0)

                    <span class="navbar-badge badge badge-warning mr-5 rsv-bell">

                        @if(count(config('reservations')) > 10)

                            {{ count(config('reservations')) }}

                        @elseif(count(config('reservations')) > 0)

                            {{ count(config('reservations')) }}

                        @endif

                    </span>

                @endif

            </a>

            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                <span class="dropdown-item dropdown-header"></span>

                <div class="rsv-list text-center">You have <b>{{ count(config('reservations')) }}&nbsp;</b>reservations</div>

                <a href="{{ URL::to('admin/reservations') }}" class="dropdown-item dropdown-footer">See All Reservations</a>

            </div>

        </li>

    </ul>

    <a href="#" data-toggle="modal" data-target="#logoutModal" class="mr-2 font-weight-bold btn btn-dark">Logout</a>

    <div class="modal fade" id="logoutModal" data-backdrop="false">

        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header">

                    <h4 class="modal-title">Logout</h4>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">&times;</span>

                    </button>

                </div>

                <div class="modal-body">

                    <p>Are you sure want to end current session ?</p>

                </div>

                <div class="modal-footer justify-content-between">

                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

                    <form action="{{ route('admin.logout') }}" method="POST">

                        @csrf

                        <button type="submit" class="btn btn-danger">Logout</button>
                  
                    </form>

                </div>

            </div>
            <!-- /.modal-content -->

        </div>
        <!-- /.modal-dialog -->

    </div>
    <!-- /.modal -->

</nav>
<!-- /.navbar