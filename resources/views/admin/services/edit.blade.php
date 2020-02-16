@extends('admin.layouts.layout')

  @section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      
      <!-- Content Header (Page header) -->
      <section class="content-header">
        
        <div class="container-fluid">
          
          <div class="row mb-2">
            
            <div class="col-sm-6">
              
              <h1>Edit Service</h1>
            
            </div>

            <div class="col-sm-6">

              <ol class="breadcrumb float-sm-right">

                <li class="breadcrumb-item">Service</li>

                <li class="breadcrumb-item active">Edit Service</li>

              </ol>

            </div>

          </div>

        </div><!-- /.container-fluid -->

      </section>

      <!-- Main content -->
      <section class="content">

        <div class="row">

          <div class="col-md-9">

            <!-- general form elements -->
            <div class="card card-primary">

              <div class="card-header">

                <h3 class="card-title">Data</h3>

              </div>
              <!-- /.card-header -->

              <!-- form start -->
              <form role="form" action="{{ route('services.update', $service->serv_id) }}" method="POST" enctype="multipart/form-data">

                @csrf

                @method('PATCH')

                <div class="card-body">

                  <div class="form-group">

                    <label for="serv_name">Service Name</label>

                    @if ($errors->has('serv_name'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('serv_name') }}</span>

                    @endif

                    <input type="text" class="form-control" id="serv_name" name="serv_name"placeholder="Service Name" value="{{ $service->serv_name }}">

                  </div>

                  <div class="form-group">

                    <label for="serv_desc">Service Description</label>

                    @if ($errors->has('serv_desc'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('serv_desc') }}</span>

                    @endif

                    <textarea class="form-control" id="description" name="serv_desc" >  

                      {{ $service->serv_desc }}

                    </textarea>

                  </div>

                  <p class="font-weight-bold">Current Image</p>

                  <br>

                  <img src="{{ url('/public/assets/uploads/'.$service->serv_image) }}" alt="{{ $service->serv_name }}" class="img-thumbnail" width="200">

                  <br>

                  <div class="form-group mt-5">

                    <label for="serv_image">Service Image</label>

                    @if ($errors->has('serv_image'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('serv_image') }}</span>

                    @endif

                    <div class="file-upload">

                      <div class="file-select">

                        <div class="file-select-button" id="fileName">Choose File</div>

                        <div class="file-select-name" id="noFile">No file chosen...</div> 

                        <input type="file" name="serv_image" id="chooseFile">

                      </div>

                    </div>

                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">

                  <button type="submit" class="btn btn-primary">Edit Service</button>

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