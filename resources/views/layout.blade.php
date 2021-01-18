<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>

        <link rel="icon sait" href="/image/logo1.jpg" type="image/png">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Seakoo | @yield('title', '')</title>

        <link href="/img/favicon.ico" rel="SHORTCUT ICON" />

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat%7CRoboto:300,400,700" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
        <!-- Google Font -->

        <!-- Css Styles -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('css/elegant-icons.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('css/slicknav.min.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">

        <!-- Stylesheets -->
        <link rel="stylesheet" href="main_style/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="main_style/css/font-awesome.min.css"/>
        <link rel="stylesheet" href="main_style/css/flaticon.css"/>
        <link rel="stylesheet" href="main_style/css/slicknav.min.css"/>
        <link rel="stylesheet" href="main_style/css/jquery-ui.min.css"/>
        <link rel="stylesheet" href="main_style/css/owl.carousel.min.css"/>
        <link rel="stylesheet" href="main_style/css/animate.css"/>
        <link rel="stylesheet" href="main_style/css/style.css"/>
        <link rel="stylesheet" href="{{ asset('main_style/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('main_style/css/style.css') }}">

        <!-- Jquery CDN -->
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="{{ asset('js/jquery.cloud9carousel.js') }}"></script>
        <script src="{{ asset('js/reflection.js') }}"></script>
        <script src="/../../public/js/jquery.cloud9carousel.js"></script>
        <script src="/../../public/js/reflection.js"></script>

        @yield('extra-css')
    </head>


<body class="@yield('body-class', '')">
    @include('partials.nav')

    @yield('content')

    @include('partials.footer')

    @yield('extra-js')

</body>
</html>
