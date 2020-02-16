@extends('admin.layouts.layout')

  @section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      
      <!-- Content Header (Page header) -->
      <section class="content-header">
        
        <div class="container-fluid">
          
          <div class="row mb-2">
            
            <div class="col-sm-6">
              
              <h1>Edit Gallery Tag</h1>
            
            </div>

            <div class="col-sm-6">

              <ol class="breadcrumb float-sm-right">

                <li class="breadcrumb-item">Gallery Tag</li>

                <li class="breadcrumb-item active">Edit Gallery Tag</li>

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
              <form role="form" action="{{ route('galleries.tags.update', $tag->gal_tag_id) }}" method="POST">

                @csrf

                @method('PATCH')

                <div class="card-body">

                  <div class="form-group">

                    <label for="gal_tag_name">Gallery Tag Name</label>

                    @if ($errors->has('gal_tag_name'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('gal_tag_name') }}</span>

                    @endif

                    <input type="text" class="form-control" id="gal_tag_name" name="gal_tag_name" value="{{ $tag->gal_tag_name }}">

                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">

                  <button type="submit" class="btn btn-success">Edit Gallery Tag</button>

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