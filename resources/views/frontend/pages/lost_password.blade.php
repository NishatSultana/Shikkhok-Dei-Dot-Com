@extends('frontend.layouts.master')
@section('title', 'Lost password')
@section('content')
    <!-- ========== TITLE START ========== -->

    <div class="title">
        <div class="title-image"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    Lost password
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
                    @if(session()->has('message'))
                        <div class="alert alert-danger">
                            {{ session('message') }}
                        </div>
                    @endif
                    <br>
                    <h1>Forget Password</h1>
                    <form action="{{url('/forget-password')}}" method="post">
                        @csrf
                        <div class="form-group" id="login-login-group">
                            <label for="login-input-login">Email</label>
                            <div class="input-group">
                                <input type="text" name="email" class="form-control" id="login-input-login" placeholder="Enter Your Email">
                                <div class="input-group-addon"><i class="fa fa-mail-reply"></i></div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>

                    </form>
                </div>

            </div>
        </div>
    </section>

    <!-- ========== CONTENT END ========== -->
@endsection
@section('scripts')
@endsection
