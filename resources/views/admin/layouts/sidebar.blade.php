<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    
    <!-- Brand Logo -->
    <a href="{{ URL::to('admin/dashboard') }}" class="brand-link">

      <img src="{{ asset('public/assets/uploads/'.config('setting.set_web_logo')) }}" alt="{{ config('set_web_title') }}" class="brand-image img-circle elevation-3" style="opacity: .8">

      <span class="brand-text font-weight-light">{{ config('setting.set_web_title') }}</span>

    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        
        <div class="info">
        
          <a class="d-block">{{ config('admin.admin_name') }}</a>

          <a>{{ config('admin.admin_email') }}</a>
        
        </div>
     
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            
            <a href="{{ URL::to('admin/dashboard') }}" class="nav-link">

              <i class="nav-icon fas fa-tachometer-alt"></i>

              <p>

                Dashboard

              </p>

            </a>
            
          </li>

          <li class="nav-header font-weight-bold text-secondary" style="font-size:17px;"><i class="fas fa-bars"></i> RESERVATION</li>

          <li class="nav-item">

            <a class="nav-link">

              <i class="nav-icon"></i>

              @if(config('reservation_mode.rsv_mode_active') == 1)

                <span class="right badge badge-success">

                  Enabled

                </span>

              @else

                <span class="right badge badge-danger">

                  Disabled

                </span>

              @endif

              <p>

                System

              </p>

            </a>

          </li>

          <li class="nav-item">

            <a href="{{ URL::to('admin/reservations') }}" class="nav-link">

              <i class="nav-icon"></i>

              @if(count(config('reservations')) > 0)

                <span class="right badge badge-warning incoming-reservations">

                  @if(count(config('reservations')) > 10)

                    10+

                  @elseif(count(config('reservations')) > 0)

                    {{ count(config('reservations')) }}

                  @endif

                </span>

              @endif

              <p>

                Incoming Reservations

              </p>

            </a>

          </li>

          <li class="nav-item">

            <a href="{{ URL::to('admin/messages') }}" class="nav-link">

              <i class="nav-icon"></i>

              <p>

                Message Settings

              </p>

            </a>

          </li>

          <li class="nav-item has-treeview">

            <a href="#" class="nav-link">

              <i class="nav-icon"></i>

              @if(count(config('confirm_reservations')) > 10)

                <span class="right badge badge-info" style="margin-right:1em">

                  10+

                </span>

              @elseif(count(config('confirm_reservations')) > 0 )

              <span class="right badge badge-info" style="margin-right:1em">

                {{ count(config('confirm_reservations')) }}

              </span>

              @endif

              @if(count(config('reservations')) > 10)

                <span class="right badge badge-warning">

                  10+

                </span>

              @elseif(count(config('reservations')) > 0)

                <span class="right badge badge-warning incoming-reservations">

                  {{ count(config('reservations')) }}

                </span>

              @endif

              <p>

                Reservations

                <i class="right fas fa-angle-left"></i>

              </p>

            </a>

            <ul class="nav nav-treeview">

              <li class="nav-item">

                <a href="{{ URL::to('admin/reservations/headers') }}" class="nav-link">

                  <i class="nav-icon ml-3"></i>

                  <p>Headers</p>

                </a>

              </li>

              <li class="nav-item">

                <a href="{{ URL::to('admin/reservations') }}" class="nav-link">

                  <i class="nav-icon ml-3"></i>

                  @if(count(config('confirm_reservations')) > 10)

                    <span class="right badge badge-info" style="margin-right:1em">

                      10+

                    </span>

                  @elseif(count(config('confirm_reservations')) > 0)

                    <span class="right badge badge-info" style="margin-right:1em">

                      {{ count(config('confirm_reservations')) }}

                    </span>

                  @endif

                  @if(count(config('reservations')) > 10)

                    <span class="right badge badge-warning">

                      10+

                    </span>

                  @elseif(count(config('reservations')) > 0)

                    <span class="right badge badge-warning incoming-reservations">

                     {{ count(config('reservations')) }}

                    </span>

                  @endif

                  <p>Reservations</p>

                </a>

              </li>

            </ul>

          </li>

          <li class="nav-header font-weight-bold text-danger" style="font-size:17px;"><i class="fas fa-bars"></i> ADMIN</li>

          <li class="nav-item">

            <a href="{{ URL::to('admin/configs') }}" class="nav-link">

              <i class="nav-icon"></i>

              <p>

                Configurations

              </p>

            </a>

          </li>

          <li class="nav-header font-weight-bold text-light" style="font-size:17px;"><i class="fas fa-bars"></i> WEB</li>

          <li class="nav-item">

            <a href="{{ URL::to('admin/customers') }}" class="nav-link">

              <i class="nav-icon"></i>

              <p>

                Customers

              </p>

            </a>

          </li>

          <li class="nav-item">

            <a href="{{ URL::to('admin/profiles') }}" class="nav-link">

              <i class="nav-icon"></i>

              <p>

                Profiles

              </p>

            </a>

          </li>

          <li class="nav-item">

            <a href="{{ URL::to('admin/sites') }}" class="nav-link">

              <i class="nav-icon"></i>

              <p>

                Site Settings

              </p>

            </a>

          </li>

          <li class="nav-item">

            <a href="{{ URL::to('admin/errors') }}" class="nav-link">

              <i class="nav-icon"></i>

              <p>

                404 Page

              </p>

            </a>

          </li>

          <li class="nav-header font-weight-bold text-primary" style="font-size:17px;"><i class="fas fa-bars"></i> MAIN</li>

          <li class="nav-item">

            <a href="{{ URL::to('admin/abouts') }}" class="nav-link">

              <i class="nav-icon"></i>

              <p>

                Abouts

              </p>

            </a>

          </li>

          <li class="nav-item has-treeview">

            <a href="#" class="nav-link">

              <i class="nav-icon"></i>

              <p>

                Blogs

                <i class="right fas fa-angle-left"></i>

              </p>

            </a>

            <ul class="nav nav-treeview">

              <li class="nav-item">

                <a href="{{ URL::to('admin/blogs/headers') }}" class="nav-link">

                  <i class="nav-icon ml-3"></i>

                  <p>Headers</p>

                </a>

              </li>

              <li class="nav-item">

                <a href="{{ URL::to('admin/blogs') }}" class="nav-link">

                  <i class="nav-icon ml-3"></i>

                  <p>Blogs</p>

                </a>

              </li>

              <li class="nav-item">

                <a href="{{ URL::to('admin/blogs/categories') }}" class="nav-link">

                  <i class="nav-icon ml-3"></i>

                  <p>Categories</p>

                </a>

              </li>

            </ul>

          </li>

          <li class="nav-item has-treeview">

            <a href="#" class="nav-link">

              <i class="nav-icon"></i>

              <p>

                Products

                <i class="right fas fa-angle-left"></i>

              </p>

            </a>

            <ul class="nav nav-treeview">

              <li class="nav-item">

                <a href="{{ URL::to('admin/products/headers') }}" class="nav-link">

                  <i class="nav-icon ml-3"></i>

                  <p>Headers</p>

                </a>

              </li>

              <li class="nav-item">

                <a href="{{ URL::to('admin/products') }}" class="nav-link">

                  <i class="nav-icon ml-3"></i>

                  <p>Products</p>

                </a>

              </li>

            </ul>

          </li>

          <li class="nav-item has-treeview">

            <a href="#" class="nav-link">

              <i class="nav-icon"></i>

              <p>

                Services

                <i class="right fas fa-angle-left"></i>

              </p>

            </a>

            <ul class="nav nav-treeview">

              <li class="nav-item">

                <a href="{{ URL::to('admin/services/headers') }}" class="nav-link">

                  <i class="nav-icon ml-3"></i>

                  <p>Headers</p>

                </a>

              </li>

              <li class="nav-item">

                <a href="{{ URL::to('admin/services') }}" class="nav-link">

                  <i class="nav-icon ml-3"></i>

                  <p>Services</p>

                </a>

              </li>

            </ul>

          </li>

          <li class="nav-item has-treeview">

            <a href="#" class="nav-link">

              <i class="nav-icon"></i>

              <p>

                Teams

                <i class="right fas fa-angle-left"></i>

              </p>

            </a>

            <ul class="nav nav-treeview">

              <li class="nav-item">

                <a href="{{ URL::to('admin/teams/headers') }}" class="nav-link">

                  <i class="nav-icon ml-3"></i>

                  <p>Headers</p>

                </a>

              </li>

              <li class="nav-item">

                <a href="{{ URL::to('admin/teams') }}" class="nav-link">

                  <i class="nav-icon ml-3"></i>

                  <p>Teams</p>

                </a>

              </li>

            </ul>

          </li>

          <li class="nav-item has-treeview">

            <a href="#" class="nav-link">

              <i class="nav-icon"></i>

              <p>

                Testimonials

                <i class="right fas fa-angle-left"></i>

              </p>

            </a>

            <ul class="nav nav-treeview">

              <li class="nav-item">

                <a href="{{ URL::to('admin/testimonials/headers') }}" class="nav-link">

                  <i class="nav-icon ml-3"></i>

                  <p>Headers</p>

                </a>

              </li>

              <li class="nav-item">

                <a href="{{ URL::to('admin/testimonials') }}" class="nav-link">

                  <i class="nav-icon ml-3"></i>

                  <p>Testimonials</p>

                </a>

              </li>

            </ul>

          </li>

          <li class="nav-item has-treeview">

            <a href="#" class="nav-link">

              <i class="nav-icon"></i>

              <p>

                Treatments

                <i class="right fas fa-angle-left"></i>

              </p>

            </a>

            <ul class="nav nav-treeview">

              <li class="nav-item">

                <a href="{{ URL::to('admin/treatments/headers') }}" class="nav-link">

                  <i class="nav-icon ml-3"></i>

                  <p>Headers</p>

                </a>

              </li>

              <li class="nav-item">

                <a href="{{ URL::to('admin/treatments/types') }}" class="nav-link">

                  <i class="nav-icon ml-3"></i>

                  <p>Types</p>

                </a>

              </li>

              <li class="nav-item">

                <a href="{{ URL::to('admin/treatments') }}" class="nav-link">

                  <i class="nav-icon ml-3"></i>

                  <p>Treatments</p>

                </a>

              </li>

            </ul>

          </li>

          <li class="nav-header font-weight-bold text-success" style="font-size:17px;"><i class="fas fa-bars"></i> IMAGES</li>

          <li class="nav-item has-treeview">

            <a href="#" class="nav-link">

              <i class="nav-icon"></i>

              <p>

                Galleries

                <i class="right fas fa-angle-left"></i>

              </p>

            </a>

            <ul class="nav nav-treeview">

              <li class="nav-item">

                <a href="{{ URL::to('admin/galleries/headers') }}" class="nav-link">

                  <i class="nav-icon ml-3"></i>

                  <p>Headers</p>

                </a>

              </li>

              <li class="nav-item">

                <a href="{{ URL::to('admin/galleries/tags') }}" class="nav-link">

                  <i class="nav-icon ml-3"></i>

                  <p>Tags</p>

                </a>

              </li>

              <li class="nav-item">

                <a href="{{ URL::to('admin/galleries') }}" class="nav-link">

                  <i class="nav-icon ml-3"></i>

                  <p>Galleries</p>

                </a>

              </li>

            </ul>

          </li>

          <li class="nav-item">

            <a href="{{ URL::to('admin/sliders') }}" class="nav-link">

              <i class="nav-icon"></i>

              <p>

                Sliders

              </p>

            </a>

          </li>

        </ul>

      </nav>
      <!-- /.sidebar-menu -->

    </div>
    <!-- /.sidebar -->

  </aside>