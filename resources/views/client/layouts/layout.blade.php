<!DOCTYPE html>

<html>

    <head>

        <meta http-equiv="refresh" content="300"/>

        <meta charset="utf-8">
    
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
        <!--IE Compatibility Meta-->
        <meta name="author" content="{{ $setting->set_m_author }}" />
    
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
        <meta name="description" content="{!! $setting->set_m_desc !!}">

        <meta name="keyword" content="{!! $setting->set_m_keyword !!}">
    
        <link href="{{ asset('public/assets/uploads/'.$setting->set_web_logo) }}" rel="icon">

        <!-- Fonts
        ============================================= -->
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900%7COpen+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel='stylesheet' type='text/css'>

        <!-- Stylesheets
        ============================================= -->
        <link href="{{ asset('public/assets/client/css/external.css') }}" rel="stylesheet">

        <link href="{{ asset('public/assets/client/css/bootstrap.min.css') }}" rel="stylesheet">

        <link href="{{ asset('public/assets/client/css/style.css') }}" rel="stylesheet">

        <link href="{{ asset('public/assets/client/fontawesome/css/all.css') }}" rel="stylesheet">

        <link href="{{ asset('public/assets/client/clockpicker-gh-pages/dist/bootstrap-clockpicker.min.css') }}" rel="stylesheet">

        <link href="{{ asset('public/assets/client/clockpicker-gh-pages/dist/jquery-clockpicker.min.css') }}" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('public/assets/client/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">

        <title>{{ $setting->set_web_title }}</title>

        <!-- CUSTOM -->
        <style>

            .mt-1 {
                margin-top: 1em;
            }

            .mb-1 {
                margin-bottom: 5em;
            }

            .mr-1 {
                margin-right: .5em;
            }

            .ml-1 {
                margin-left: .5em;
            }

            .pb-1 {
                padding-bottom: 2em;
            }

            .large-text {
                font-size: 2.5em;
            }

            .medium-text {
                font-size: 1.5em;
            }

            ::-webkit-scrollbar-track
            {
                -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
                background-color: #F5F5F5;
            }

            ::-webkit-scrollbar
            {
                width: 10px;
                background-color: #F5F5F5;
            }

            ::-webkit-scrollbar-thumb
            {
                background-color: #F90; 
                background-image: -webkit-linear-gradient(45deg,
                rgba(255, 255, 255, .2) 25%,
                transparent 25%,
                transparent 50%,
                rgba(255, 255, 255, .2) 50%,
                rgba(255, 255, 255, .2) 75%,
                transparent 75%,
                transparent)
            }

        </style>
        <!------------>

    </head>

    <body>

        @yield('content')

        {{-- <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> --}}

        <script src="{{ asset('public/assets/client/js/jquery-2.2.4.min.js') }}"></script>

        <script src="{{ asset('public/assets/client/js/plugins.js') }}"></script>

        <script src="{{ asset('public/assets/client/js/functions.js') }}"></script>

        <script defer src="{{ asset('public/assets/client/fontawesome/js/all.js') }}"></script>

        <script src="{{ asset('public/assets/client/clockpicker-gh-pages/dist/bootstrap-clockpicker.min.js') }}"></script>

        <script src="{{ asset('public/assets/client/clockpicker-gh-pages/dist/jquery-clockpicker.min.js') }}"></script>

        <script src="{{ asset('public/assets/client/sweetalert2/sweetalert2.min.js') }}"></script>

        <!-- CUSTOM -->
        <script>

            $('.clockpicker').clockpicker();

            const Toast = Swal.mixin({
                toast: true,
                position: 'center',
                showConfirmButton: false,
                timerProgressBar: true,
                timer: 3000,
                customClass: {
                    header: 'large-text',
                    title: 'large-text',
                }
            });

            @if(Session::has('success'))

                Toast.fire({
                    type: 'success',
                    title: '{{ Session::get('success') }}'
                });
                
            @elseif(Session::has('maximum'))

                Toast.fire({
                    type: 'warning',
                    title: '{{ Session::get('maximum') }}'
                });

            @endif

        </script>
        <!------------>

    </body>

</html>