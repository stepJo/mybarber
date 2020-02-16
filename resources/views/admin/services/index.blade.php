@extends('admin.layouts.layout')

  @section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    
      <!-- Content Header (Page header) -->
      <section class="content-header">  

        <div class="container-fluid">

          <div class="row mb-2">

            <div class="col-sm-6">

              <h1>Services</h1>

              <a href="{{ route('services.create') }}" class="btn bg-primary mt-5 mb-1">

                <small>

                  <i class="fas fa-plus mr-1"></i>

                </small> 

                Add Service

              </a>

            </div>

            <div class="col-sm-6">

              <ol class="breadcrumb float-sm-right">

                <li class="breadcrumb-item active"></i> Services</li>

              </ol>

            </div>

          </div>

        </div><!-- /.container-fluid -->

      </section>

      <!-- Main content -->
      <section class="content">

        <div class="card">

          <div class="card-header">

            <h3 class="card-title">Total : {{ count($services) }}</h3>
          
          </div>
          <!-- /.card-header -->

          <div class="card-body">

            <table id="dataTable" class="table table-bordered table-hover">

              <thead>

                <tr>

                  <th>#</th>

                  <th>Name</th>

                  <th width="600">Description</th>

                  <th>Image</th>

                  <th>Action</th> 

                </tr>

              </thead>

              <tbody>

                @foreach($services as $service)

                  <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $service->serv_name }}</td>

                    <td>{!! $service->serv_desc !!}</td>

                    <td>

                      <img src="{{ url('/public/assets/uploads/'.$service->serv_image) }}" alt="{{ $service->serv_name }}" class="img-thumbnail" width="200">

                    </td>

                    <td>
                      
                      <a href="{{ route('services.edit', $service->serv_id) }}"><i class="far fa-edit text-warning mr-1"></i></a>

                      <a href="#" data-toggle="modal" data-target="#deleteModal{{ $service->serv_id }}"><i class="far fa-trash-alt text-danger"></i></a>

                    </td>

                  </tr>

                  <div class="modal fade" id="deleteModal{{ $service->serv_id }}">

                    <div class="modal-dialog">

                      <div class="modal-content">

                        <div class="modal-header">

                          <h4 class="modal-title">Services</h4>

                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                            <span aria-hidden="true">&times;</span>

                          </button>

                        </div>

                        <div class="modal-body">

                          <p>Are you sure want to delete this service ?</p>

                        </div>

                        <div class="modal-footer justify-content-between">

                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

                          <form action="{{ route('services.destroy', $service->serv_id) }}", method="POST">

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