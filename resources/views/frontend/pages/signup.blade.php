@extends('frontend.layouts.master')
@section('title', 'REGISTER HERE')
@section('content')
    <!-- ========== TITLE START ========== -->

    <div class="title">
        <div class="title-image"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    REGISTER HERE
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
                    <h1>Register</h1>
                    <h3>Do not have an account? Register here.</h3>
                    <form action="{{url('/signup')}}" method="post">
                        @csrf
                        <div class="form-group" id="register-login-group">
                            <label for="name">Name</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="full_name" id="name"
                                       placeholder="Enter your name" required>
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                            </div>
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group" id="register-email-group">
                            <label for="email">Email</label>
                            <div class="input-group">
                                <input type="email" class="form-control" name="email" id="email"
                                       placeholder="Enter your Email" required>
                                <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                            </div>
                            @error('email')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group" id="register-email-group">
                            <label for="mobile">Mobile Number</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="mobile" id="mobile"
                                       placeholder="Enter your Mobile Number" required>
                                <div class="input-group-addon"><i class="fa fa-mobile"></i></div>
                            </div>
                            @error('mobile')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group" id="register-email-group">
                            <label for="profession">Status</label>
                            <div class="input-group">
                                <select class="form-control" name="profession" id="profession" required>
                                    <option value="">Select Status</option>
                                    <option value="1">Student/Guardian</option>
                                    <option value="2">Tutor</option>
                                </select>
                                <div class="input-group-addon"><i class="fa fa-codepen"></i></div>
                            </div>
                            @error('profession')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
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
                        <div class="form-group" id="register-email-group">
                            <label for="repeat_password">Repeat Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" name="repeat_password" id="repeat_password"
                                       placeholder="Enter your password" required>
                                <div class="input-group-addon"><i class="fa fa-pagelines"></i></div>
                            </div>
                            <span class="required_message" id="id_retype_new_password" style="color:red"></span>
                            <span class="required_message" id="success_msg" style="color:green"></span>
                            @error('repeat_password')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <button type="submit" class="btn btn-primary">Register</button>
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
