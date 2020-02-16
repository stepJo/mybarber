@extends('admin.layouts.layout')

  @section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      
      <!-- Content Header (Page header) -->
      <section class="content-header">
        
        <div class="container-fluid">
          
          <div class="row mb-2">
            
            <div class="col-sm-6">
              
              <h1>Add About</h1>
            
            </div>

            <div class="col-sm-6">

              <ol class="breadcrumb float-sm-right">

                <li class="breadcrumb-item">About</li>

                <li class="breadcrumb-item active">Add About</li>

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
              <form role="form" action="{{ route('abouts.store') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="card-body">

                  <div class="form-group">

                    <label for="ab_title">About Title</label>

                    @if ($errors->has('ab_title'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('ab_title') }}</span>

                    @endif

                    <input type="text" class="form-control" id="ab_title" name="ab_title"placeholder="About Title" value="{{ old('ab_title') }}">

                  </div>

                  <div class="form-group">

                    <label for="ab_caption">About Caption</label>

                    @if ($errors->has('ab_caption'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('ab_caption') }}</span>

                    @endif

                    <input type="text" class="form-control" id="ab_caption" name="ab_caption"placeholder="About Caption" value="{{ old('ab_caption') }}">

                  </div>

                  <div class="form-group">

                    <label for="ab_desc">About Description</label>

                    @if ($errors->has('ab_desc'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('ab_desc') }}</span>

                    @endif

                    <textarea class="form-control" id="description" name="ab_desc">  

                      {{ old('ab_desc') }}

                    </textarea>

                  </div>

                  <div class="form-group">

                    <label for="ab_image">About Image</label>

                    @if ($errors->has('ab_image'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('ab_image') }}</span>

                    @endif

                    <div class="file-upload">

                      <div class="file-select">

                        <div class="file-select-button" id="fileName">Choose File</div>

                        <div class="file-select-name" id="noFile">No file chosen...</div> 

                        <input type="file" name="ab_image" id="chooseFile">

                      </div>

                    </div>

                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">

                  <button type="submit" class="btn btn-primary">Add About</button>

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