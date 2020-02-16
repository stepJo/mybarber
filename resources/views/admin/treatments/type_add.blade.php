@extends('admin.layouts.layout')

  @section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      
      <!-- Content Header (Page header) -->
      <section class="content-header">
        
        <div class="container-fluid">
          
          <div class="row mb-2">
            
            <div class="col-sm-6">
              
              <h1>Add Treatment Type</h1>
            
            </div>

            <div class="col-sm-6">

              <ol class="breadcrumb float-sm-right">

                <li class="breadcrumb-item">Treatment Type</li>

                <li class="breadcrumb-item active">Add Treatment Type</li>

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
              <form role="form" action="{{ route('treatments.types.store') }}" method="POST">

                @csrf

                <div class="card-body">

                  <div class="form-group">

                    <label for="treat_type_name">Treatment Type Name</label>

                    @if ($errors->has('treat_type_name'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('treat_type_name') }}</span>

                    @endif

                    <input type="text" class="form-control" id="treat_type_name" name="treat_type_name" placeholder="Treatment Type Name" value="{{ old('treat_type_name') }}">

                  </div>


                </div>
                <!-- /.card-body -->

                <div class="card-footer">

                  <button type="submit" class="btn btn-primary text-white">Add Treatment Type</button>

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