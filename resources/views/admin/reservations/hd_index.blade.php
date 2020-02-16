@extends('admin.layouts.layout')

  @section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    
      <!-- Content Header (Page header) -->
      <section class="content-header">  

        <div class="container-fluid">

          <div class="row mb-2">

            <div class="col-sm-6">

              <h1>Reservation Headers</h1>

              <a href="{{ route('reservations.headers.create') }}" class="btn btn-secondary text-white mt-5 mb-1">

                <small>

                  <i class="fas fa-plus mr-1"></i>

                </small> 

                Add Reservation Header

              </a>

            </div>

            <div class="col-sm-6">

              <ol class="breadcrumb float-sm-right">

                <li class="breadcrumb-item active"></i> Reservation Headers</li>

              </ol>

            </div>

          </div>

        </div><!-- /.container-fluid -->

      </section>

      <!-- Main content -->
      <section class="content">

        <div class="card">

          <div class="card-header">

            <h3 class="card-title">Total : {{ count($reservation_headers) }}</h3>
          
          </div>
          <!-- /.card-header -->

          <div class="card-body">

            <table id="customerTable" class="table table-bordered table-hover">

              <thead>

                <tr>

                  <th>#</th>

                  <th width="200">Title</th>

                  <th width="500">Caption</th>

                  <th>Image</th>

                  <th>Preset</th>

                  <th>Action</th> 

                </tr>

              </thead>

              <tbody>

                @foreach($reservation_headers as $reservation_header)

                  <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $reservation_header->rsv_hd_title }}</td>

                    <td>{!! $reservation_header->rsv_hd_caption !!}</td>

                    <td>

                      <img src="{{ url('/public/assets/uploads/'.$reservation_header->rsv_hd_image) }}" alt="{{ $reservation_header->rsv_hd_title }}" class="img-thumbnail" width="200">

                    </td>

                    <td>

                      @if($reservation_header->rsv_hd_active == 0)

                        <p class="text-danger font-weight-bold">Not Active</p>

                      @else

                        <p class="text-success font-weight-bold">Active</p>

                      @endif

                    </td>

                    <td>

                      <a href="{{ route('reservations.headers.edit', $reservation_header->rsv_hd_id) }}"><i class="far fa-edit text-warning mr-1"></i></a>

                      @if(count($reservation_headers) > 1 && $reservation_header->rsv_hd_active != 1)

                        <a href="#" data-toggle="modal" data-target="#deleteModal{{ $reservation_header->rsv_hd_id }}"><i class="far fa-trash-alt text-danger"></i></a>

                      @endif

                      @if($reservation_header->rsv_hd_active == 0)
                      
                        <a href="#" data-toggle="modal" data-target="#setActiveModal{{ $reservation_header->rsv_hd_id }}"><i class="fas fa-toggle-off text-dark"></i></a>

                      @else

                        <a><i class="fas fa-toggle-on text-dark"></i></a>

                      @endif

                    </td>

                  </tr>

                  <div class="modal fade" id="deleteModal{{ $reservation_header->rsv_hd_id }}">

                    <div class="modal-dialog">

                      <div class="modal-content">

                        <div class="modal-header">

                          <h4 class="modal-title">Reservation Header</h4>

                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                            <span aria-hidden="true">&times;</span>

                          </button>

                        </div>

                        <div class="modal-body">

                          <p>Are you sure want to delete this reservation header ?</p>

                        </div>

                        <div class="modal-footer justify-content-between">

                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

                          <form action="{{ route('reservations.headers.destroy', $reservation_header->rsv_hd_id) }}" method="POST">

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

                  <div class="modal fade" id="setActiveModal{{ $reservation_header->rsv_hd_id }}">

                    <div class="modal-dialog">

                      <div class="modal-content">

                        <div class="modal-header">

                          <h4 class="modal-title">Reservation Headers</h4>

                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                            <span aria-hidden="true">&times;</span>

                          </button>

                        </div>

                        <div class="modal-body">

                          <p>Are you sure want to use this reservation header preset ?</p>

                        </div>

                        <div class="modal-footer justify-content-between">

                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

                          <form action="{{ route('reservations.headers.active', $reservation_header->rsv_hd_id) }}" method="POST">

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