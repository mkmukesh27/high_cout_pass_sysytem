        <!-- BOOTSTRAP CSS -->
        <link id="style" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
        <!-- STYLE CSS -->
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/css/skin-modes.css') }}" rel="stylesheet" />
        <!--- FONT-ICONS CSS -->
        <link href="{{ asset('assets/plugins/icons/icons.css') }}" rel="stylesheet" />
        <!-- INTERNAL Switcher css -->
        <link href="{{ asset('assets/switcher/css/switcher.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/switcher/demo.css') }}" rel="stylesheet">
        <!-- Datatable css -->
        <link href="{{ asset('assets/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/datatable/css/buttons.dataTables.min.css') }}" rel="stylesheet" />
        <style>
           .error {
              color: red;
           }
        </style>
        @stack('css')