@extends('admin.layouts.layout')

  @section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      
      <!-- Content Header (Page header) -->
      <section class="content-header">
        
        <div class="container-fluid">
          
          <div class="row mb-2">
            
            <div class="col-sm-6">
              
              <h1>Add Treatment</h1>
            
            </div>

            <div class="col-sm-6">

              <ol class="breadcrumb float-sm-right">

                <li class="breadcrumb-item">Treatment</li>

                <li class="breadcrumb-item active">Add Treatment</li>

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
              <form role="form" action="{{ route('treatments.store') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="card-body">

                  <div class="form-group">
                  
                    <label>Treatment Type</label>

                    @if ($errors->has('treat_type'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('treat_type') }}</span>

                    @endif
                  
                    <select class="form-control select2bs4" name="treat_type" style="width: 100%;">
                    
                      <option value="">- Choose Treatment Type -</option>

                      @foreach($treatment_types as $treatment_type)

                        <option value="{{ $treatment_type->treat_type_id }}">{{ $treatment_type->treat_type_name }}</option>

                      @endforeach
                    
                    </select>

                  </div>

                  <div class="form-group">

                    <label for="treat_name">Treatment Name</label>

                    @if ($errors->has('treat_name'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('treat_name') }}</span>

                    @endif

                    <input type="text" class="form-control" id="treat_name" name="treat_name" placeholder="Treatment Name" value="{{ old('treat_name') }}">

                  </div>

                  <div class="form-group">

                    <label for="treat_desc">Treatment Description</label>

                    @if ($errors->has('treat_desc'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('treat_desc') }}</span>

                    @endif

                    <textarea class="form-control" id="description" name="treat_desc">  

                      {{ old('treat_desc') }}

                    </textarea>

                  </div>

                  <label>Treatment Price</label>

                  @if ($errors->has('treat_price'))

                    <br>

                    <span class="text-danger font-weight-bold">{{ $errors->first('treat_price') }}</span>

                  @endif

                  <div class="input-group">

                    <div class="input-group-prepend mb-4">

                      <span class="input-group-text">Rp</span>

                    </div>

                    <input type="text" class="form-control" placeholder="Treatment Price" name="treat_price">

                  </div>

                  <div class="form-group">

                    <label for="treat_image">Treatment Image</label>

                    @if ($errors->has('treat_image'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('treat_image') }}</span>

                    @endif

                    <div class="file-upload">

                      <div class="file-select">

                        <div class="file-select-button" id="fileName">Choose File</div>

                        <div class="file-select-name" id="noFile">No file chosen...</div> 

                        <input type="file" name="treat_image" id="chooseFile">

                      </div>

                    </div>

                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">

                  <button type="submit" class="btn btn-primary text-white">Add Treatment</button>

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