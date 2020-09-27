@extends('backend.layouts.master')
@section('title', 'Video Chat')
@section('content_header', 'Video Chat')
@section('content')
<video-chat :user="{{ $user }}" :others="{{ $others }}" pusher-key="{{ config('broadcasting.connections.pusher.key') }}" pusher-cluster="{{ config('broadcasting.connections.pusher.options.cluster') }}"></video-chat>
@endsection