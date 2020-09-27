@extends('frontend.layouts.master')
@section('title', 'Teacher List')
@section('content')

    <!-- ========== TITLE START ========== -->
    @include('frontend.partials.teacher_title')
    <!-- ========== TITLE END ========== -->

    <!-- ========== TEACHERS START ========== -->
    @include('frontend.partials.teacher_list')
    <!-- ========== TEACHERS END ========== -->

@endsection
@section('scripts')
@endsection
