<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title')</title>

    @section('styles')
    <!-- Favicon-->
    <link rel="icon" href="{{url('md/favicon.ico')}}" type="image/x-icon">
    <meta name="theme-color" content="#3ac636">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{url('md/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{url('md/plugins/node-waves/waves.css')}}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{url('md/plugins/animate-css/animate.css')}}" rel="stylesheet" />

    <!-- Preloader Css -->
    <link href="{{url('md/plugins/material-design-preloader/md-preloader.css')}}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{url('md/css/style.min.css')}}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{url('md/css/themes/theme-aihms.css')}}" rel="stylesheet" />

    {{-- All new styles should be written here--}}
    <link href="{{url('md/css/project-style.css')}}" rel="stylesheet">


    @show
    
</head>

<body class="theme-aihms" data-menu="@yield('active_menu')" data-submenu="@yield('active_submenu')">

@include('google-analytics')
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="md-preloader pl-size-md">
                <svg viewbox="0 0 75 75">
                    <circle cx="37.5" cy="37.5" r="33.5" class="pl-red" stroke-width="4" />
                </svg>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->

    @include('admin.layout.partials.searchbar')
    @include('admin.layout.partials.topnav')
    <section>
        @include('admin.layout.partials.leftsidebar')
        {{-- @include('admin.layout.partials.rightsidebar') --}}

    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>@yield('title')</h2>
            </div>
            @yield('content')
        </div>
    </section>

    @section('scripts')

    <!-- Jquery Core Js -->
    <script src="{{url('md/plugins/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{url('md/plugins/bootstrap/js/bootstrap.js')}}"></script>

    <!-- Select Plugin Js -->
    <script src="{{url('md/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{url('md/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{url('md/plugins/node-waves/waves.js')}}"></script>

    <!-- Custom Js -->
    <script src="{{url('md/js/admin.js')}}"></script>

    <!-- Demo Js -->
    <script src="{{url('md/js/demo.js')}}"></script>
    <!-- jquery validation plugin -->

    <script src="{{url('md/plugins/jquery-validation/jquery.validate.js')}}"></script>

    <script src="{{url('md/js/pages/forms/form-validation.js')}}"></script>


    <!-- Jquery DataTable Plugin Js -->
    <script src="{{url('md/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
    <script src="{{url('md/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
    <script src="{{url('md/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>
    <script src="{{url('md/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>
    <script src="{{url('md/plugins/jquery-datatable/extensions/export/jszip.min.js')}}"></script>
    <script src="{{url('md/plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}"></script>
    <script src="{{url('md/plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
    <script src="{{url('md/plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}"></script>
    <script src="{{url('md/plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>

    <script src="{{url('md/js/pages/tables/jquery-datatable.js')}}"></script>

  <script type="text/javascript">
  //Activate current item in left side menu
  $(window).load(function() {
     var menu ="#"+ $('body').attr('data-menu');
     var submenu = "."+$('body').attr('data-submenu');
     menu = menu=="#"?"":menu;
     submenu = submenu=="."?"":submenu;
     //menu
     $(".menu ul.list li").removeClass('active');
     $(menu).addClass('active').find('a').click();
     //submenu
     $(".ml-menu li").removeClass('active');
     $("a.toggled").removeClass('toggled');
     $(".menu ul.list li.active .ml-menu "+submenu).addClass('active').find('a').addClass('toggled');
  });
  </script>

    @show
</body>

</html>
