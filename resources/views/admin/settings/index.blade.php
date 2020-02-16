@extends('admin.layouts.layout')

  @section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      
      <!-- Content Header (Page header) -->
      <section class="content-header">
        
        <div class="container-fluid">
          
          <div class="row mb-2">
            
            <div class="col-sm-6">
              
              <h1>Site Settings</h1>
            
            </div>

            <div class="col-sm-6">

              <ol class="breadcrumb float-sm-right">

                <li class="breadcrumb-item">Site Settings</li>

              </ol>

            </div>

          </div>

        </div><!-- /.container-fluid -->

      </section>

      <!-- Main content -->
      <section class="content">

        <div class="row">

          <div class="col-md-5">

            <div class="card card-light">

              <div class="card-header">

                <h3 class="card-title">Site</h3>

              </div>
              <!-- /.card-header -->

              <div class="card-body">

                <strong>Title</strong>

                <p class="text-muted mt-1">

                  {{ $setting->set_web_title }}
                
                </p>

                <hr>

                <strong>Logo</strong>

                <br/>

                <img src="{{ url('/public/assets/uploads/'.$setting->set_web_logo) }}" alt="{{ $setting->set_web_title }}" class="img-thumbnail mt-2" width="120">

              </div>
              <!-- /.card-body -->

            </div>
            <!-- /.card -->

          </div>

          <div class="col-md-7">

            <!-- general form elements -->
            <div class="card card-light card-outline">

              <div class="card-header">

                <h3 class="card-title">Edit Site</h3>

              </div>
              <!-- /.card-header -->

              <!-- form start -->
              <form role="form" action="{{ route('sites.update', $setting->set_id) }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="card-body">

                  <div class="form-group">

                    <label for="set_web_title">Site Title</label>

                    @if ($errors->has('set_web_title'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('set_web_title') }}</span>

                    @endif

                    <input type="text" class="form-control" id="set_web_title" name="set_web_title" placeholder="Site Title" value="{{ old('set_web_title') }}">

                  </div>
    
                  <div class="form-group">

                    <label for="set_web_logo">Site Logo</label>

                    @if ($errors->has('set_web_logo'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('set_web_logo') }}</span>

                    @endif

                    <div class="file-upload">

                      <div class="file-select">

                        <div class="file-select-button" id="fileName">Choose File</div>

                        <div class="file-select-name" id="noFile">No file chosen...</div> 

                        <input type="file" name="set_web_logo" id="chooseFile">

                      </div>

                    </div>

                  </div>

                  <button type="submit" class="btn btn-light mt-4">Edit Site</button>

                </div>
                <!-- /.card-body -->

              </form>

            </div>
            <!-- /.card -->

          </div>

          <div class="col-md-6">

            <div class="card card-light">

              <div class="card-header">
            
                <h3 class="card-title">
              
                  Meta Tags
            
                </h3>
          
              </div>

              <div class="card-body">

                <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                  
                  <li class="nav-item">
                
                    <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Author</a>
              
                  </li>
              
                  <li class="nav-item">
                
                    <a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill" href="#custom-content-below-profile" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">Description</a>
                  
                  </li>

                  <li class="nav-item">

                    <a class="nav-link" id="custom-content-below-messages-tab" data-toggle="pill" href="#custom-content-below-messages" role="tab" aria-controls="custom-content-below-messages" aria-selected="false">Keyword</a>
                  
                  </li>

                </ul>
              
                <div class="tab-content" id="custom-content-below-tabContent">
              
                  <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">

                    {!! $setting->set_m_author !!} 
                
                  </div>

                  <div class="tab-pane fade" id="custom-content-below-profile" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">

                    {!! $setting->set_m_desc !!} 

                  </div>

                  <div class="tab-pane fade" id="custom-content-below-messages" role="tabpanel" aria-labelledby="custom-content-below-messages-tab">

                    {!! $setting->set_m_keyword !!}

                  </div>
            
                </div>

              </div>
              <!-- /.card -->

            </div>
            <!-- /.card -->

          </div>

          <div class="col-md-6">

            <!-- general form elements -->
            <div class="card card-light card-outline">

              <div class="card-header">

                <h3 class="card-title">Edit Meta Tags</h3>

              </div>
              <!-- /.card-header -->

              <!-- form start -->
              <form role="form" action="{{ route('sites.meta', $setting->set_id) }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="card-body">

                  <div class="form-group">

                    <label for="set_m_author">Meta Author</label>

                    @if ($errors->has('set_m_author'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('set_m_author') }}</span>

                    @endif

                    <input type="text" class="form-control" id="set_m_author" name="set_m_author" placeholder="Meta Author" value="{{ old('set_m_author') }}">

                  </div>

                  <div class="form-group">

                    <label for="set_m_desc">Meta Description</label>

                    @if ($errors->has('set_m_desc'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('set_m_desc') }}</span>

                    @endif

                    <textarea class="form-control" id="description" name="set_m_desc">  

                      {{ old('set_m_desc') }}

                    </textarea>

                  </div>

                  <div class="form-group">

                    <label for="set_m_keyword">Meta Keyword</label>

                    @if ($errors->has('set_m_keyword'))

                      <br>

                      <span class="text-danger font-weight-bold">{{ $errors->first('set_m_keyword') }}</span>

                    @endif

                    <textarea class="form-control" id="description2" name="set_m_keyword">  

                      {{ old('set_m_keyword') }}

                    </textarea>

                  </div>

                  <button type="submit" class="btn btn-light mt-4">Edit Meta Tags</button>

                </div>
                <!-- /.card-body -->

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