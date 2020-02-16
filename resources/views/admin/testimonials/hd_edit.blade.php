@extends('admin.layouts.layout')

  @section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      
      <!-- Content Header (Page header) -->
      <section class="content-header">
        
        <div class="container-fluid">
          
          <div class="row mb-2">
            
            <div class="col-sm-6">
              
              <h1>Edit Testimonial Header</h1>
            
            </div>

            <div class="col-sm-6">

              <ol class="breadcrumb float-sm-right">

                <li class="breadcrumb-item">Testimonial Header</li>

                <li class="breadcrumb-item active">Edit Testimonial Header</li>

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
              <form role="form" action="{{ route('testimonials.headers.update', $header->test_hd_id) }}" method="POST" enctype="multipart/form-data">

                @csrf

                @method('PATCH')

                <div class="card-body">

                  <div class="form-group">

                    <label for="test_hd_title">Testimonial Header Title</label>

                    @if ($errors->has('test_hd_title'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('test_hd_title') }}</span>

                    @endif

                    <input type="text" class="form-control" id="test_hd_title" name="test_hd_title"value="{{ $header->test_hd_title }}">

                  </div>

                  <div class="form-group">

                    <label for="test_hd_caption">Testimonial Header Caption</label>

                    @if ($errors->has('test_hd_caption'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('test_hd_caption') }}</span>

                    @endif

                    <textarea class="form-control" id="description" name="test_hd_caption" >  

                      {{ $header->test_hd_caption }}

                    </textarea>

                  </div>

                  <p class="font-weight-bold">Current Image</p>

                  <br>

                  <img src="{{ url('/public/assets/uploads/'.$header->test_hd_image) }}" alt="{{ $header->test_hd_title }}" class="img-thumbnail" width="200">

                  <br>

                  <div class="form-group mt-5">

                    <label for="test_hd_image">Testimonial Header Image</label>

                    @if ($errors->has('test_hd_image'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('test_hd_image') }}</span>

                    @endif

                    <div class="file-upload">

                      <div class="file-select">

                        <div class="file-select-button" id="fileName">Choose File</div>

                        <div class="file-select-name" id="noFile">No file chosen...</div> 

                        <input type="file" name="test_hd_image" id="chooseFile">

                      </div>

                    </div>

                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">

                  <button type="submit" class="btn btn-primary">Edit Testimonial Header</button>

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