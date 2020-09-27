@extends('frontend.layouts.master')
@section('title', 'Login')
@section('content')
    <!-- ========== TITLE START ========== -->

    <div class="title">
        <div class="title-image"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    Log In
                </div>
            </div>
        </div>
    </div>

    <!-- ========== TITLE END ========== -->

    <!-- ========== CONTENT START ========== -->

    <section id="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Log In</h1>
                    <h3>Already a Member? Log in here.</h3>
                    @if(session()->has('message'))
                        <div class="alert alert-danger">
                            {{ session('message') }}
                        </div>
                    @endif
                    <br>
                    <form action="{{ url('user-login') }}" method="post">
                        @csrf
                        <div class="form-group" id="login-login-group">
                            <label for="email">Email</label>
                            <div class="input-group">
                                <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
                                <div class="input-group-addon"></div>
                            </div>
                            @error('email')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group" id="login-password-group">
                            <label for="password">Password</label>
                            <div class="input-group">
                                <input type="password" name="password" class="form-control" id="password" placeholder="&#149;&#149;&#149;&#149;&#149;&#149;&#149;&#149;">
                                <div class="input-group-addon"></div>
                            </div>
                            @error('password')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Remember me
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary">Log In</button>
                        <a href="{{url('/lost-password')}}" class="pull-right">Lost your password?</a>
                    </form>
                </div>

            </div>
        </div>
    </section>

    <!-- ========== CONTENT END ========== -->
@endsection
@section('scripts')
@endsection
