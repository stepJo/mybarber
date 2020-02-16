@extends('admin.layouts.layout')

  @section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      
      <!-- Content Header (Page header) -->
      <section class="content-header">
        
        <div class="container-fluid">
          
          <div class="row mb-2">
            
            <div class="col-sm-6">
              
              <h1>404 Page</h1>
            
            </div>

            <div class="col-sm-6">

              <ol class="breadcrumb float-sm-right">

                <li class="breadcrumb-item">404 Page</li>

              </ol>

            </div>

          </div>

        </div><!-- /.container-fluid -->

      </section>

      <!-- Main content -->
      <section class="content">

        <div class="row">

          <div class="col-md-6">

            <div class="callout callout-light">

              <h3>Title : <b>{{ $error->error_pg_title }}</b></h3>

              <h3 class="mt-5 mb-5">Description : <b>{!! $error->error_pg_desc !!}</b></h3>

              <h3>Image : </h3>

              <img src="{{ url('/public/assets/uploads/'.$error->error_pg_image) }}" alt="{{ $error->error_pg_title }}" class="img-thumbnail mt-2" width="150">

            </div>

          </div>

          <div class="col-md-6">

            <!-- general form elements -->
            <div class="card card-light">

              <div class="card-header">

                <h3 class="card-title">Edit Error Page</h3>

              </div>
              <!-- /.card-header -->

              <!-- form start -->
              <form role="form" action="{{ route('errors.update', $error->error_pg_id) }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="card-body">

                  <div class="form-group">

                    <label for="error_pg_title">Error Page Title</label>

                    @if ($errors->has('error_pg_title'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('error_pg_title') }}</span>

                    @endif

                    <input type="text" class="form-control" id="error_pg_title" name="error_pg_title" placeholder="Error Page Title" value="{{ old('error_pg_title') }}">

                  </div>

                  <div class="form-group">

                    <label for="error_pg_desc">Error Page Description</label>

                    @if ($errors->has('error_pg_desc'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('error_pg_desc') }}</span>

                    @endif

                    <textarea class="form-control" id="description" name="error_pg_desc">  

                      {{ old('error_pg_desc') }}

                    </textarea>

                  </div>

                  <div class="form-group">

                    <label for="error_pg_image">Error Page Image</label>

                    @if ($errors->has('error_pg_image'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('error_pg_image') }}</span>

                    @endif

                    <div class="file-upload">

                      <div class="file-select">

                        <div class="file-select-button" id="fileName">Choose File</div>

                        <div class="file-select-name" id="noFile">No file chosen...</div> 

                        <input type="file" name="error_pg_image" id="chooseFile">

                      </div>

                    </div>

                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">

                  <button type="submit" class="btn btn-default">Edit Error Page</button>

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