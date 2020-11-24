<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ URL::asset('assets/images/favicon.ico') }}" type="image/x-icon"/>
    <title>{{$title}}</title>

    <!-- jQuery -->
    <script src="{{asset('assets/js/jquery/dist/jquery.min.js')}}"></script>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('assets/css/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- This is a Custom CSS -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <!-- This is a colors CSS -->
    <link href="{{asset('assets/css/colors/default.css')}}" id="theme" rel="stylesheet">

    {{--custom style--}}
    @stack('head')
</head>

<body class="fix-sidebar">

<div id="wrapper">
    <nav class="navbar navbar-default navbar-static-top m-b-0">
        <div class="navbar-header">
            <div class="top-left-part">
                <a class="logo" href="/admin">
{{--add image for logo --}}
                </a>
            </div>

            <ul class="nav navbar-top-links navbar-left">
                <li>
                    <a href="javascript:void(0)" class="open-close waves-effect waves-light visible-xs"><i
                            class="fas fa-bars"></i>
                    </a>
                </li>
            </ul>

            <ul class="nav navbar-top-links navbar-right pull-right">
                <li class="dropdown">
                    <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#">
                        <b class="hidden-xs">{{Auth::user()->name}}</b>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-user animated flipInY">
                        <li>
                            <a href="#"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-power-off"></i>Logout
                            </a>
                        </li>
                        <form id="logout-form" action="/logout" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav slimscrollsidebar">
            <div class="sidebar-head">
                <h3>
                    <span class="fa-fw open-close">
                        <i class="fas fa-align-justify hidden-xs"></i>
                        <i class="fas fa-times visible-xs"></i>
                    </span>
                    <span class="hide-menu">Navigation</span>
                </h3>
            </div>

            <ul class="nav" id="side-menu">

                <li><a href="/" class="waves-effect"><i class="mdi mdi-home fa-fw"></i>
                        <span class="hide-menu">Home</span></a>
                </li>

                <li class="devider"></li>

                <li><a href="/users" class="waves-effect"><i class="mdi mdi-account fa-fw"></i>
                        <span class="hide-menu">User</span></a>
                </li>

                <li><a href="/skills" class="waves-effect"><i class="mdi mdi-power fa-fw"></i>
                        <span class="hide-menu">Skills</span></a>
                </li>

                <li><a href="/works" class="waves-effect"><i class="mdi mdi-wrench fa-fw"></i>
                        <span class="hide-menu">Work Experience</span></a>
                </li>

                <li><a href="/educations" class="waves-effect"><i class="mdi mdi-school fa-fw"></i>
                        <span class="hide-menu">Education</span></a>
                </li>

                <li><a href="/portfolio" class="waves-effect"><i class="mdi mdi-folder-multiple-image fa-fw"></i>
                        <span class="hide-menu">Portfolio</span></a>
                </li>


            </ul>
        </div>
    </div>

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">{{$title}}</h4>
                </div>
            </div>

            <!-- .row -->
            <main class="py-4">
                @yield('content')
            </main>
            <!-- .row -->

        </div>
        <footer class="footer text-center"> 2020 &copy; Created By David Kocharyan. </footer>
    </div>
</div>

</body>
<!-- Bootstrap Core JavaScript -->
<script src="{{asset('assets/css/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- Sidebar menu plugin JavaScript -->
<script src="{{asset('assets/js/sidebar-nav/dist/sidebar-nav.min.js')}}"></script>
<!--Slimscroll JavaScript For custom scroll-->
<script src="{{asset('assets/js/jquery.slimscroll.js')}}"></script>
<!--Wave Effects -->
<script src="{{asset('assets/js/waves.js')}}"></script>
<!-- Custom Theme JavaScript min -->
<script src="{{asset('assets/js/custom.min.js')}}"></script>

{{--custom script--}}
@stack('footer')

</html>
