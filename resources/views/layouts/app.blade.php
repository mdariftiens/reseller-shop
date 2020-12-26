<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        @yield('title','Dashboard')
    </title>


    @stack('head_start_style')
    @stack('head_start_script')

    @include('partials.dashboard.header_script')

    @stack('head_end_style')
    @stack('head_end_script')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        @include('partials.dashboard.navbar.header_left_navbar')

        <!-- Right navbar links -->
        @include('partials.dashboard.navbar.header_right_navbar')

    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('partials.dashboard.main_sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">@yield('dashboard_title')</h1>
                    </div><!-- /.col -->
                    {{--
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div>--}}
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @yield('content')
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @include('partials.dashboard.footer')

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
    @stack('footer_start_style')
    @stack('footer_start_script')

    @include('partials.dashboard.footer_js')

    @stack('footer_end_style')
    @stack('footer_end_script')
</body>
</html>
