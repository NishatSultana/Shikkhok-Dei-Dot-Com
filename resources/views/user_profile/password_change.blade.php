@extends('backend.layouts.master')

@section('title', 'Change Password')

@section('content_header', 'Change Password')

@section('content')
    <section class="content">
        <div class="col-lg-12">
            <div class="panel pages">
                <div class="panel-body">
                    <form action="{{url('/password-update')}}" method="POST">
                        @csrf
                        @if($user->password)
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="old_password" class="control-label">Current Password <sup class="text-danger">*</sup></label>
                                    <input type="password" name="old_password" class="form-control form-control-lg" id="old_password" placeholder="Enter Current password" maxlength="128" required="required">
                                    @error('old_password')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <span class="required_msg" id="id_old_pass" style="color:red"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="password" class="control-label">New Password <sup class="text-danger">*</sup></label>
                                    <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="Enter New password" maxlength="128" required="required">
                                    @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <span class="required_msg" id="id_new_pass" style="color:red"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="confpass" class="control-label">Retype New Password <sup class="text-danger">*</sup></label>
                                    <input type="password" name="confpass" class="form-control form-control-lg" id="confpass" placeholder="Enter Retype New password" maxlength="128" required="required">
                                    @error('confpass')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <span class="required_msg" id="id_retype_new_pass" style="color:red"></span>
                                    <span class="required_msg" id="success_message" style="color:green"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            </div>
                        </div>
                        @else
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="password" class="control-label">New Password <sup class="text-danger">*</sup></label>
                                        <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="Enter New password" maxlength="128" required="required">
                                        <span class="required_msg" id="id_new_pass" style="color:red"></span>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="passwordchange" value="1"/>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="confpass" class="control-label">Retype New Password <sup class="text-danger">*</sup></label>
                                        <input type="password" name="confpass" class="form-control form-control-lg" id="confpass" placeholder="Enter Retype New password" maxlength="128" required="required">
                                        <span class="required_msg" id="id_retype_new_pass" style="color:red"></span>
                                        <span class="required_msg" id="success_message" style="color:green"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">Save</button>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
<script>
    var allowsubmit = false;
    $(function () {
        //on keypress
        $('#confpass').keyup(function (e) {
            //get values
            var pass = $('#password').val();
            var oldpass = $.trim($('#old_password').val());
            var confpass = $.trim($(this).val());
            if (oldpass !== '') {
                //check the strings
                if (pass === confpass) {
                    $('#success_message').text('Password matching');
                    $('#id_old_pass').text('');
                    $('#id_retype_new_pass').text('');
                    //if both are same remove the error and allow to submit
                    allowsubmit = true;
                } else {
                    $('#success_message').text('');
                    $('#id_old_pass').text('');
                    //if not matching show error and not allow to submit
                    $('#id_retype_new_pass').text('These passwords dont match.');
                    allowsubmit = false;
                }
            } else {
                $('#id_retype_new_pass').text('');
                $('#success_message').text('');
                $('#id_old_pass').text('Current Password Require.');
                allowsubmit = false;
            }
        });
        //jquery form submit
        $('#form').submit(function () {
            var pass = $('#password').val();
            var confpass = $('#confpass').val();
            if (pass === confpass && pass.length > 5) {
                return true;
            } else {
                return false;
            }
        });
    });
</script>
<script>
    var allowsubmit = false;
    $(function () {
        //on keypress
        $('#new_confpass').keyup(function (e) {
            //get values
            var pass = $('#new_password').val();
            var confpass = $.trim($(this).val());
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
        //jquery form submit
        $('#form').submit(function () {
            var pass = $('#new_password').val();
            var confpass = $('#new_confpass').val();
            if (pass === confpass && pass.length > 5) {
                return true;
            } else {
                return false;
            }
        });
    });
</script>
@endsection
