<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://gate.dinamika.ac.id/static/img/icon-stikom.png">
    <title>Wishlist</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />
    <style>
        header[role="banner"] #logo-main {
            display: block;
            margin: 1rem auto;
        }

        #navbar-primary.navbar-default {
            background: transparent;
            border: none;
        }

        #navbar-primary.navbar-default .navbar-nav {
            width: 100%;
            text-align: center;
        }

        #navbar-primary.navbar-default .navbar-nav>li {
            display: inline-block;
            float: none;
        }

        #navbar-primary.navbar-default .navbar-nav>li>a {
            padding-left: 30px;
            padding-right: 30px;
        }

        .social-media-nav {
            position: absolute;
            right: 0;
            top: 2rem;
        }

        .carousel-control-next,
        .carousel-control-prev {
            width: 7%;
        }

        .text-pink {
            color: #fe007b;
        }

        .bg-pink {
            background-color: #fe007b;
        }

        .bg-purple {
            background-color: #a55cfe;
        }

        .bg-dessertsun {
            background-color: #f9e0d9;
        }

        .bg-green {
            background-color: #01e29b;
        }

        /* CSS */
        .btn-outline-wishlist {
    color: #fe007b;
    border-color: #fe007b;
}
.btn-outline-wishlist:hover {
    color: #fff;
    background-color: #fe007b;
    border-color: #fe007b;
}
.btn-outline-wishlist.focus,
.btn-outline-wishlist:focus {
    box-shadow: 0 0 0 0.2rem rgba(230, 25, 137, 0.5);
}
.btn-outline-wishlist.disabled,
.btn-outline-wishlist:disabled {
    color: #fe007b;
    background-color: transparent;
}
.btn-outline-wishlist:not(:disabled):not(.disabled).active,
.btn-outline-wishlist:not(:disabled):not(.disabled):active,
.show > .btn-outline-wishlist.dropdown-toggle {
    color: #fff;
    background-color: #fe007b;
    border-color: #fe007b;
}
.btn-outline-wishlist:not(:disabled):not(.disabled).active:focus,
.btn-outline-wishlist:not(:disabled):not(.disabled):active:focus,
.show > .btn-outline-wishlist.dropdown-toggle:focus {
    box-shadow: 0 0 0 0.2rem rgba(230, 25, 137, 0.5);
}
        /* css */

        @media all and (min-width: 992px) {
            .navbar .nav-item .dropdown-menu {
                display: none;
            }

            /* .navbar .nav-item:hover .nav-link{ color: #fff;  } */
            .navbar .nav-item:hover .dropdown-menu {
                display: block;
            }

            .navbar .nav-item .dropdown-menu {
                margin-top: 0;
            }
        }

        .card,
        .card-img,
        .card-img-top {
            border-radius: 0;
        }

        .polygon-test {
            clip-path: polygon(0 13%, 100% 0, 100% 100%, 0 87%);
        }

        .title-text {
            color: #fe007b;
            text-shadow: 2px 2px #FFF;
        }

    </style>
</head>

<body>
    @include('layouts.components.header')

    @yield('content')

    @include('layouts.components.footer')
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
</body>

</html>
