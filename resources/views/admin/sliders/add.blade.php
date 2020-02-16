@extends('admin.layouts.layout')

  @section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      
      <!-- Content Header (Page header) -->
      <section class="content-header">
        
        <div class="container-fluid">
          
          <div class="row mb-2">
            
            <div class="col-sm-6">
              
              <h1>Add Slider</h1>
            
            </div>

            <div class="col-sm-6">

              <ol class="breadcrumb float-sm-right">

                <li class="breadcrumb-item">Slider</li>

                <li class="breadcrumb-item active">Add Slider</li>

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
            <div class="card card-success">

              <div class="card-header">

                <h3 class="card-title">Data</h3>

              </div>
              <!-- /.card-header -->

              <!-- form start -->
              <form role="form" action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="card-body">

                  <div class="form-group">

                    <label for="slider_title">Slider Title</label>

                    @if ($errors->has('slider_title'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('slider_title') }}</span>

                    @endif

                    <input type="text" class="form-control" id="slider_title" name="slider_title" placeholder="Slider Title" value="{{ old('slider_title') }}">

                  </div>

                  <div class="form-group">

                    <label for="slider_caption">Slider Caption</label>

                    @if ($errors->has('slider_caption'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('slider_caption') }}</span>

                    @endif

                    <textarea class="form-control" id="description" name="slider_caption">  

                      {{ old('slider_caption') }}

                    </textarea>

                  </div>

                  <div class="form-group">

                    <label for="slider_image">Slider Image</label>

                    @if ($errors->has('slider_image'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('slider_image') }}</span>

                    @endif

                    <div class="file-upload">

                      <div class="file-select">

                        <div class="file-select-button" id="fileName">Choose File</div>

                        <div class="file-select-name" id="noFile">No file chosen...</div> 

                        <input type="file" name="slider_image" id="chooseFile">

                      </div>

                    </div>

                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">

                  <button type="submit" class="btn btn-success">Add Slider</button>

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