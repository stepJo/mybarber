@extends('admin.layouts.layout')

  @section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      
      <!-- Content Header (Page header) -->
      <section class="content-header">
        
        <div class="container-fluid">
          
          <div class="row mb-2">
            
            <div class="col-sm-6">
              
              <h1>Message Settings</h1>
            
            </div>

            <div class="col-sm-6">

              <ol class="breadcrumb float-sm-right">

                <li class="breadcrumb-item">Message Settings</li>

              </ol>

            </div>

          </div>

        </div><!-- /.container-fluid -->

      </section>

      <!-- Main content -->
      <section class="content">

        <div class="row">

          <div class="col-md-6">

            <div class="card card-info card-outline">

              <div class="card-header">
                
                <h3 class="card-title text-info">Confirm Mail</h3>

              </div>
              <!-- /.card-header -->

              <div class="card-body p-0">

                <div class="mailbox-read-info">

                  <h5>Subject : <b>{{ $confirm_message->rsv_msg_subject }}</b></h5>

                  <h6 class="mt-2">Name : <b>{{ $confirm_message->rsv_msg_name }}</b></h6>
                
                </div>

                <div class="mailbox-read-message">

                  <h5 class="font-weight-bold mb-3">Message Content :</h5>

                  <p>
                    
                    {!! $confirm_message->rsv_msg_content !!}

                  </p>

                  <h5 class="font-weight-bold mb-3">Message Footer :</h5>

                  <p>
                    
                    {!! $confirm_message->rsv_msg_footer !!}

                  </p>

                </div>
                <!-- /.mailbox-read-message -->

              </div>
              <!-- /.card-body -->

            </div>
            <!-- /.card -->

          </div>
          <!-- /.col --> 

          <div class="col-md-6">

            <div class="card card-danger card-outline">

              <div class="card-header">
                
                <h3 class="card-title text-danger">Dismiss Mail</h3>

              </div>
              <!-- /.card-header -->

              <div class="card-body p-0">

                <div class="mailbox-read-info">

                  <h5>Subject : <b>{{ $dismiss_message->rsv_msg_subject }}</b></h5>

                  <h6 class="mt-2">Name : <b>{{ $dismiss_message->rsv_msg_name }}</b></h6>
                
                </div>

                <div class="mailbox-read-message">

                  <h5 class="font-weight-bold mb-3">Message Content :</h5>

                  <p>
                    
                    {!! $dismiss_message->rsv_msg_content !!}

                  </p>

                  <h5 class="font-weight-bold mb-3">Message Footer :</h5>

                  <p>
                    
                    {!! $dismiss_message->rsv_msg_footer !!}

                  </p>

                </div>
                <!-- /.mailbox-read-message -->

              </div>
              <!-- /.card-body -->

            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->      

        </div>

        <div class="row">

          <div class="col-md-6">

            <!-- general form elements -->
            <div class="card card-info">

              <div class="card-header">

                <h3 class="card-title">Edit Confirm Mail</h3>

              </div>
              <!-- /.card-header -->

              <!-- form start -->
              <form role="form" action="{{ route('confirm-message.update', $confirm_message->rsv_msg_id) }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="card-body">

                  <div class="form-group">

                    <label for="rsv_msg_subject">Message Subject</label>

                    @if ($errors->has('rsv_msg_subject'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('rsv_msg_subject') }}</span>

                    @endif

                    <input type="text" class="form-control" id="rsv_msg_subject" name="rsv_msg_subject" placeholder="Message Subject" value="{{ old('rsv_msg_subject') }}">

                  </div>

                  <div class="form-group">

                    <label for="rsv_msg_name">Sender Name</label>

                    @if ($errors->has('rsv_msg_name'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('rsv_msg_name') }}</span>

                    @endif

                    <input type="text" class="form-control" id="rsv_msg_name" name="rsv_msg_name" placeholder="Sender Name" value="{{ old('rsv_msg_name') }}">

                  </div>

                  <div class="form-group">

                    <label for="rsv_msg_content">Message Content</label>

                    @if ($errors->has('rsv_msg_content'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('rsv_msg_content') }}</span>

                    @endif

                    <textarea class="form-control" id="description" name="rsv_msg_content">  

                      {{ old('rsv_msg_content') }}

                    </textarea>

                  </div>

                  <div class="form-group">

                    <label for="rsv_msg_footer">Message Footer</label>

                    @if ($errors->has('rsv_msg_footer'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('rsv_msg_footer') }}</span>

                    @endif

                    <textarea class="form-control" id="description2" name="rsv_msg_footer">  

                      {{ old('rsv_msg_footer') }}

                    </textarea>

                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">

                  <button type="submit" class="btn btn-info">Edit Confirm Mail</button>

                </div>

              </form>

            </div>

          </div>
          <!-- /.col -->

          <div class="col-md-6">

            <!-- general form elements -->
            <div class="card card-danger">

              <div class="card-header">

                <h3 class="card-title">Edit Dismiss Mail</h3>

              </div>
              <!-- /.card-header -->

              <!-- form start -->
              <form role="form" action="{{ route('dismiss-message.update', $dismiss_message->rsv_msg_id) }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="card-body">

                  <div class="form-group">

                    <label for="rsv_msg_subject">Message Subject</label>

                    @if ($errors->has('rsv_msg_subject'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('rsv_msg_subject') }}</span>

                    @endif

                    <input type="text" class="form-control" id="rsv_msg_subject" name="rsv_msg_subject" placeholder="Message Subject" value="{{ old('rsv_msg_subject') }}">

                  </div>
                  
                  <div class="form-group">

                    <label for="rsv_msg_name">Sender Name</label>

                    @if ($errors->has('rsv_msg_name'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('rsv_msg_name') }}</span>

                    @endif

                    <input type="text" class="form-control" id="rsv_msg_name" name="rsv_msg_name" placeholder="Sender Name" value="{{ old('rsv_msg_name') }}">

                  </div>

                  <div class="form-group">

                    <label for="rsv_msg_content">Message Content</label>

                    @if ($errors->has('rsv_msg_content'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('rsv_msg_content') }}</span>

                    @endif

                    <textarea class="form-control" id="description3" name="rsv_msg_content">  

                      {{ old('rsv_msg_content') }}

                    </textarea>

                  </div>

                  <div class="form-group">

                    <label for="rsv_msg_footer">Message Footer</label>

                    @if ($errors->has('rsv_msg_footer'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('rsv_msg_footer') }}</span>

                    @endif

                    <textarea class="form-control" id="description4" name="rsv_msg_footer">  

                      {{ old('rsv_msg_footer') }}

                    </textarea>

                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">

                  <button type="submit" class="btn btn-danger">Edit Dismiss Mail</button>

                </div>

              </form>

            </div>

          </div>
          <!-- /.col --> 

        </div>

      </section>

    </div>

  @endsection