<html>
<head>
    <title>
        @yield('title','Dashboard')
    </title>


    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta name="description" content="{{ config('shop.shop_description') }}" />

    <link rel="icon" type="image/x-icon" href="{{ asset('frontend/favicon.png') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" href="{{ asset('frontend/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/fontawesome/css/all.css') }}" />


    <script src="{{ asset('frontend/bootstrap/js/umd_popper.min.js') }}"></script>
    <script src="{{ asset('frontend/bootstrap/js/umd_popper.min.js') }}"></script>
    <script src="{{ asset('frontend/bootstrap/js/jquery-3.3.1.slim.min.js') }}"></script>
    <script src="{{ asset('frontend/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/html2pdf.bundle.js') }}"></script>
    <script src="{{ asset('frontend/js/app.js') }}"></script>
    <script src="{{ asset('frontend/js/fb.js') }}"></script>



    @stack('head_start_style')
    @stack('head_start_script')

    @include('partials.frontend.header_style')
    @include('partials.frontend.header_script')

    @stack('head_end_style')
    @stack('head_end_script')
</head>
<body>
    @include('partials.frontend.top_bar_menu')

    @yield('content')

    @include('partials.frontend.footer')


</body>
</html>
