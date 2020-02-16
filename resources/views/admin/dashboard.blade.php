@extends('admin.layouts.layout')
  
  @section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      <!-- Content Header (Page header) -->
      <div class="content-header">
      
        <div class="container-fluid">
      
          <div class="row mb-2">
      
            <div class="col-sm-6">
      
              <h1 class="m-0 text-dark">Dashboard</h1>
      
            </div><!-- /.col -->
      
            <div class="col-sm-6">

              <ol class="breadcrumb float-sm-right">
              
                <li class="breadcrumb-item"><a href="{{ URL::to('admin/dashboard') }}">Dashboard</a></li>
              
              </ol>
            
            </div><!-- /.col -->
          
          </div><!-- /.row -->
        
        </div><!-- /.container-fluid -->
      
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
      
        <div class="container-fluid">
      
          <!-- Small boxes (Stat box) -->
          <div class="row">
            
            <div class="col-lg-4 col-6">
            
              <!-- small box -->
              <div class="small-box bg-info">
            
                <div class="inner">
            
                  <h3>{{ config('confirm_reservations')->count() }}</h3>

                  <p class="badge bg-primary">Confirm Reservations</p>
            
                </div>
            
                <a href="{{ URL::to('admin/reservations') }}" class="small-box-footer">See All <i class="fas fa-arrow-circle-right ml-2"></i></a>
            
              </div>
            
            </div>
            <!-- ./col -->
            
            <div class="col-lg-4 col-6">
            
              <!-- small box -->
              <div class="small-box bg-success">
            
                <div class="inner">
            
                  <h3>{{ $finish_reservations->count() }}</h3>

                  <p class="badge bg-lime">Finish Reservations</p>
            
                </div>
            
                <a href="{{ URL::to('admin/reservations') }}" class="small-box-footer">See All <i class="fas fa-arrow-circle-right ml-2"></i></a>
            
              </div>
            
            </div>
            <!-- ./col -->
            
            <div class="col-lg-4 col-6">

              <!-- small box -->
              <div class="small-box bg-danger">
              
                <div class="inner">
              
                  <h3>{{ $cancel_reservations->count() }}</h3>

                  <p class="badge bg-maroon">Cancel Reservations</p>
              
                </div>
          
                <a href="{{ URL::to('admin/reservations') }}" class="small-box-footer">See All <i class="fas fa-arrow-circle-right ml-2"></i></a>
          
              </div>
          
            </div>
            <!-- ./col -->
          
          </div>
          <!-- /.row -->
          
          <!-- Main row -->
          <div class="row">

            <!-- Left col -->
            <section class="col-lg-5 col-md-5">

              <!-- BAR CHART -->
              <div class="card card-success">
                
                <div class="card-header">
                
                  <h3 class="card-title">Reservations Report</h3>

                  <div class="card-tools">

                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>

                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>

                  </div>

                </div>

                <div class="card-body">

                  <div class="chart">

                    <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>

                  </div>

                </div>
                <!-- /.card-body -->

              </div>
              <!-- /.card -->

            </section>

            <section class="col-lg-7 col-md-7">

              <div class="row">

                <div class="col-md-6 col-sm-6 col-6">

                  <div class="info-box">

                    <span class="info-box-icon bg-light"><i class="far fa-user fa-lg"></i></span>

                    <div class="info-box-content">

                      <h4 class="info-box-text font-weight-bold">Customers</h4>

                      <span class="info-box-number">{{ count($customers) }}</span>

                    </div>
                    <!-- /.info-box-content -->

                  </div>
                  <!-- /.info-box -->

                </div>
                <!-- /.col -->

                <div class="col-md-6 col-sm-6 col-6">

                  <div class="info-box">

                    <span class="info-box-icon bg-light"><i class="far fa-user fa-lg"></i></span>

                    <div class="info-box-content">

                      <h4 class="info-box-text font-weight-bold">Favourite Treatment</h4>

                      @if($favourite)

                        <span class="info-box-number">{{ $favourite->treat_name }}</span>

                      @else

                        <span class="info-box-number">-</span>

                      @endif

                    </div>
                    <!-- /.info-box-content -->

                  </div>
                  <!-- /.info-box -->

                </div>
                <!-- /.col -->

                <div class="col-md-6 col-sm-6 col-6">

                  <div class="info-box">

                    <span class="info-box-icon bg-primary"><i class="fas fa-cube fa-lg"></i></span>

                    <div class="info-box-content">

                      <h4 class="info-box-text font-weight-bold">Products</h4>

                      <span class="info-box-number">{{ count($products) }}</span>

                    </div>
                    <!-- /.info-box-content -->

                  </div>
                  <!-- /.info-box -->

                </div>
                <!-- /.col -->

                <div class="col-md-6 col-sm-6 col-6">

                  <div class="info-box">

                    <span class="info-box-icon bg-primary"><i class="far fa-keyboard fa-lg"></i></span>

                    <div class="info-box-content">

                      <h4 class="info-box-text font-weight-bold">Blogs</h4>

                      <span class="info-box-number">{{ count($blogs) }}</span>

                    </div>
                    <!-- /.info-box-content -->

                  </div>
                  <!-- /.info-box -->

                </div>
                <!-- /.col -->

                <section class="log-lg-12 col-md-12">

                  <div class="card card-primary card-outline">

                    <div class="card-header">

                      <h3 class="card-title">Mail</h3>

                    </div>
                    <!-- /.card-header -->

                    <form action="{{ route('messages.send') }}" method="POST" enctype="multipart/form-data">

                      @csrf

                      <div class="card-body">

                        <div class="form-group">

                          @if ($errors->has('sender_email'))

                            <br>

                            <span class="text-danger font-weight-bold">{{ $errors->first('sender_email') }}</span>

                          @endif

                          <input type="text" class="form-control" placeholder="Sender Email" name="sender_email">

                        </div>

                        <div class="form-group">

                          @if ($errors->has('sender_name'))

                            <br>

                            <span class="text-danger font-weight-bold">{{ $errors->first('sender_name') }}</span>

                          @endif

                          <input type="text" class="form-control" placeholder="Sender Name" name="sender_name">

                        </div>

                        <div class="form-group">

                          @if ($errors->has('recepient'))

                            <br>

                            <span class="text-danger font-weight-bold">{{ $errors->first('recepient') }}</span>

                          @endif

                          <input type="text" class="form-control" placeholder="To:" name="recepient">

                        </div>

                        <div class="form-group">

                          @if ($errors->has('subject'))

                            <br>

                            <span class="text-danger font-weight-bold">{{ $errors->first('subject') }}</span>

                          @endif

                          <input type="text" class="form-control" placeholder="Subject:" name="subject">

                        </div>

                        <div class="form-group">

                          @if ($errors->has('content'))

                            <br>

                            <span class="text-danger font-weight-bold">{{ $errors->first('content') }}</span>

                          @endif

                          <textarea name="content" id="compose-textarea" class="form-control" style="height: 300px">
                    
                          </textarea>

                        </div>

                      </div>
                      <!-- /.card-body -->

                      <div class="card-footer">

                        <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Send</button>

                      </div>
                      <!-- /.card-footer -->

                    </form>

                  </div>
                  <!-- /.card -->

                </section>

              </div>

            </section>

          </div>
          <!-- /.row (main row) -->

        </div><!-- /.container-fluid -->

      </section>
      <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->

  @endsection