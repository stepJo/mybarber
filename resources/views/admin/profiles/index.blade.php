@extends('admin.layouts.layout')

  @section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      
      <!-- Content Header (Page header) -->
      <section class="content-header">
        
        <div class="container-fluid">
          
          <div class="row mb-2">
            
            <div class="col-sm-6">
              
              <h1>Profiles</h1>
            
            </div>

            <div class="col-sm-6">

              <ol class="breadcrumb float-sm-right">

                <li class="breadcrumb-item">Profiles</li>

              </ol>

            </div>

          </div>

        </div><!-- /.container-fluid -->

      </section>

      <!-- Main content -->
      <section class="content">

        <div class="row">

          <div class="col-md-5">

            <div class="card bg-light">

              <div class="card-header text-muted border-bottom-0"></div>

              <div class="card-body pt-0">

                <div class="row">

                  <div class="col-7 p-3">

                    <ul class="ml-4 mb-0 fa-ul text-dark">

                      <li>

                        <span class="fa-li">

                          <i class="fas fa-lg fa-phone mr-4"></i>

                        </span> 

                        {{ $profile->profile_phone }}

                      </li>

                      <li class="mt-3">

                        <span class="fa-li">

                          <i class="fas fa-lg fa-envelope mr-4"></i>

                        </span> 

                        {{ $profile->profile_email }}

                      </li>

                      <li class="mt-3">

                        <span class="fa-li">

                          <i class="fab fa-facebook fa-lg mr-4"></i>

                        </span> 

                        {{ $profile->profile_fb }}

                      </li>

                      <li class="mt-3">

                        <span class="fa-li">

                          <i class="fab fa-instagram fa-lg mr-4"></i></i>

                        </span> 

                        {{ $profile->profile_ig }}

                      </li>

                      <li class="mt-3">

                        <span class="fa-li">

                          <i class="fab fa-twitter fa-lg mr-4"></i></i>

                        </span> 

                        {{ $profile->profile_twitter }}

                      </li>

                      <li class="mt-3">

                        <span class="fa-li">

                          <i class="fas fa-map fa-lg mr-4"></i></i>

                        </span> 

                        {{ $profile->profile_address }}

                      </li>

                    </ul>

                  </div>

                </div>

              </div>
                
            </div>

          </div>

          <div class="col-md-7">

            <!-- general form elements -->
            <div class="card card-light">

              <div class="card-header">

                <h3 class="card-title">Edit Profile</h3>

              </div>
              <!-- /.card-header -->

              <!-- form start -->
              <form role="form" action="{{ route('profiles.update', $profile->profile_id) }}" method="POST">

                @csrf

                <div class="card-body">

                  <div class="form-group">

                    <label for="profile_phone">Phone Number</label>

                    @if ($errors->has('profile_phone'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('profile_phone') }}</span>

                    @endif

                    <input type="text" class="form-control" id="profile_number" name="profile_phone" placeholder="Phone Number" value="{{ old('profile_number') }}">

                  </div>

                  <div class="form-group">

                    <label for="profile_email">Email</label>

                    @if ($errors->has('profile_email'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('profile_email') }}</span>

                    @endif

                    <input type="text" class="form-control" id="profile_email" name="profile_email" placeholder="Email" value="{{ old('profile_email') }}">

                  </div>

                  <div class="form-group">

                    <label for="profile_fb">Facebook</label>

                    @if ($errors->has('profile_fb'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('profile_fb') }}</span>

                    @endif

                    <div class="input-group">

                      <div class="input-group-prepend">

                        <span class="input-group-text"><i class="fab fa-facebook p-1"></i></span>

                      </div>

                      <input type="text" class="form-control" placeholder="Facebook" name="profile_fb">

                    </div>

                  </div>

                  <div class="form-group">

                    <label for="profile_ig">Instagram</label>

                    @if ($errors->has('profile_ig'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('profile_ig') }}</span>

                    @endif

                    <div class="input-group">

                      <div class="input-group-prepend">

                        <span class="input-group-text"><i class="fab fa-instagram p-1"></i></span>

                      </div>

                      <input type="text" class="form-control" placeholder="Instagram" name="profile_ig">

                    </div>

                  </div>

                  <div class="form-group">

                    <label for="profile_twitter">Twitter</label>

                    @if ($errors->has('profile_twitter'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('profile_twitter') }}</span>

                    @endif

                    <div class="input-group">

                      <div class="input-group-prepend">

                        <span class="input-group-text"><i class="fab fa-twitter p-1"></i></span>

                      </div>

                      <input type="text" class="form-control" placeholder="Twitter" name="profile_twitter">

                    </div>

                  </div>

                  <div class="form-group">

                    <label for="profile_address">Address</label>

                    @if ($errors->has('profile_address'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('profile_address') }}</span>

                    @endif

                    <textarea class="form-control" id="description" name="profile_address">  

                      {{ old('profile_address') }}

                    </textarea>

                  </div>
    
                </div>
                <!-- /.card-body -->

                <div class="card-footer">

                  <button type="submit" class="btn btn-default">Edit Profile</button>

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