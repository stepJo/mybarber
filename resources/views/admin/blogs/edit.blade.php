@extends('admin.layouts.layout')

  @section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      
      <!-- Content Header (Page header) -->
      <section class="content-header">
        
        <div class="container-fluid">
          
          <div class="row mb-2">
            
            <div class="col-sm-6">
              
              <h1>Edit Blog</h1>
            
            </div>

            <div class="col-sm-6">

              <ol class="breadcrumb float-sm-right">

                <li class="breadcrumb-item">Blog</li>

                <li class="breadcrumb-item active">Edit Blog</li>

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
              <form role="form" action="{{ route('blogs.update', $blog->blog_id) }}" method="POST" enctype="multipart/form-data">

                @csrf

                @method('PATCH')

                <div class="card-body">

                  <div class="form-group">

                    <label for="blog_title">Blog Title</label>

                    @if ($errors->has('blog_title'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('blog_title') }}</span>

                    @endif

                    <input type="text" class="form-control" id="blog_title" name="blog_title" value="{{ $blog->blog_title }}">

                  </div>

                  <div class="form-group">
                  
                    <label>Blog Category</label>

                    @if ($errors->has('blog_category'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('blog_category') }}</span>

                    @endif
                  
                    <select class="form-control select2bs4" name="blog_category" style="width: 100%;">
            
                      @foreach($blog_categories as $blog_category)

                        @if($blog_category->blog_cat_id == $blog->blog_cat_id)
                        
                          <option value="{{ $blog_category->blog_cat_id }}" selected>{{ $blog_category->blog_cat_name }}</option>
                        
                        @else

                          <option value="{{ $blog_category->blog_cat_id }}">{{ $blog_category->blog_cat_name }}</option>

                        @endif

                      @endforeach
                    
                    </select>

                  </div>

                  <div class="form-group">

                    <label for="blog_content">Blog Content</label>

                    @if ($errors->has('blog_content'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('blog_content') }}</span>

                    @endif

                    <textarea class="form-control" id="description" name="blog_content">  

                      {{ $blog->blog_content }}

                    </textarea>

                  </div>

                  <div class="form-group">

                    <label for="blog_author">Blog Author</label>

                    @if ($errors->has('blog_author'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('blog_author') }}</span>

                    @endif

                    <input type="text" class="form-control" id="blog_author" name="blog_author" value="{{ $blog->blog_author }}">

                  </div>

                  <p class="font-weight-bold">Current Image</p>

                  <br>

                  <img src="{{ url('/public/assets/uploads/'.$blog->blog_image) }}" alt="{{ $blog->blog_title }}" class="img-thumbnail" width="200">

                  <br>

                  <div class="form-group mt-5">

                    <label for="blog_image">Blog Image</label>

                    @if ($errors->has('blog_image'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('blog_image') }}</span>

                    @endif

                    <div class="file-upload">

                      <div class="file-select">

                        <div class="file-select-button" id="fileName">Choose File</div>

                        <div class="file-select-name" id="noFile">No file chosen...</div> 

                        <input type="file" name="blog_image" id="chooseFile">

                      </div>

                    </div>

                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">

                  <button type="submit" class="btn btn-primary text-white">Edit Blog</button>

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