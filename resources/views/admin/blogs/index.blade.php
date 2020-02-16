@extends('admin.layouts.layout')

  @section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    
      <!-- Content Header (Page header) -->
      <section class="content-header">  

        <div class="container-fluid">

          <div class="row mb-2">

            <div class="col-sm-6">

              <h1>Blogs</h1>

              <a href="{{ route('blogs.create') }}" class="btn btn-primary text-white mt-5 mb-1">

                <small>

                  <i class="fas fa-plus mr-1"></i>

                </small> 

                Add Blog

              </a>

            </div>

            <div class="col-sm-6">

              <ol class="breadcrumb float-sm-right">

                <li class="breadcrumb-item active"></i> Blogs</li>

              </ol>

            </div>

          </div>

        </div><!-- /.container-fluid -->

      </section>

      <!-- Main content -->
      <section class="content">

        <div class="card">

          <div class="card-header">

            <h3 class="card-title">Total : {{ count($blogs) }}</h3>
          
          </div>
          <!-- /.card-header -->

          <div class="card-body">

            <table id="dataTable" class="table table-bordered table-hover">

              <thead>

                <tr>

                  <th>#</th>

                  <th width="100">Category</th>

                  <th width="200">Title</th>

                  <th width="300">Content</th>

                  <th width="100">Author</th>

                  <th>Image</th>

                  <th>Post Date</th>

                  <th>Action</th> 

                </tr>

              </thead>

              <tbody>

                @foreach($blogs as $blog)

                  <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $blog->blogCategory->blog_cat_name }}</td>

                    <td>{{ $blog->blog_title }}</td>

                    <td>{!! $blog->blog_content !!}</td>

                    <td>{{ $blog->blog_author }}</td>

                    <td>
                      
                      <img src="{{ url('/public/assets/uploads/'.$blog->blog_image) }}" alt="{{ $blog->blog_title }}" class="img-thumbnail" width="200">

                    </td>

                    <td>{{ date('d F Y', strtotime($blog->blog_post_date)) }}</td>

                    <td>

                      <a href="{{ route('blogs.edit', $blog->blog_id) }}"><i class="far fa-edit text-warning mr-1"></i></a>

                      <a href="#" data-toggle="modal" data-target="#deleteModal{{ $blog->blog_id }}"><i class="far fa-trash-alt text-danger"></i></a>

                    </td>

                  </tr>

                  <div class="modal fade" id="deleteModal{{ $blog->blog_id }}">

                    <div class="modal-dialog">

                      <div class="modal-content">

                        <div class="modal-header">

                          <h4 class="modal-title">Blog</h4>

                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                            <span aria-hidden="true">&times;</span>

                          </button>

                        </div>

                        <div class="modal-body">

                          <p>Are you sure want to delete this blog ?</p>

                        </div>

                        <div class="modal-footer justify-content-between">

                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

                          <form action="{{ route('blogs.destroy', $blog->blog_id) }}" method="POST">

                            @csrf

                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Delete</button>
                          
                          </form>

                        </div>

                      </div>
                      <!-- /.modal-content -->

                    </div>
                    <!-- /.modal-dialog -->

                  </div>
                  <!-- /.modal -->

                @endforeach
                 
              </tbody>
                    
            </table>

          </div>
          <!-- /.card-body -->

        </div>
        <!-- /.card -->

      </section>
      <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->

  @endsection