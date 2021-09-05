<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title></title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />
        
        <link rel="shortcut icon" href={{asset('admin/assets/images/favicon.ico')}}>
        <link rel="stylesheet" href={{asset('admin/plugins/chartist/css/chartist.min.css')}}>

        <link href={{asset('admin/assets/css/bootstrap.min.css')}} rel="stylesheet" type="text/css">
        <link href={{asset('admin/assets/css/metismenu.min.css')}} rel="stylesheet" type="text/css">
        <link href={{asset('admin/assets/css/icons.css')}} rel="stylesheet" type="text/css">
        <link href={{asset('admin/assets/css/style.css')}} rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href={{ asset('admin/assets/css/app.css')}}>
        <style>
       .avatar.avatar-xl .avatar-content,.avatar.avatar-xl img{width:60px;height:60px;font-size:1.4rem}

       .modal-title.pr
       {
           margin-left:200px;
           
           font-weight:bold;
       }
       .container-fluid{
            margin-left: 150px;
        }
        
        </style>
        
        @livewireStyles
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.2/dist/alpine.min.js" defer></script>
    </head>
    <body>
    @include('layouts.navigation')
      <div class="container mx-auto px-4">
      @yield('content')
      </div>
      @include('layouts.end')
      @livewireScripts
      <script src={{asset('admin/assets/js/jquery.min.js')}}></script>
        <script src={{asset('admin/assets/js/bootstrap.bundle.min.js')}}></script>
        <script src={{asset('admin/assets/js/metisMenu.min.js')}}></script>
        <script src={{asset('admin/assets/js/jquery.slimscroll.js')}}></script>
        <script src={{asset('admin/assets/js/waves.min.js')}}></script>

        <!--Chartist Chart-->
        <script src={{asset('admin/plugins/chartist/js/chartist.min.js')}}></script>
        <script src={{asset('admin/plugins/chartist/js/chartist-plugin-tooltip.min.js')}}></script>

        <!-- peity JS -->
        <script src={{asset('admin/plugins/peity-chart/jquery.peity.min.js')}}></script>

        <script src={{asset('admin/assets/pages/dashboard.js')}}></script>

        <!-- App js -->
        <script src={{asset('admin/assets/js/app.js')}}></script>
    </body>

</html>
