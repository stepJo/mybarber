@extends('admin.layouts.layout')

  @section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      
      <!-- Content Header (Page header) -->
      <section class="content-header">
        
        <div class="container-fluid">
          
          <div class="row mb-2">
            
            <div class="col-sm-6">
              
              <h1>Edit Team Header</h1>
            
            </div>

            <div class="col-sm-6">

              <ol class="breadcrumb float-sm-right">

                <li class="breadcrumb-item">Team Header</li>

                <li class="breadcrumb-item active">Edit Team Header</li>

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
              <form role="form" action="{{ route('teams.headers.update', $header->tm_hd_id) }}" method="POST">

                @csrf

                @method('PATCH')

                <div class="card-body">

                  <div class="form-group">

                    <label for="tm_hd_title">Team Header Title</label>

                    @if ($errors->has('tm_hd_title'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('tm_hd_title') }}</span>

                    @endif

                    <input type="text" class="form-control" id="tm_hd_title" name="tm_hd_title" value="{{ $header->tm_hd_title }}">

                  </div>

                  <div class="form-group">

                    <label for="tm_hd_caption">Team Header Caption</label>

                    @if ($errors->has('tm_hd_caption'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('tm_hd_caption') }}</span>

                    @endif

                    <textarea class="form-control" id="description" name="tm_hd_caption" >  

                      {{ $header->tm_hd_caption }}

                    </textarea>

                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">

                  <button type="submit" class="btn btn-primary">Edit Team Header</button>

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