@extends('admin.layouts.layout')

  @section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      
      <!-- Content Header (Page header) -->
      <section class="content-header">
        
        <div class="container-fluid">
          
          <div class="row mb-2">
            
            <div class="col-sm-6">
              
              <h1>Edit Blog Header</h1>
            
            </div>

            <div class="col-sm-6">

              <ol class="breadcrumb float-sm-right">

                <li class="breadcrumb-item">Blog Header</li>

                <li class="breadcrumb-item active">Edit Blog Header</li>

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

                <h3 class="card-title text-white">Data</h3>

              </div>
              <!-- /.card-header -->

              <!-- form start -->
              <form role="form" action="{{ route('blogs.headers.update', $header->blog_hd_id) }}" method="POST" enctype="multipart/form-data">

                @csrf

                @method('PATCH')

                <div class="card-body">

                  <div class="form-group">

                    <label for="blog_hd_title">Blog Header Title</label>

                    @if ($errors->has('blog_hd_title'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('blog_hd_title') }}</span>

                    @endif

                    <input type="text" class="form-control" id="treat_hd_title" name="blog_hd_title" value="{{ $header->blog_hd_title }}">

                  </div>

                  <div class="form-group">

                    <label for="blog_hd_caption">Blog Header Caption</label>

                    @if ($errors->has('blog_hd_caption'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('blog_hd_caption') }}</span>

                    @endif

                    <textarea class="form-control" id="description" name="blog_hd_caption" >  

                      {{ $header->blog_hd_caption }}

                    </textarea>

                  </div>

                  <p class="font-weight-bold">Current Image</p>

                  <br>

                  <img src="{{ url('/public/assets/uploads/'.$header->blog_hd_image) }}" alt="{{ $header->blog_hd_image }}" class="img-thumbnail" width="200">

                  <br>

                  <div class="form-group mt-5">

                    <label for="blog_hd_image">Blog Header Image</label>

                    @if ($errors->has('blog_hd_image'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('blog_hd_image') }}</span>

                    @endif

                    <div class="file-upload">

                      <div class="file-select">

                        <div class="file-select-button" id="fileName">Choose File</div>

                        <div class="file-select-name" id="noFile">No file chosen...</div> 

                        <input type="file" name="blog_hd_image" id="chooseFile">

                      </div>

                    </div>

                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">

                  <button type="submit" class="btn btn-primary text-white">Edit Blog Header</button>

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