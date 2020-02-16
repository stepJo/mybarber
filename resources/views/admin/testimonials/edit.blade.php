@extends('admin.layouts.layout')

  @section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      
      <!-- Content Header (Page header) -->
      <section class="content-header">
        
        <div class="container-fluid">
          
          <div class="row mb-2">
            
            <div class="col-sm-6">
              
              <h1>Edit Testimonial</h1>
            
            </div>

            <div class="col-sm-6">

              <ol class="breadcrumb float-sm-right">

                <li class="breadcrumb-item">Testimonial</li>

                <li class="breadcrumb-item active">Edit Testimonial</li>

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
              <form role="form" action="{{ route('testimonials.update', $testimonial->test_id) }}" method="POST" enctype="multipart/form-data">

                @csrf

                @method('PATCH')

                <div class="card-body">

                  <div class="form-group">

                    <label for="test_name">Testimonial Name</label>

                    @if ($errors->has('test_name'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('test_name') }}</span>

                    @endif

                    <input type="text" class="form-control" id="test_name" name="test_name"value="{{ $testimonial->test_name }}">

                  </div>

                  <div class="form-group">

                    <label for="test_caption">Testimonial Caption</label>

                    @if ($errors->has('test_caption'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('test_caption') }}</span>

                    @endif

                    <textarea class="form-control" id="description" name="test_caption" >  

                      {{ $testimonial->test_caption }}

                    </textarea>

                  </div>

                  <p class="font-weight-bold">Current Image</p>

                  <br>

                  <img src="{{ url('/public/assets/uploads/'.$testimonial->test_image) }}" alt="{{ $testimonial->test_name }}" class="img-thumbnail" width="200">

                  <br>

                  <div class="form-group mt-5">

                    <label for="test_image">Testimonial Image</label>

                    @if ($errors->has('test_image'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('test_image') }}</span>

                    @endif

                    <div class="file-upload">

                      <div class="file-select">

                        <div class="file-select-button" id="fileName">Choose File</div>

                        <div class="file-select-name" id="noFile">No file chosen...</div> 

                        <input type="file" name="test_image" id="chooseFile">

                      </div>

                    </div>

                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">

                  <button type="submit" class="btn btn-primary">Edit Testimonial</button>

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