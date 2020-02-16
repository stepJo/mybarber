@extends('admin.layouts.layout')

  @section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      
      <!-- Content Header (Page header) -->
      <section class="content-header">
        
        <div class="container-fluid">
          
          <div class="row mb-2">
            
            <div class="col-sm-6">
              
              <h1>Add Gallery</h1>
            
            </div>

            <div class="col-sm-6">

              <ol class="breadcrumb float-sm-right">

                <li class="breadcrumb-item">Gallery</li>

                <li class="breadcrumb-item active">Add Gallery</li>

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

                <h3 class="card-title text-white">Data</h3>

              </div>
              <!-- /.card-header -->

              <!-- form start -->
              <form role="form" action="{{ route('galleries.store') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="card-body">

                  <div class="form-group">
                  
                    <label>Gallery Tag</label>

                    @if ($errors->has('gal_tag'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('gal_tag') }}</span>

                    @endif
                  
                    <select class="form-control select2bs4" name="gal_tag" style="width: 100%;">
                    
                      <option value="">- Choose Gallery Tag -</option>

                      @foreach($gallery_tags as $gallery_tag)

                        <option value="{{ $gallery_tag->gal_tag_id }}">{{ $gallery_tag->gal_tag_name }}</option>

                      @endforeach
                    
                    </select>

                  </div>

                  <div class="form-group">

                    <label for="gal_title">Gallery Title</label>

                    @if ($errors->has('gal_title'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('gal_title') }}</span>

                    @endif

                    <input type="text" class="form-control" id="gal_title" name="gal_title" placeholder="Gallery Title" value="{{ old('gal_title') }}">

                  </div>

                  <div class="form-group">

                    <label for="gal_image">Gallery Image</label>

                    @if ($errors->has('gal_image'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('gal_image') }}</span>

                    @endif

                    <div class="file-upload">

                      <div class="file-select">

                        <div class="file-select-button" id="fileName">Choose File</div>

                        <div class="file-select-name" id="noFile">No file chosen...</div> 

                        <input type="file" name="gal_image" id="chooseFile">

                      </div>

                    </div>

                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">

                  <button type="submit" class="btn btn-success text-white">Add Gallery</button>

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