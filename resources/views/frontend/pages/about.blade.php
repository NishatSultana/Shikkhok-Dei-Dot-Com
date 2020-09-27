@extends('frontend.layouts.master')
@section('title', 'About Us')
@section('content')


<!-- ========== TITLE START ========== -->
@include('frontend.partials.about_us_title')
<!-- ========== TITLE END ========== -->

<!-- ========== CONTENT START ========== -->
@include('frontend.partials.about_us_content')
<!-- ========== CONTENT END ========== -->

<!-- ========== OUR SERVICES START ========== -->
@include('frontend.partials.about_us_services')
<!-- ========== OUR SERVICES END ========== -->

@endsection
@section('scripts')
@endsection

