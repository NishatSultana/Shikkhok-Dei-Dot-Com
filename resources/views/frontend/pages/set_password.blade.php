@extends('frontend.layouts.master')
@section('title', 'Set New Password')
@section('content')
    <!-- ========== TITLE START ========== -->

    <div class="title">
        <div class="title-image"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    Set New Password
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
                        <br>
                    @endif
                    <h1>Set Password</h1>
                    <form action="{{url('/passwordupdate')}}" method="post">
                        @csrf
                        <div class="form-group" id="register-email-group">
                            <label for="password">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" name="password" id="password"
                                       placeholder="Enter your password" required>
                                <div class="input-group-addon"><i class="fa fa-pagelines"></i></div>
                            </div>
                            @error('password')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <input type="hidden" name="token" value="{{$token}}">
                        <div class="form-group" id="register-email-group">
                            <label for="repeat_password">Repeat Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" name="repeat_password" id="repeat_password"
                                       placeholder="Enter your repeat password" required>
                                <div class="input-group-addon"><i class="fa fa-pagelines"></i></div>
                            </div>
                            <span class="required_message" id="id_retype_new_password" style="color:red"></span>
                            <span class="required_message" id="success_msg" style="color:green"></span>
                            @error('repeat_password')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== CONTENT END ========== -->
@endsection
@section('scripts')
    <script>
        var allowsubmit = false;
        $(function () {
            //on keypress
            $('#repeat_password').keyup(function (e) {
                //get values
                let pass = $.trim($('#password').val());
                let confpass = $.trim($('#repeat_password').val());

                if (pass === confpass) {
                    $('#success_msg').text('Password matching');
                    $('#id_retype_new_password').text('');
                    //if both are same remove the error and allow to submit
                    allowsubmit = true;
                } else {
                    $('#success_msg').text('');
                    //if not matching show error and not allow to submit
                    $('#id_retype_new_password').text('These passwords dont match.');
                    allowsubmit = false;
                }
            });
        });
    </script>
@endsection
