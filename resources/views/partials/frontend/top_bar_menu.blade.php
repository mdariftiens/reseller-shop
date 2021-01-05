<div class="">
    <nav class="navmain navbar navbar-expand-lg ">
        <a class="navbar-brand" href="#"><img class="logo" src="{{ asset('frontend/images/logo.png') }}" alt=""></a>
        <!--<ul class="navbar-nav mr-auto">-->
        <!--<li class="nav-item active">-->
        <!--<a class="nav-link">Left Link 1</a>-->
        <!--</li>-->
        <!--<li class="nav-item">-->
        <!--<a class="nav-link">Left Link 2</a>-->
        <!--</li>-->
        <!--</ul>-->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><nuxt-link to="/" class="nav-link">Home</nuxt-link></li>
            <li class="nav-item"><nuxt-link to="/delivery" class="nav-link">Delivery</nuxt-link></li>
            <li class="nav-item"><nuxt-link to="/reseller" class="nav-link">Reseller</nuxt-link></li>
            <li class="nav-item"><nuxt-link to="/tracking" class="nav-link">Tracking</nuxt-link></li>
            <!-- <li class="nav-item"><nuxt-link to="/blog" class="nav-link">Blog</nuxt-link></li> -->
            <li class="nav-item"><a href="{{ route('login') }}">Signin</a></li>
            <li class="nav-item">
                <a class="facebook-login btn btn-sm btn-primary" @click="fbCheckLoginState()">Continue With Facebook </a>
                <!--
                                        <fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
                                        </fb:login-button> -->
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="globe" src="https://www.jassreseller.com.bd/imgs/globe.png" alt=""> English
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <img class="globe" src="https://www.jassreseller.com.bd/imgs/globe.png" alt=""> Bangla
                    </a>
                    <div class="dropdown-divider"></div>

                </div>
            </li>
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
