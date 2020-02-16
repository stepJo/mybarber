@extends('admin.layouts.layout')

  @section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      
      <!-- Content Header (Page header) -->
      <section class="content-header">
        
        <div class="container-fluid">
          
          <div class="row mb-2">
            
            <div class="col-sm-6">
              
              <h1>Add Reservation Header</h1>
            
            </div>

            <div class="col-sm-6">

              <ol class="breadcrumb float-sm-right">

                <li class="breadcrumb-item">Reservation Header</li>

                <li class="breadcrumb-item active">Add Reservation Header</li>

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
            <div class="card card-secondary">

              <div class="card-header">

                <h3 class="card-title">Data</h3>

              </div>
              <!-- /.card-header -->

              <!-- form start -->
              <form role="form" action="{{ route('reservations.headers.store') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="card-body">

                  <div class="form-group">

                    <label for="rsv_hd_title">Reservation Header Title</label>

                    @if ($errors->has('rsv_hd_title'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('rsv_hd_title') }}</span>

                    @endif

                    <input type="text" class="form-control" id="rsv_hd_title" name="rsv_hd_title" placeholder="Reservation Header Title" value="{{ old('rsv_hd_title') }}">

                  </div>

                  <div class="form-group">

                    <label for="rsv_hd_caption">Reservation Header Caption</label>

                    @if ($errors->has('rsv_hd_caption'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('rsv_hd_caption') }}</span>

                    @endif

                    <textarea class="form-control" id="description" name="rsv_hd_caption">  

                      {{ old('rsv_hd_caption') }}

                    </textarea>

                  </div>

                  <div class="form-group">

                    <label for="rsv_hd_image">Reservation Header Image</label>

                    @if ($errors->has('rsv_hd_image'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('rsv_hd_image') }}</span>

                    @endif

                    <div class="file-upload">

                      <div class="file-select">

                        <div class="file-select-button" id="fileName">Choose File</div>

                        <div class="file-select-name" id="noFile">No file chosen...</div> 

                        <input type="file" name="rsv_hd_image" id="chooseFile">

                      </div>

                    </div>

                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">

                  <button type="submit" class="btn btn-secondary">Add Reservation Header</button>

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