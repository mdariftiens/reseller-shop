<div class="">
    <nav class="navmain navbar navbar-expand-lg ">
        <a class="navbar-brand" href="#"><img class="logo" src="{{ asset('frontend/images/logo.png') }}" alt=""></a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item nav-link"><a href="/">Home</a></li>
            <li class="nav-item nav-link"><a href="{{ route('reseller') }}">Reseller</a></li>
            <li class="nav-item nav-link"><a href="{{ route('tracking') }}">Tracking</a></li>
            <li class="nav-item nav-link"><a href="{{ route('register') }}">Register</a></li>
            <li class="nav-item nav-link"><a href="{{ route('login') }}">Signin</a></li>
            <li class="nav-item nav-link"><a class="facebook-login btn btn-sm btn-primary">Continue With Facebook </a></li>

        </ul>
    </nav>
</div>

<style>

    .navmain{
        padding-top: 15px;
    }
    .navmain .nav-item a{
        font-weight: 500;
        font-size: 15px;
    }
    .logo{
        width: 220px;;
    }
    .globe{
        margin-right: 5px;
        width: 24px;
    }
    .facebook-login{
        color: #FFF  !important;
    }
    /* Stackoverflow preview fix, please ignore */
    .navbar-nav {
        flex-direction: row;
    }

    .nav-link {
        padding-right: .5rem !important;
        padding-left: .5rem !important;
    }

    /* Fixes dropdown menus placed on the right side */
    .ml-auto .dropdown-menu {
        left: auto !important;
        right: 0px;
    }
</style>
