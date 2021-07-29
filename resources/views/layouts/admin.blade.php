<!Doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title> @yield('siteTitle', 'სამართავი პანელი') </title>

        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
        
        <link href="{{ asset('back/css/mystyle.css') }}" rel="stylesheet">
        <link href="{{ asset('back/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
        <link href="{{ asset('back/plugins/node-waves/waves.css') }}" rel="stylesheet" />
        <link href="{{ asset('back/plugins/animate-css/animate.css') }}" rel="stylesheet" />
        <link href="{{ asset('back/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}" rel="stylesheet" />
        <link href="{{ asset('back/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css') }}" rel="stylesheet" />
        <link href="{{ asset('back/plugins/waitme/waitMe.css') }}" rel="stylesheet" />
        <link href="{{ asset('back/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
        <link href="{{ asset('back/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('back/css/themes/all-themes.css') }}" rel="stylesheet" />
        <link href="{{ asset('back/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet" />




        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0- 
     alpha/css/bootstrap.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

        <style type="text/css">
        @font-face 
        {
          font-family: bpg-glaho-bold-webfont;
          src: url({{asset('back/fonts/bpg-glaho-bold-webfont.ttf')}});
        }
      

        body,h1,h2,h3,h4,h5,h6,div,span,p,ul,li,a 
        {
          font-family: bpg-glaho-bold-webfont !important;
        }

        .swal2-styled:focus
        {
            box-shadow: none;
        }

    </style>


        @livewireStyles

    </head>

<body class="theme-red">

    @include('admin.messages.msg')

    
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p> გთხოვთ მოიცადოთ... </p>
        </div>
    </div>

    <div class="overlay"></div>

    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>

            <input type="text" placeholder="ძიება...">

        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>

    <section>
        @include('admin.components.navbar')
        @include('admin.components.sidebar')
    </section>

    @yield('content')


    

    <script src="{{ asset('back/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('back/plugins/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('back/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
    <script src="{{ asset('back/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('back/plugins/node-waves/waves.js') }}"></script>
    <script src="{{ asset('back/plugins/autosize/autosize.js') }}"></script>
    <script src="{{ asset('back/plugins/momentjs/moment.js') }}"></script>
    <script src="{{ asset('back/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>
    <script src="{{ asset('back/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('back/js/admin.js') }}"></script>
    <script src="{{ asset('back/js/pages/forms/basic-form-elements.js') }}"></script>
    <script src="{{ asset('back/js/demo.js') }}"></script>
    <script src="{{ asset('back/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('back/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('back/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('back/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('back/plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
    <script src="{{ asset('back/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
    <script src="{{ asset('back/plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
    <script src="{{ asset('back/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('back/plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>
    <script src="{{ asset('back/js/pages/tables/jquery-datatable.js') }}"></script>


    <script type="text/javascript">
        toastr.options = {
            "positionClass": "toast-top-left",
            "closeButton" : true,
            "progressBar" : true
        }
    </script>
    
    @livewireScripts
</body>
</html>
