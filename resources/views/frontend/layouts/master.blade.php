<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Online Tutor Finder System">
    <meta name="author" content="codemechanix">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('frontend/images/favicon.png')}}">
    <link href="{{ asset('frontend/css/style.css')}}" rel="stylesheet">
    <script src="{{ asset('frontend/js/html5shiv.js')}}"></script>
    <script src="{{ asset('frontend/js/respond.min.js')}}"></script>
    <![endif]-->

</head>
<body>
<!-- ========== HEADER START ========== -->
@include('frontend.partials.header')
<!-- ========== HEADER END ========== -->

@yield('content')


<!-- ========== FOOTER START ========== -->
@include('frontend.partials.pre_footer')
@include('frontend.partials.footer')
<!-- ========== FOOTER END ========== -->

<!-- Modernizr Plugin -->
<script src="{{ asset('frontend/js/modernizr.custom.97074.js') }}"></script>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{ asset('frontend/js/jquery-1.11.1.min.js') }}"></script>

<!-- Bootstrap Plugins -->
<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>

<!-- Retina Plugin -->
<script src="{{ asset('frontend/js/retina-1.1.0.min.js') }}"></script>

<!-- Superslides Plugin -->
<script src="{{ asset('frontend/js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.animate-enhanced.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.superslides.js') }}"></script>

<!-- Owl Carousel Plugin -->
<script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>

<!-- Parallax ImageScroll Plugin -->
<script src="{{ asset('frontend/js/jquery.parallax-1.1.3.js') }}"></script>

<!-- Fancybox Plugin -->
<script src="{{ asset('frontend/js/jquery.fancybox.js') }}"></script>

<!-- ImagesLoaded Plugin -->
<script src="{{ asset('frontend/js/imagesloaded.pkgd.min.js') }}"></script>

<!-- Masonry Plugin -->
<script src="{{ asset('frontend/js/masonry.pkgd.min.js') }}"></script>

<!-- Progressbar Plugin -->
<script src="{{ asset('frontend/js/bootstrap-progressbar.js') }}"></script>

<!-- Scroll Reveal Plugin -->
<script src="{{ asset('frontend/js/scrollReveal.js') }}"></script>

<!-- Magic Form Processing -->
<script src="{{ asset('frontend/js/magic.js') }}"></script>

<!-- jQuery Settings -->
<script src="{{ asset('frontend/js/settings.js') }}"></script>

@section('scripts')
@show

</body>
</html>
