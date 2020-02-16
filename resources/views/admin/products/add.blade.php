@extends('admin.layouts.layout')

  @section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      
      <!-- Content Header (Page header) -->
      <section class="content-header">
        
        <div class="container-fluid">
          
          <div class="row mb-2">
            
            <div class="col-sm-6">
              
              <h1>Add Product</h1>
            
            </div>

            <div class="col-sm-6">

              <ol class="breadcrumb float-sm-right">

                <li class="breadcrumb-item">Product</li>

                <li class="breadcrumb-item active">Add Product</li>

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
              <form role="form" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="card-body">

                  <div class="form-group">

                    <label for="prd_name">Product Name</label>

                    @if ($errors->has('prd_name'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('prd_name') }}</span>

                    @endif

                    <input type="text" class="form-control" id="prd_name" name="prd_name" placeholder="Product Name" value="{{ old('prd_name') }}">

                  </div>

                  <label>Product Price</label>

                  @if ($errors->has('prd_price'))

                    <br>

                    <span class="text-danger font-weight-bold">{{ $errors->first('prd_price') }}</span>

                  @endif

                  <div class="input-group">

                    <div class="input-group-prepend mb-4">

                      <span class="input-group-text">Rp</span>

                    </div>

                    <input type="text" class="form-control" placeholder="Product Price" name="prd_price">

                  </div>

                  <div class="form-group">

                    <label for="prd_image">Product Image</label>

                    @if ($errors->has('prd_image'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('prd_image') }}</span>

                    @endif

                    <div class="file-upload">

                      <div class="file-select">

                        <div class="file-select-button" id="fileName">Choose File</div>

                        <div class="file-select-name" id="noFile">No file chosen...</div> 

                        <input type="file" name="prd_image" id="chooseFile">

                      </div>

                    </div>

                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">

                  <button type="submit" class="btn btn-primary text-white">Add Product</button>

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