<!doctype html>
<html lang="fr">
<head>
    <title>Finances</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">

</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">


<div id="overlayer"></div>
<div class="loader">
    <div class="spinner-border text-primary" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>


<div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>


    <header class="site-navbar js-sticky-header site-navbar-target" role="banner">

        <div class="container">
            <div class="row align-items-center">

                <div class="col-6 col-xl-2">
                    <h1 class="mb-0 site-logo"><a href="{{url('/')}}" class="h2 mb-0">DigitalCash.</a></h1>
                </div>

                <div class="col-12 col-md-10 d-none d-xl-block">
                    <nav class="site-navigation position-relative text-right" role="navigation">

                        <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                            <li><a href="#home-section" class="nav-link">Accueil</a></li>
                            <li class="has-children">
                                <a href="#about-section" class="nav-link">A propos de Nous</a>
                                <ul class="dropdown">
                                    <li><a href="#team-section" class="nav-link">Equipe</a></li>
                                    <li><a href="#pricing-section" class="nav-link">Tarif</a></li>
                                    <li><a href="#services-section" class="nav-link">Services</a></li>
                                    <li><a href="#testimonials-section" class="nav-link">Temoignages</a></li>

                                </ul>
                            </li>


{{--                            <li><a href="{{url('connexion')}}" class="nav-link">Se connecter</a></li>--}}
                            <li><a href="#contact-section" class="nav-link">Contact</a></li>
                                @auth()
                                    <form class="nav-item float-end mt-3" method="post" role="search" action="{{route('deconnexion')}}">
                                        @csrf
                                        @method('delete')
                                        <button class="nav-link btn-sm  bn btn-danger">Se deconnecter</button>
                                    </form>
                                @endauth
                                @guest()
                                        <li><a href="{{route('inscription')}}" class="nav-link">S'inscrire</a></li>

                                        <li><a class="nav-link" href="{{route('connexion')}}"> Se connecter</a></li>
                                @endguest




                        </ul>
                    </nav>
                </div>


                <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle float-right"><span class="icon-menu h3"></span></a></div>

            </div>
        </div>

    </header>
    @yield('content')

@include('layout.footer')
