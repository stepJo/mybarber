@extends('admin.layouts.layout')

  @section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    
      <!-- Content Header (Page header) -->
      <section class="content-header">  

        <div class="container-fluid">

          <div class="row mb-2">

            <div class="col-sm-6">

              <h1>Gallery Headers</h1>

              <a href="{{ route('galleries.headers.create') }}" class="btn btn-success text-white mt-5 mb-1">

                <small>

                  <i class="fas fa-plus mr-1"></i>

                </small> 

                Add Gallery Header

              </a>

            </div>

            <div class="col-sm-6">

              <ol class="breadcrumb float-sm-right">

                <li class="breadcrumb-item active"></i> Gallery Headers</li>

              </ol>

            </div>

          </div>

        </div><!-- /.container-fluid -->

      </section>

      <!-- Main content -->
      <section class="content">

        <div class="card">

          <div class="card-header">

            <h3 class="card-title">Total : {{ count($gallery_headers) }}</h3>
          
          </div>
          <!-- /.card-header -->

          <div class="card-body">

            <table id="dataTable" class="table table-bordered table-hover">

              <thead>

                <tr>

                  <th>#</th>

                  <th>Title</th>

                  <th>Image</th>

                  <th>Preset</th>

                  <th>Action</th> 

                </tr>

              </thead>

              <tbody>

                @foreach($gallery_headers as $gallery_header)

                  <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $gallery_header->gal_hd_title }}</td>

                    <td>

                      <img src="{{ url('/public/assets/uploads/'.$gallery_header->gal_hd_image) }}" alt="{{ $gallery_header->gal_hd_title }}" class="img-thumbnail" width="200">

                    </td>

                    <td>

                      @if($gallery_header->gal_hd_active == 0)

                        <p class="text-danger font-weight-bold">Not Active</p>

                      @else

                        <p class="text-success font-weight-bold">Active</p>

                      @endif

                    </td>

                    <td>

                      <a href="{{ route('galleries.headers.edit', $gallery_header->gal_hd_id) }}"><i class="far fa-edit text-warning mr-1"></i></a>

                      @if(count($gallery_headers) > 1 && $gallery_header->gal_hd_active != 1)

                        <a href="#" data-toggle="modal" data-target="#deleteModal{{ $gallery_header->gal_hd_id }}"><i class="far fa-trash-alt text-danger"></i></a>

                      @endif

                      @if($gallery_header->gal_hd_active == 0)
                      
                        <a href="#" data-toggle="modal" data-target="#setActiveModal{{ $gallery_header->gal_hd_id }}"><i class="fas fa-toggle-off text-dark"></i></a>

                      @else

                        <a><i class="fas fa-toggle-on text-dark"></i></a>

                      @endif

                    </td>

                  </tr>

                  <div class="modal fade" id="deleteModal{{ $gallery_header->gal_hd_id }}">

                    <div class="modal-dialog">

                      <div class="modal-content">

                        <div class="modal-header">

                          <h4 class="modal-title">Gallery Header</h4>

                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                            <span aria-hidden="true">&times;</span>

                          </button>

                        </div>

                        <div class="modal-body">

                          <p>Are you sure want to delete this gallery header ?</p>

                        </div>

                        <div class="modal-footer justify-content-between">

                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

                          <form action="{{ route('galleries.headers.destroy', $gallery_header->gal_hd_id) }}" method="POST">

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

                  <div class="modal fade" id="setActiveModal{{ $gallery_header->gal_hd_id }}">

                    <div class="modal-dialog">

                      <div class="modal-content">

                        <div class="modal-header">

                          <h4 class="modal-title">Gallery Headers</h4>

                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                            <span aria-hidden="true">&times;</span>

                          </button>

                        </div>

                        <div class="modal-body">

                          <p>Are you sure want to use this Gallery header preset ?</p>

                        </div>

                        <div class="modal-footer justify-content-between">

                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

                          <form action="{{ route('galleries.headers.active', $gallery_header->gal_hd_id) }}" method="POST">

                            @csrf

                            <button type="submit" class="btn btn-dark">Use Preset</button>
                          
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