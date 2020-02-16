<!DOCTYPE html>

    <html>

    <head>

        <meta http-equiv="refresh" content="300"/>

        <meta charset="utf-8">
      
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
      
        <title> {{config('setting.set_web_title') }} | ADMIN </title>
      
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">
      
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('public/assets/admin/plugins/fontawesome-free/css/all.min.css') }}">
        
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        
        <!-- Select2 -->
        <link rel="stylesheet" href="{{ asset('public/assets/admin/plugins/select2/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('public/assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

        <!-- iCheck -->
        <link rel="stylesheet" href="{{ asset('public/assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('public/assets/admin/dist/css/adminlte.min.css') }}">

        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{ asset('public/assets/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

        <!-- summernote -->
        <link rel="stylesheet" href="{{ asset('public/assets/admin/plugins/summernote/summernote-bs4.css') }}">

        <!-- SweetAlert2 -->
        <link rel="stylesheet" href="{{ asset('public/assets/admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">

        <!-- Toastr -->
        <link rel="stylesheet" href="{{ asset('public/assets/admin/plugins/toastr/toastr.min.css') }}">

        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

        <!-- CUSTOM STYLE -->
        <style>

            .file-upload {
                display:block;
                text-align:center;
                font-family: Helvetica, Arial, sans-serif;font-size: 12px;
            }

            .file-upload .file-select {
                display:block;border: 2px solid #dce4ec;
                color: #34495e;cursor:pointer;
                height:40px;
                line-height:40px;text-align:left;
                background:#FFFFFF;overflow:hidden;
                position:relative;
            }

            .file-upload .file-select .file-select-button {
                background:#dce4ec;
                padding:0 10px;
                display:inline-block;
                height:40px;
                line-height:40px;
            }

            .file-upload .file-select .file-select-name {
                line-height:40px;
                display:inline-block;
                padding:0 10px;
            }

            .file-upload .file-select:hover {
                border-color:#34495e;
                transition:all .2s ease-in-out;
                -moz-transition:all .2s ease-in-out;
                -webkit-transition:all .2s ease-in-out;
                -o-transition:all .2s ease-in-out;
            }


            .file-upload .file-select:hover .file-select-button {
                background:#34495e;
                color:#FFFFFF;
                transition:all .2s ease-in-out;
                -moz-transition:all .2s ease-in-out;
                -webkit-transition:all .2s ease-in-out;
                -o-transition:all .2s ease-in-out;
            }

            .file-upload.active .file-select {
                border-color:#3fa46a;
                transition:all .2s ease-in-out;
                -moz-transition:all .2s ease-in-out;
                -webkit-transition:all .2s ease-in-out;
                -o-transition:all .2s ease-in-out;
            }

            .file-upload.active .file-select .file-select-button {
                background:#3fa46a;
                color:#FFFFFF;
                transition:all .2s ease-in-out;
                -moz-transition:all .2s ease-in-out;
                -webkit-transition:all .2s ease-in-out;
                -o-transition:all .2s ease-in-out;
            }

            .file-upload .file-select input[type=file] {
                z-index:100;
                cursor:pointer;
                position:absolute;
                height:100%;
                width:100%;
                top:0;
                left:0;
                opacity:0;
                filter:alpha(opacity=0);
            }

            .file-upload .file-select.file-select-disabled {
                opacity:0.65;
            }

            .file-upload .file-select.file-select-disabled:hover {
                cursor:default;
                display:block;
                border: 2px solid #dce4ec;
                color: #34495e;
                cursor:pointer;
                height:40px;
                line-height:40px;
                margin-top:5px;
                text-align:left;
                background:#FFFFFF;
                overflow:hidden;
                position:relative;
            }

            .file-upload .file-select.file-select-disabled:hover .file-select-button {
                background:#dce4ec;
                color:#666666;
                padding:0 10px;
                display:inline-block;
                height:40px;
                line-height:40px;
            }

            .file-upload .file-select.file-select-disabled:hover .file-select-name {
                line-height:40px;
                display:inline-block;
                padding:0 10px;
            }

        </style>

    </head>

    <body class="hold-transition sidebar-mini layout-fixed">
  
        <div class="wrapper">
          
            <!-- TOP -->
            @include('admin.layouts.top')  

            <!-- SIDEBAR -->
            @include('admin.layouts.sidebar')

            @yield('content')

        </div>

        <!-- jQuery -->
        <script src="{{ asset('public/assets/admin/plugins/jquery/jquery.min.js') }}"></script>

        <!-- jQuery UI 1.11.4 -->
        <script src="{{ asset('public/assets/admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
          $.widget.bridge('uibutton', $.ui.button)
        </script>

        <!-- Bootstrap 4 -->
        <script src="{{ asset('public/assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <!-- DataTables -->
        <script src="{{ asset('public/assets/admin/plugins/datatables/jquery.dataTables.js') }}"></script>
        <script src="{{ asset('public/assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>

        <!-- Select2 -->
        <script src="{{ asset('public/assets/admin/plugins/select2/js/select2.full.min.js') }}"></script>

        <!-- Summernote -->
        <script src="{{ asset('public/assets/admin/plugins/summernote/summernote-bs4.min.js') }}"></script>

        <!-- overlayScrollbars -->
        <script src="{{ asset('public/assets/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>

        <!-- SweetAlert2 -->
        <script src="{{ asset('public/assets/admin/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

        <!-- Toastr -->
        <script src="{{ asset('public/assets/admin/plugins/toastr/toastr.min.js') }}"></script>

        <!-- TinyMCE -->
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

        <!-- ChartJS -->
        <script src="{{ asset('public/assets/admin/plugins/chart.js/Chart.min.js') }}"></script>

        <!-- AdminLTE App -->
        <script src="{{ asset('public/assets/admin/dist/js/adminlte.js') }}"></script>

        <!-- CUSTOM SCRIPT -->
        <script>

            //ACTIVE MENU
            let url = window.location;

            $('ul.nav-sidebar a').filter(function() {
                return this.href == url;
            }).addClass('active');

            $('ul.nav-treeview a').filter(function() {
                return this.href == url;
            }).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open').prev('a').addClass('active');
            //
            

            //DATATABLE
            $('#dataTable').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
            });

            $('#reservationTable').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
            });

            $('#reservationTable2').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
            });

            $('#reservationTable3').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
            });

            let reservationTable4 = $('#reservationTable4').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                processing: true,
                serverSide: true,

                ajax: '{{ route('reservations.generate') }}',
                columns: [
                    { data: 'rsv_name'},
                    { data: 'rsv_code'},
                    { data: 'rsv_name'},
                    { data: 'treat_name'},
                    { data: 'rsv_date'},
                    { data: 'rsv_time'},
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ],
                "fnDrawCallback": function(){
                    $('.dropdown-menu').click(function(e) {
                        e.stopPropagation();

                        if ($(e.target).is('[data-toggle=modal]')) {
                            $($(e.target).data('target')).modal()
                        }
                    });
                }
            });

            let reservationTable5 = $('#reservationTable5').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                processing: true,
                serverSide: true,

                ajax: '{{ route('reservations.generate') }}',
                columns: [
                    { data: 'rsv_name'},
                    { data: 'treat_name'},
                    { data: 'rsv_date'},
                    { data: 'rsv_time'},
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ],
                "fnDrawCallback": function(){
                    $('.dropdown-menu').click(function(e) {
                        e.stopPropagation();

                        if ($(e.target).is('[data-toggle=modal]')) {
                            $($(e.target).data('target')).modal()
                        }
                    });
                }
            });
            

            //SELECT2
            $('.select2bs4').select2({
              theme: 'bootstrap4'
            });
            

            //TinyMCE
            tinymce.init({
                selector: 'textarea#description',
                height:250
            });

            tinymce.init({
                selector: 'textarea#description2',
                height:250
            });

            tinymce.init({
                selector: 'textarea#description3',
                height:250
            });

            tinymce.init({
                selector: 'textarea#description4',
                height:250
            });
            //
            
            
            //SUMMERNOTE
            $('#compose-textarea').summernote();
            
            
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
            

            //FILE UPLOAD
            $('#chooseFile').bind('change', function () {
                var filename = $("#chooseFile").val();
                
                if (/^\s*$/.test(filename)) {
                    $(".file-upload").removeClass('active');
                    $("#noFile").text("No file chosen..."); 
                }
                else {
                    $(".file-upload").addClass('active');
                    $("#noFile").text(filename.replace("C:\\fakepath\\", "")); 
                }
            });
            //


            //NOTIFICATION MESSAGE
            @if(Session::has('success'))

                toastr.success("Success {{ Session::get('success') }}");
                
            @elseif(Session::has('warning'))

                toastr.warning("{{ Session::get('warning') }}");

            @elseif(Session::has('finish'))

                toastr.success("{{ Session::get('finish') }}");

            @endif
            //
            

            //CONFIRMATION MODAL (RESERVATION)
            $('.dropdown-menu').click(function(e) {
                e.stopPropagation();

                if ($(e.target).is('[data-toggle=modal]')) {
                    $($(e.target).data('target')).modal()
                }
            });
            //


            //NOTIFICATION
            setInterval(function() {
                $.ajax({
                    type:"GET",
                    url:"{{ route('reservations.count') }}",
                    dataType:"json",
                    success:function(data) {
                        if(data.length > 0) {
                            if(data.length > 10) {
                                $('.incoming-reservations').html(`10+`);
                                $('.rsv-bell').html(`10+`);
                                $('.rsv-list').html(`You have 10+ &nbsp;reservations`);
                            }
                            else {
                                $('.incoming-reservations').html(data.length);
                                $('.rsv-bell').html(data.length);
                                $('.rsv-list').html(`You have ${data.length} &nbsp;reservations`);
                            }

                            $('.pending-rsv-hd').html(`Total : ${data.length}`);

                            reservationTable4.ajax.reload();
                            reservationTable5.ajax.reload(); 
                        }
                    }
                });
            }, 30000);


            //CHART
            $(document).ready(function() {
                @php $months = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]; @endphp;

                @foreach(config('count') as $c)

                    @php $months[$c->month - 1] = $c->total; @endphp;

                @endforeach

                var areaChartData = {
                    labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July' ,'August', 'September', 'October', 'November', 'December'],
                    datasets: [
                        {   
                            label               : 'success ',
                            backgroundColor     : '#42f587',
                            borderColor         : '#42f587',
                            pointRadius         : false,
                            pointColor          : '#42f587',
                            pointStrokeColor    : '#42f587',
                            pointHighlightFill  : '#42f587',
                            pointHighlightStroke: '#42f587',
                            data                : @json($months)
                        }   
                    ]
                }

                var barChartCanvas = $('#barChart').get(0).getContext('2d');
                var barChartData = jQuery.extend(true, {}, areaChartData);
                var temp0 = areaChartData.datasets[0];
                barChartData.datasets[0] = temp0;

                var barChartOptions = {
                    responsive : true,
                    maintainAspectRatio : false,
                    datasetFill : false
                }

                var barChart = new Chart(barChartCanvas, {
                    type: 'bar', 
                    data: barChartData,
                    options: barChartOptions
                });
            });
       
        </script>

    </body>

</html>