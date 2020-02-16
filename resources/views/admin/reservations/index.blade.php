@extends('admin.layouts.layout')

  @section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    
      <!-- Content Header (Page header) -->
      <section class="content-header">  

        <div class="container-fluid">

          <div class="row mb-2">

            <div class="col-sm-6">

              <h1>Reservations</h1>

            </div>

            <div class="col-sm-6">

              <ol class="breadcrumb float-sm-right">

                <li class="breadcrumb-item active"></i> Reservations</li>

              </ol>

            </div>

          </div>

        </div><!-- /.container-fluid -->

      </section>

      <!-- Main content -->
      <section class="content">

        <div class="row">

          <div class="col-md-6">

            <div class="card">

              <div class="card-header bg-success">

                <p class="font-weight-bold">Finish Reservations</p>

                <h3 class="card-title text-dark font-weight-bold">Total : {{ count($finish_reservations) }}</h3>
              
              </div>
              <!-- /.card-header -->

              <div class="card-body">

                <table id="reservationTable" class="table table-bordered table-hover">

                  <thead>

                    <tr>

                      <th>#</th>

                      <th>Name</th>

                      <th>Date</th>

                      <th>Time</th>

                      <th>Status</th>

                      <th>Action</th> 

                    </tr>

                  </thead>

                  <tbody>

                    @foreach($finish_reservations as $reservation)

                      <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $reservation->rsv_name }}</td>

                        <td>{{ date('d F Y', strtotime($reservation->rsv_date)) }}</td>

                        <td>{{ date('h:i a', strtotime($reservation->rsv_time)) }}</td>

                        <td>

                          @if($reservation->rsv_status == 0)

                            <span class="badge badge-warning">Pending</span>

                          @elseif($reservation->rsv_status == 1)

                            <span class="badge badge-info">Confirm</span>

                          @elseif($reservation->rsv_status == 2)

                            <span class="badge badge-danger">Dismiss</span>

                          @else

                            <span class="badge badge-success">Finish</span>

                          @endif   

                        </td>            

                        <td>

                          <a href="{{ route('reservations.show', $reservation->rsv_id) }}"><i class="fas fa-external-link-alt mr-1 text-primary"></i></a>

                          <a href="#" data-toggle="modal" data-target="#deleteModal{{ $reservation->rsv_id }}"><i class="far fa-trash-alt text-danger"></i></a>

                        </td>

                      </tr>

                      <div class="modal fade" id="deleteModal{{ $reservation->rsv_id }}">

                        <div class="modal-dialog">

                          <div class="modal-content">

                            <div class="modal-header">

                              <h4 class="modal-title">Reservations</h4>

                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                <span aria-hidden="true">&times;</span>

                              </button>

                            </div>

                            <div class="modal-body">

                              <p>Are you sure want to delete this reservation ?</p>

                            </div>

                            <div class="modal-footer justify-content-between">

                              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

                              <form action="{{ route('reservations.destroy', $reservation->rsv_id) }}" method="POST">

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

          </div>

          <div class="col-md-6">

            <div class="card">

              <div class="card-header bg-danger">

                <p class="font-weight-bold">Cancel Reservations</p>

                <h3 class="card-title text-dark font-weight-bold">Total : {{ count($cancel_reservations) }}</h3>
              
              </div>
              <!-- /.card-header -->

              <div class="card-body">

                <table id="reservationTable3" class="table table-bordered table-hover">

                  <thead>

                    <tr>

                      <th>#</th>

                      <th>Name</th>

                      <th>Date</th>

                      <th>Time</th>

                      <th>Status</th>

                      <th>Action</th> 

                    </tr>

                  </thead>

                  <tbody>

                    @foreach($cancel_reservations as $reservation)

                      <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $reservation->rsv_name }}</td>

                        <td>{{ date('d F Y', strtotime($reservation->rsv_date)) }}</td>

                        <td>{{ date('h:i a', strtotime($reservation->rsv_time)) }}</td>

                        <td>

                          @if($reservation->rsv_status == 0)

                            <span class="badge badge-warning">Pending</span>

                          @elseif($reservation->rsv_status == 1)

                            <span class="badge badge-info">Confirm</span>

                          @elseif($reservation->rsv_status == 2)

                            <span class="badge badge-danger">Dismiss</span>

                          @else

                            <span class="badge badge-success">Finish</span>

                          @endif   

                        </td>            

                        <td>

                          <a href="{{ route('reservations.show', $reservation->rsv_id) }}"><i class="fas fa-external-link-alt mr-1 text-primary"></i></i></a>

                          <a href="#" data-toggle="modal" data-target="#deleteModal{{ $reservation->rsv_id }}"><i class="far fa-trash-alt text-danger"></i></a>

                        </td>

                      </tr>

                      <div class="modal fade" id="deleteModal{{ $reservation->rsv_id }}">

                        <div class="modal-dialog">

                          <div class="modal-content">

                            <div class="modal-header">

                              <h4 class="modal-title">Reservations</h4>

                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                <span aria-hidden="true">&times;</span>

                              </button>

                            </div>

                            <div class="modal-body">

                              <p>Are you sure want to delete this reservation ?</p>

                            </div>

                            <div class="modal-footer justify-content-between">

                              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

                              <form action="{{ route('reservations.destroy', $reservation->rsv_id) }}" method="POST">

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

          </div>

        </div>

        <div class="row">

          <div class="col-md-12">

            <div class="card">

              <div class="card-header bg-info">

                <p class="font-weight-bold">Confirm Reservations</p>

                <h3 class="card-title text-dark font-weight-bold">Total : {{ count($confirm_reservations) }}</h3>
              
              </div>
              <!-- /.card-header -->

              <div class="card-body">

                <table id="reservationTable2" class="table table-bordered table-hover">

                  <thead>

                    <tr>

                      <th>#</th>

                      <th>Code</th>

                      <th>Name</th>

                      <th>Treatment</th>

                      <th>Date</th>

                      <th>Time</th>

                      <th>Status</th>

                      <th>Action</th> 

                    </tr>

                  </thead>

                  <tbody>

                    @foreach($confirm_reservations as $reservation)

                      <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $reservation->rsv_code }}</td>

                        <td>{{ $reservation->rsv_name }}</td>

                        <td>{{ $reservation->treat_name }}</td>

                        <td>{{ date('d F Y', strtotime($reservation->rsv_date)) }}</td>

                        <td>{{ date('h:i a', strtotime($reservation->rsv_time)) }}</td>

                        <td>

                          @if($reservation->rsv_status == 0)

                            <span class="badge badge-warning">Pending</span>

                          @elseif($reservation->rsv_status == 1)

                            <span class="badge badge-info">Confirm</span>

                          @elseif($reservation->rsv_status == 2)

                            <span class="badge badge-danger">Dismiss</span>

                          @else

                            <span class="badge badge-success">Finish</span>

                          @endif   

                        </td>            

                        <td>

                          @if($reservation->rsv_status == 0 || $reservation->rsv_status == 1)

                            <div class="btn-group mr-2">
                          
                              <button type="button" class="btn btn-default">Action</button>
                          
                              <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">

                                <span class="sr-only">Toggle Dropdown</span>
                            
                                <div class="dropdown-menu" role="menu">
                          
                                  <a class="dropdown-item" href="#cancelModal{{ $reservation->rsv_id }}" data-toggle="modal" data-target="#cancelModal{{ $reservation->rsv_id }}">

                                    Cancel

                                  </a>
                                    
                                  @if($reservation->rsv_status != 1)

                                    <a class="dropdown-item" href="#confirmModal{{ $reservation->rsv_id }}" data-toggle="modal" data-target="#confirmModal{{ $reservation->rsv_id }}">

                                      Confirm

                                    </a>

                                  @endif

                                  <a class="dropdown-item" href="#finishModal{{ $reservation->rsv_id }}" data-toggle="modal" data-target="#finishModal{{ $reservation->rsv_id }}">

                                    Finish

                                  </a>
                            
                                </div>
                          
                              </button>
                        
                            </div>

                          @endif

                          <a href="{{ route('reservations.show', $reservation->rsv_id) }}"><i class="fas fa-external-link-alt mr-1 text-primary"></i></i></a>

                          <a href="#" data-toggle="modal" data-target="#deleteModal{{ $reservation->rsv_id }}"><i class="far fa-trash-alt text-danger"></i></a>

                        </td>

                      </tr>

                      <div class="modal fade" id="deleteModal{{ $reservation->rsv_id }}">

                        <div class="modal-dialog">

                          <div class="modal-content">

                            <div class="modal-header">

                              <h4 class="modal-title">Reservations</h4>

                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                <span aria-hidden="true">&times;</span>

                              </button>

                            </div>

                            <div class="modal-body">

                              <p>Are you sure want to delete this reservation ?</p>

                            </div>

                            <div class="modal-footer justify-content-between">

                              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

                              <form action="{{ route('reservations.destroy', $reservation->rsv_id) }}" method="POST">

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

                      <div class="modal fade" id="cancelModal{{ $reservation->rsv_id }}">

                        <div class="modal-dialog">

                          <div class="modal-content">

                            <div class="modal-header">

                              <h4 class="modal-title">Reservations</h4>

                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                <span aria-hidden="true">&times;</span>

                              </button>

                            </div>

                            <div class="modal-body">

                              <p>Are you sure want to cancel this reservation ?</p>

                            </div>

                            <div class="modal-footer justify-content-between">

                              <button type="button" class="btn btn-default" data-dismiss="modal">Back</button>

                              <form action="{{ route('reservations.cancel', $reservation->rsv_id) }}" method="POST">

                                @csrf

                                <button type="submit" class="btn btn-danger">Cancel Reservation</button>
                              
                              </form>

                            </div>

                          </div>
                          <!-- /.modal-content -->

                        </div>
                        <!-- /.modal-dialog -->

                      </div>
                      <!-- /.modal -->

                      <div class="modal fade" id="confirmModal{{ $reservation->rsv_id }}">

                        <div class="modal-dialog">

                          <div class="modal-content">

                            <div class="modal-header">

                              <h4 class="modal-title">Reservations</h4>

                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                <span aria-hidden="true">&times;</span>

                              </button>

                            </div>

                            <div class="modal-body">

                              <p>Are you sure want to confirm this reservation ?</p>

                            </div>

                            <div class="modal-footer justify-content-between">

                              <button type="button" class="btn btn-default" data-dismiss="modal">Back</button>

                              <form action="{{ route('reservations.confirm', $reservation->rsv_id) }}" method="POST">

                                @csrf

                                <button type="submit" class="btn btn-success">Confirm Reservation</button>
                              
                              </form>

                            </div>

                          </div>
                          <!-- /.modal-content -->

                        </div>
                        <!-- /.modal-dialog -->

                      </div>
                      <!-- /.modal -->

                      <div class="modal fade" id="finishModal{{ $reservation->rsv_id }}">

                        <div class="modal-dialog">

                          <div class="modal-content">

                            <div class="modal-header">

                              <h4 class="modal-title">Reservations</h4>

                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                <span aria-hidden="true">&times;</span>

                              </button>

                            </div>

                            <div class="modal-body">

                              <p>Are you sure want to finish this reservation ?</p>

                            </div>

                            <div class="modal-footer justify-content-between">

                              <button type="button" class="btn btn-default" data-dismiss="modal">Back</button>

                              <form action="{{ route('reservations.finish', $reservation->rsv_id) }}" method="POST">

                                @csrf

                                <button type="submit" class="btn btn-success">Finish Reservation</button>
                              
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

          </div>

          <div class="col-md-12">

            <div class="card">

              <div class="card-header bg-warning">

                <p class="font-weight-bold text-white">Pending Reservations</p>

                <h3 class="card-title font-weight-bold pending-rsv-hd">Total : {{ count(config('reservations')) }}</h3>
              
              </div>
              <!-- /.card-header -->

              <div class="card-body">

                <table id="reservationTable4" class="table table-bordered table-hover">

                  <thead>

                    <tr>

                      <th>#</th>

                      <th>Code</th>

                      <th>Name</th>

                      <th>Treatment</th>

                      <th>Date</th>

                      <th>Time</th>

                      <th>Action</th> 

                    </tr>

                  </thead>

                  <tbody>

                  </tbody>
                        
                </table>

              </div>
              <!-- /.card-body -->

            </div>
            <!-- /.card -->

          </div>

        </div>

      </section>
      <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->

  @endsection