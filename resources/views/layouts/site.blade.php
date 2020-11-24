<!DOCTYPE html>
<html class="no-js oldie ie8" lang="en">
<html class="no-js oldie ie9" lang="en">
<html class="no-js" lang="en">
<head>

    <!--- basic page needs -->
    <meta charset="utf-8">
    <title>David</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('assets/site/css/base.css')}}">
    <link rel="stylesheet" href="{{asset('assets/site/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('assets/site/css/vendor.css')}}">

    <!-- script -->
    <script src="{{asset('assets/site/js/modernizr.js')}}"></script>
    <script src="{{asset('assets/site/js/pace.min.js')}}"></script>

    <!-- favicons -->
    <link rel="icon" type="image/png" href="favicon.png">

</head>

<body id="top">
<!-- header -->
<header>
    <div class="row">
        <div class="top-bar">
            <a class="menu-toggle" href="#"><span>Menu</span></a>
            <div class="logo">
                <a href="/">DAVID</a>
            </div>
            <nav id="main-nav-wrap">
                <ul class="main-navigation">
                    <li class="current"><a class="smoothscroll"  href="#intro" title="">Home</a></li>
                    <li><a class="smoothscroll"  href="#about" title="">About</a></li>
                    <li><a class="smoothscroll"  href="#resume" title="">Resume</a></li>
                    <li><a class="smoothscroll"  href="#portfolio" title="">Portfolio</a></li>
                    <li><a class="smoothscroll"  href="#services" title="">Services</a></li>
                    <li><a class="smoothscroll"  href="#contact" title="">Contact</a></li>
                    <li><a href="styles.html" title="">Style Demo</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>

{{--content--}}
@yield('content')

<!-- footer -->
<footer>
    <div class="row">
        <div class="col-six tab-full pull-right social">
            <ul class="footer-social">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-behance"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
            </ul>
        </div>
        <div class="col-six tab-full">
            <div class="copyright">
                <span>© Copyright David K. .</span>
            </div>
        </div>
        <div id="go-top">
            <a class="smoothscroll" title="Back to Top" href="#top"><i class="fa fa-long-arrow-up"></i></a>
        </div>
    </div>
</footer>

{{--preloade--}}
<div id="preloader">
    <div id="loader"></div>
</div>

<!-- Java Script -->
<script src="{{asset('assets/site/js/jquery-2.1.3.min.js')}}"></script>
<script src="{{asset('assets/site/js/plugins.js')}}"></script>
<script src="{{asset('assets/site/js/main.js')}}"></script>

</body>
</html>
