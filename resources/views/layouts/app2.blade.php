<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo($title); ?> | iTalk</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <link rel="manifest" href="site.webmanifest">
    <link rel="icon" type="image/png" href="{{ asset('img//favicon.png') }}" sizes="16x16">
    <link rel="icon" type="image/png" href="{{ asset('img//favicon@2x.png') }}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{ asset('img//favicon@6x.png') }}" sizes="96x96">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{ url('/css/main.css') }}">

    <!-- Javascript libraries -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="/js/parsley.js"></script>
    <script src="/js/jquery.mask.min.js"></script>
    <script src="/js/jquery.polymask.js"></script> -->

    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="{{URL::route('home')}}">
                <img src="{{ asset('img//iTalk.png') }}" height=50px></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="">REGISTER</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">DOWNLOAD</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">ABOUT ITALK</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">CONTACT US</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>    
</head>

<body>
    @yield('content')
</body>
 
@extends('layouts.footer')

<script type="text/javascript">
    $(window).scroll(function(){
        $(".footer1").css("opacity", 1 - $(window).scrollTop() / 350);
    });
</script>