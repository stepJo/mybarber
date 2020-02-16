@extends('admin.layouts.layout')

  @section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      
      <!-- Content Header (Page header) -->
      <section class="content-header">
        
        <div class="container-fluid">
          
          <div class="row mb-2">
            
            <div class="col-sm-6">
              
              <h1>Edit Service Header</h1>
            
            </div>

            <div class="col-sm-6">

              <ol class="breadcrumb float-sm-right">

                <li class="breadcrumb-item">Service Header</li>

                <li class="breadcrumb-item active">Edit Service Header</li>

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
              <form role="form" action="{{ route('services.headers.update', $header->serv_hd_id) }}" method="POST" enctype="multipart/formdata">

                @csrf

                @method('PATCH')

                <div class="card-body">

                  <div class="form-group">

                    <label for="serv_hd_title">Service Header Title</label>

                    @if ($errors->has('serv_hd_title'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('serv_hd_title') }}</span>

                    @endif

                    <input type="text" class="form-control" id="serv_hd_title" name="serv_hd_title"value="{{ $header->serv_hd_title }}">

                  </div>

                  <div class="form-group">

                    <label for="serv_hd_caption">Service Header Caption</label>

                    @if ($errors->has('serv_hd_caption'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('serv_hd_caption') }}</span>

                    @endif

                    <textarea class="form-control" id="description" name="serv_hd_caption" >  

                      {{ $header->serv_hd_caption }}

                    </textarea>

                  </div>

                  <p class="font-weight-bold">Current Image</p>

                  <br>

                  <img src="{{ url('/public/assets/uploads/'.$header->serv_hd_image) }}" alt="{{ $header->serv_hd_image }}" class="img-thumbnail" width="200">

                  <br>

                  <div class="form-group mt-5">

                    <label for="serv_hd_image">Service Header Image</label>

                    @if ($errors->has('serv_hd_image'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('serv_hd_image') }}</span>

                    @endif

                    <div class="file-upload">

                      <div class="file-select">

                        <div class="file-select-button" id="fileName">Choose File</div>

                        <div class="file-select-name" id="noFile">No file chosen...</div> 

                        <input type="file" name="serv_hd_image" id="chooseFile">

                      </div>

                    </div>

                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">

                  <button type="submit" class="btn btn-primary">Edit Service Header</button>

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