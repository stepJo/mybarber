<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>MyBarber | LOGIN</title>

        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('public/assets/admin/plugins/fontawesome-free/css/all.min.css') }}">
      
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
      
        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="{{ asset('public/assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
      
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('public/assets/admin/dist/css/adminlte.min.css') }}">
      
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

        <!-- Toastr -->
        <link rel="stylesheet" href="{{ asset('public/assets/admin/plugins/toastr/toastr.min.css') }}">

    </head>

    <body class="hold-transition login-page">

        <div class="login-box">
            
            <div class="login-logo">
                
                <a href="../../index2.html"><b>MyBarber</b></a>
            
            </div>
            <!-- /.login-logo -->

            <div class="card">
                
                <div class="card-body login-card-body">
                
                    <p class="login-box-msg">Sign In</p>

                    @if ($errors->has('admin_email'))

                        <br>

                        <span class="text-danger font-weight-bold">{{ $errors->first('admin_email') }}</span>

                    @endif

                    <form action="{{ route('login.check') }}" method="POST">

                        @csrf

                        <div class="input-group mb-3">
                            
                            <input type="email" name="admin_email" class="form-control" placeholder="Email">
                                
                            <div class="input-group-append">
                                
                                <div class="input-group-text">
                          
                                    <span class="fas fa-envelope"></span>
                                
                                </div>
                            
                            </div>
                    
                        </div>

                        @if ($errors->has('admin_pwd'))

                            <br>

                            <span class="text-danger font-weight-bold">{{ $errors->first('admin_pwd') }}</span>

                        @endif

                        <div class="input-group mb-3">

                            <input type="password" name="admin_pwd" class="form-control" placeholder="Password">
                          
                            <div class="input-group-append">
                            
                                <div class="input-group-text">
                                
                                    <span class="fas fa-lock"></span>
                                
                                </div>

                            </div>

                        </div>

                        <div class="row">
              
                            <!-- /.col -->
                            <div class="col-12">
                                    
                                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                                
                            </div>
                            <!-- /.col -->

                        </div>
                    
                    </form>

                </div>
                <!-- /.login-card-body -->
            
            </div>
        
        </div>
        <!-- /.login-box -->

        <!-- jQuery -->
        <script src="{{ asset('public/assets/admin/plugins/jquery/jquery.min.js') }}"></script>
        
        <!-- Bootstrap 4 -->
        <script src="{{ asset('public/assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <!-- Toastr -->
        <script src="{{ asset('public/assets/admin/plugins/toastr/toastr.min.js') }}"></script>
        
        <!-- AdminLTE App -->
        <script src="{{ asset('public/assets/admin/dist/js/adminlte.min.') }}"></script>

        <!-- CUSTOM SCRIPT -->
        <script>
            
            //TOASTR
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "3000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            //
            

            //NOTIFICATION MESSAGE
            @if(Session::has('failed'))

                toastr.error("{{ Session::get('failed') }}");
                
            @endif
            //

        </script>

    </body>

</html>
