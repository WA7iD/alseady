<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>{{$info->name}}</title>
    <link rel="shortcut icon" type="image/png" href="{{ url('/') .'/'.$info->icon }}" />

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- IonIcons -->
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dashboard/css/adminlte.css') }}">
    @if (app()->getLocale() == 'ar')
        <!-- Override RTL theme style -->
        <link rel="stylesheet" href="{{ asset('dashboard/css/adminlte-rtl.css') }}">
    @endif
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- CSS addons -->
    @yield('css_addons')
</head>
