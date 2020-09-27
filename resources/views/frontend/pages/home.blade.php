@extends('frontend.layouts.master')
@section('title', 'Home')
@section('content')

    <div id="home"></div>
    <!-- ========== HEADER START ========== -->
    @include('frontend.partials.header')
    <!-- ========== HEADER END ========== -->

    <!-- ========== BANNER START ========== -->
    @include('frontend.partials.slider')
    <!-- ========== BANNER END ========== -->

    <!-- ========== WELCOME START ========== -->
    @include('frontend.partials.coursetopic')
    <!-- ========== WELCOME END ========== -->

    <!-- ========== RECENT COURSES START ========== -->
{{--    @include('frontend.partials.recent_course_list')--}}
    <!-- ========== RECENT COURSES END ========== -->

    <!-- ========== FEATURED TEACHERS START ========== -->
    @include('frontend.partials.teacher')
    <!-- ========== FEATURED TEACHERS END ========== -->

    <!-- ========== REVIEWS START ========== -->
    @include('frontend.partials.reviews')
    <!-- ========== REVIEWS END ========== -->

@endsection
@section('scripts')
@endsection
