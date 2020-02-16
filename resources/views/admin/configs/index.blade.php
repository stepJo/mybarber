@extends('admin.layouts.layout')

  @section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      
      <!-- Content Header (Page header) -->
      <section class="content-header">
        
        <div class="container-fluid">
          
          <div class="row mb-2">
            
            <div class="col-sm-6">
              
              <h1>Configurations</h1>
            
            </div>

            <div class="col-sm-6">

              <ol class="breadcrumb float-sm-right">

                <li class="breadcrumb-item">Configurations</li>

              </ol>

            </div>

          </div>

        </div><!-- /.container-fluid -->

      </section>

      <!-- Main content -->
      <section class="content">

        <div class="row">

          <div class="col-md-4">

            <div class="card bg-light">
              
              <div class="card-header text-muted border-bottom-0"></div>
              
              <div class="card-body pt-0">

                <div class="row">

                  <div class="col-12">

                    <p class="text-muted"><b>Name : {{ $admin->admin_name }}</b></p>

                    <p class="text-muted"><b>Email : {{ $admin->admin_email }}</b></p>

                  </div>

                  <div class="col-5 text-center">

                    <img src="{{ asset('public/assets/uploads/'.$admin->admin_image) }}" alt="{{ $admin->admin_name }}" class="img-circle img-fluid">
                  
                  </div>

                </div>

              </div>

              <div class="card-footer"></div>

            </div>

          </div>

          <div class="col-md-4">

            <!-- general form elements -->
            <div class="card card-danger">

              <div class="card-header">

                <h3 class="card-title">Edit Admin</h3>

              </div>
              <!-- /.card-header -->

              <!-- form start -->
              <form role="form" action="{{ route('configs.update', $admin->admin_id) }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="card-body">

                  <div class="form-group">

                    <label for="admin_name">Admin Name</label>

                    @if ($errors->has('admin_name'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('admin_name') }}</span>

                    @endif

                    <input type="text" class="form-control" id="admin_name" name="admin_name" placeholder="Admin Name" value="{{ old('admin_name') }}">

                  </div>

                  <div class="form-group">

                    <label for="admin_email">Admin Email</label>

                    @if ($errors->has('admin_email'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('admin_email') }}</span>

                    @endif

                    <input type="text" class="form-control" id="admin_email" name="admin_email" placeholder="Admin Email" value="{{ old('admin_email') }}">

                  </div>
    
                  <div class="form-group">

                    <label for="admin_image">Admin Image</label>

                    @if ($errors->has('admin_image'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('admin_image') }}</span>

                    @endif

                    <div class="file-upload">

                      <div class="file-select">

                        <div class="file-select-button" id="fileName">Choose File</div>

                        <div class="file-select-name" id="noFile">No file chosen...</div> 

                        <input type="file" name="admin_image" id="chooseFile">

                      </div>

                    </div>

                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">

                  <button type="submit" class="btn btn-danger">Edit Admin</button>

                </div>

              </form>

            </div>
            <!-- /.card -->

          </div>

          <div class="col-md-4">

            <!-- general form elements -->
            <div class="card card-danger">

              <div class="card-header">

                <h3 class="card-title">Edit Password</h3>

              </div>
              <!-- /.card-header -->

              <!-- form start -->
              <form role="form" action="{{ route('configs.change', $admin->admin_id) }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="card-body">

                  <div class="form-group">

                    <label for="admin_pwd">Password</label>

                    @if ($errors->has('admin_pwd'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('admin_pwd') }}</span>

                    @endif

                    <input type="password" class="form-control" id="admin_pwd" name="admin_pwd" placeholder="Password">

                  </div>

                  <div class="form-group">

                    <label for="confirm_pwd">Confirm Password</label>

                    <input type="text" class="form-control" id="confirm_pwd" name="confirm_pwd" placeholder="Confirm Password">

                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">

                  <button type="submit" class="btn btn-danger">Edit Password</button>

                </div>

              </form>

            </div>
            <!-- /.card -->

          </div>
          
        </div>

      </section>
      <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->    

  @endsection