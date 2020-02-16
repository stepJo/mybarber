@extends('admin.layouts.layout')

  @section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      
      <!-- Content Header (Page header) -->
      <section class="content-header">
        
        <div class="container-fluid">
          
          <div class="row mb-2">
            
            <div class="col-sm-6">
              
              <h1>Add Blog Category</h1>
            
            </div>

            <div class="col-sm-6">

              <ol class="breadcrumb float-sm-right">

                <li class="breadcrumb-item">Blog Category</li>

                <li class="breadcrumb-item active">Add Blog Category</li>

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
              <form role="form" action="{{ route('blogs.categories.store') }}" method="POST">

                @csrf

                <div class="card-body">

                  <div class="form-group">

                    <label for="blog_cat_name">Blog Category Name</label>

                    @if ($errors->has('blog_cat_name'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('blog_cat_name') }}</span>

                    @endif

                    <input type="text" class="form-control" id="blog_cat_name" name="blog_cat_name" placeholder="Blog Category Name" value="{{ old('blog_cat_name') }}">

                  </div>


                </div>
                <!-- /.card-body -->

                <div class="card-footer">

                  <button type="submit" class="btn btn-primary text-white">Add Blog Category</button>

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