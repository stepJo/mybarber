@extends('admin.layouts.layout')

  @section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    
      <!-- Content Header (Page header) -->
      <section class="content-header">  

        <div class="container-fluid">

          <div class="row mb-2">

            <div class="col-sm-6">

              <h1>Gallery Tags</h1>

              <a href="{{ route('galleries.tags.create') }}" class="btn bg-success stext-white mt-5 mb-1">

                <small>

                  <i class="fas fa-plus mr-1"></i>

                </small> 

                Add Gallery Tag

              </a>

            </div>

            <div class="col-sm-6">

              <ol class="breadcrumb float-sm-right">

                <li class="breadcrumb-item active"></i> Gallery Tags</li>

              </ol>

            </div>

          </div>

        </div><!-- /.container-fluid -->

      </section>

      <!-- Main content -->
      <section class="content">

        <div class="card">

          <div class="card-header">

            <h3 class="card-title">Total : {{ count($gallery_tags) }}</h3>
          
          </div>
          <!-- /.card-header -->

          <div class="card-body">

            <table id="dataTable" class="table table-bordered table-hover">

              <thead>

                <tr>

                  <th>#</th>

                  <th>Tag</th>

                  <th>Gallery</th>

                  <th>Action</th> 

                </tr>

              </thead>

              <tbody>

                @foreach($gallery_tags as $gallery_tag)

                  <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $gallery_tag->gal_tag_name }}</td>

                    <td class="text-secondary">{{ $gallery_tag->galleries->count() }} Images</td>

                    <td>
                      
                      <a href="{{ route('galleries.tags.edit', $gallery_tag->gal_tag_id) }}"><i class="far fa-edit text-warning mr-1"></i></a>

                      <a href="#" data-toggle="modal" data-target="#deleteModal{{ $gallery_tag->gal_tag_id }}"><i class="far fa-trash-alt text-danger"></i></a>

                    </td>

                  </tr>

                  <div class="modal fade" id="deleteModal{{ $gallery_tag->gal_tag_id }}">

                    <div class="modal-dialog">

                      <div class="modal-content">

                        <div class="modal-header">

                          <h4 class="modal-title">Gallery Tags</h4>

                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                            <span aria-hidden="true">&times;</span>

                          </button>

                        </div>

                        <div class="modal-body">

                          <p>Are you sure want to delete this gallery tag ? All related gallery will be deleted</p>

                        </div>

                        <div class="modal-footer justify-content-between">

                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

                          <form action="{{ route('galleries.tags.destroy', $gallery_tag->gal_tag_id) }}", method="POST">

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