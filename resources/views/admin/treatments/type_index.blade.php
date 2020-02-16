@extends('admin.layouts.layout')

  @section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    
      <!-- Content Header (Page header) -->
      <section class="content-header">  

        <div class="container-fluid">

          <div class="row mb-2">

            <div class="col-sm-6">

              <h1>Treatment Types</h1>

              <a href="{{ route('treatments.types.create') }}" class="btn btn-primary text-white mt-5 mb-1">

                <small>

                  <i class="fas fa-plus mr-1"></i>

                </small> 

                Add Treatment Type

              </a>

            </div>

            <div class="col-sm-6">

              <ol class="breadcrumb float-sm-right">

                <li class="breadcrumb-item active"></i> Treatment Types</li>

              </ol>

            </div>

          </div>

        </div><!-- /.container-fluid -->

      </section>

      <!-- Main content -->
      <section class="content">

        <div class="card">

          <div class="card-header">

            <h3 class="card-title">Total : {{ count($treatment_types) }}</h3>
          
          </div>
          <!-- /.card-header -->

          <div class="card-body">

            <table id="dataTable" class="table table-bordered table-hover">

              <thead>

                <tr>

                  <th>#</th>

                  <th>Name</th>

                  <th>Treatment</th>

                  <th>Action</th> 

                </tr>

              </thead>

              <tbody>

                @foreach($treatment_types as $treatment_type)

                  <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $treatment_type->treat_type_name }}</td>

                    <td class="text-secondary">{{ $treatment_type->treatments->count() }} Treatments</td>

                    <td>
                      
                      <a href="{{ route('treatments.types.edit', $treatment_type->treat_type_id) }}"><i class="far fa-edit text-warning mr-1"></i></a>

                      <a href="#" data-toggle="modal" data-target="#deleteModal{{ $treatment_type->treat_type_id }}"><i class="far fa-trash-alt text-danger"></i></a>

                    </td>

                  </tr>

                  <div class="modal fade" id="deleteModal{{ $treatment_type->treat_type_id }}">

                    <div class="modal-dialog">

                      <div class="modal-content">

                        <div class="modal-header">

                          <h4 class="modal-title">Treatment Types</h4>

                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                            <span aria-hidden="true">&times;</span>

                          </button>

                        </div>

                        <div class="modal-body">

                          <p>Are you sure want to delete this treatment types ? All related treatment will be deleted</p>

                        </div>

                        <div class="modal-footer justify-content-between">

                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

                          <form action="{{ route('treatments.types.destroy', $treatment_type->treat_type_id) }}", method="POST">

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