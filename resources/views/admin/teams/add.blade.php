@extends('admin.layouts.layout')

  @section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      
      <!-- Content Header (Page header) -->
      <section class="content-header">
        
        <div class="container-fluid">
          
          <div class="row mb-2">
            
            <div class="col-sm-6">
              
              <h1>Add Team</h1>
            
            </div>

            <div class="col-sm-6">

              <ol class="breadcrumb float-sm-right">

                <li class="breadcrumb-item">Team</li>

                <li class="breadcrumb-item active">Add Team</li>

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
              <form role="form" action="{{ route('teams.store') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="card-body">

                  <div class="form-group">

                    <label for="tm_name">Team Name</label>

                    @if ($errors->has('tm_name'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('tm_name') }}</span>

                    @endif

                    <input type="text" class="form-control" id="tm_name" name="tm_name"placeholder="Team Name" value="{{ old('tm_name') }}">

                  </div>

                  <div class="form-group">

                    <label for="tm_job">Team Job</label>

                    @if ($errors->has('tm_job'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('tm_job') }}</span>

                    @endif

                    <input type="text" class="form-control" id="tm_job" name="tm_job"placeholder="Team Job" value="{{ old('tm_job') }}">

                  </div>

                  <div class="form-group">

                    <label for="tm_profile">Team Profile</label>

                    @if ($errors->has('tm_profile'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('tm_profile') }}</span>

                    @endif

                    <textarea class="form-control" id="description" name="tm_profile">  

                      {{ old('tm_profile') }}

                    </textarea>

                  </div>

                  <div class="form-group">

                    <label for="tm_image">Team Image</label>

                    @if ($errors->has('tm_image'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('tm_image') }}</span>

                    @endif

                    <div class="file-upload">

                      <div class="file-select">

                        <div class="file-select-button" id="fileName">Choose File</div>

                        <div class="file-select-name" id="noFile">No file chosen...</div> 

                        <input type="file" name="tm_image" id="chooseFile">

                      </div>

                    </div>

                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">

                  <button type="submit" class="btn btn-primary">Add Team</button>

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