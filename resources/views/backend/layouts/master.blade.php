<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="shortcut icon" href="{{ asset('backend/img/favicon.ico')}}"/>
    <!-- global css -->
    <link type="text/css" rel="stylesheet" href="{{ asset('backend/css/app.css')}}"/>
    <!-- end of global css -->
    <!--page level css -->
    <link rel="stylesheet" href="{{ asset('backend/vendors/swiper/css/swiper.min.css')}}">
    <link href="{{ asset('backend/vendors/nvd3/css/nv.d3.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('backend/vendors/lcswitch/css/lc_switch.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/custom.css')}}">
    <link rel="stylesheet" href="{{ asset('backend/css/custom_css/skins/skin-default.css')}}" type="text/css"
          id="skin"/>
    <link href="{{ asset('backend/css/custom_css/dashboard1.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('backend/css/custom_css/dashboard1_timeline.css')}}" rel="stylesheet"/>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @section('header_scripts')
    @show

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!--end of page level css-->
</head>
<body class="skin-default">
<div class="preloader">
    <div class="loader_img"><img src="{{ asset('backend/img/loader.gif')}}" alt="loading..." height="64" width="64">
    </div>
</div>
<!-- header logo: style can be found in header-->
<header class="header">
    @include('backend.partials._navbar')
</header>
<div class="wrapper row-offcanvas row-offcanvas-left" id="app">
<!-- Left side column. contains the logo and sidebar -->
@include('backend.partials._sidebar')
<aside class="right-side" id="app">
        <section class="content-header">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-5 col-xs-8">
                    <div class="header-element">
                        <h3> @yield('content_header')</h3>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="row">
                @if(session()->has('message'))
                    <div class="alert
						<?php if(session()->has('alert_tag')) : ?>
                    {{ session('alert_tag') }}
                    <?php else : ?>
                        alert-success
                     <?php endif ?>
                        " style="margin-bottom: 5px">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
        </section>
        @yield('content')
        <!-- /.content -->
    </aside>
<!-- /.right-side -->
</div>
<!-- ./wrapper -->
<!-- global js -->
<div id="qn"></div>
<script src="{{ asset('backend/ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/g/bootstrap@3.3.7,bootstrap.switch@3.3.2,jquery.nicescroll@3.6.0"></script>
<script src="{{ asset('backend/js/app.js')}}" type="text/javascript"></script>
<!-- end of global js -->
<!-- end of page level js -->
@section('scripts')

@show
</body>
</html>
