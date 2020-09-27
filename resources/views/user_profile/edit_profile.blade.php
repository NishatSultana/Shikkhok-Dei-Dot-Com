@extends('backend.layouts.master')

@section('title', 'Change Profile')

@section('content_header', 'Change Profile')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel pages">
                    <div class="panel-heading  clearfix">
                        <h3 class="panel-title">
                            @include("user_profile.partial.showButton")
                        </h3>
                    </div>
                    <div class="panel-body">
                        <form action="{{url('update-profile')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="full_name" class="control-label">Full Name
                                            <sup class="text-danger">*</sup></label>
                                        <input type="text" name="full_name"
                                               class="form-control" id="full_name"
                                               placeholder="Enter Full Name" value="{{$templateUser->full_name}}"
                                               required="required" autocomplete="off">
                                        @error('full_name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email" class="control-label">Email</label>
                                        <input type="email"
                                               class="form-control"
                                               value="{{$templateUser->email}}"
                                               autocomplete="off" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="mobile" class="control-label">Mobile Number
                                            <sup class="text-danger">*</sup></label>
                                        <input type="text" name="mobile"
                                               class="form-control" id="mobile"
                                               placeholder="Enter your mobile" value="{{$templateUser->mobile}}"
                                               required="required" autocomplete="off">
                                        @error('mobile')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="dob" class="control-label">Date of Birth
                                            <sup class="text-danger">*</sup></label>
                                        @if($templateUser->dob)
                                            <input type="date" name="dob"
                                                   class="form-control" id="dob"
                                                   value="{{$templateUser->dob->format('Y-m-d')}}"
                                                   required="required" autocomplete="off">
                                        @else
                                            <input type="date" name="dob"
                                                   class="form-control" id="dob"
                                                   value=""
                                                   required="required" autocomplete="off">
                                        @endif
                                        @error('dob')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="gender" class="control-label">Gender
                                            <sup class="text-danger">*</sup></label>
                                        <select name="gender" class="form-control" required="required">
                                            <option value="" selected>Select Gender</option>
                                            @if(strtolower($templateUser->gender) == '1')
                                                <option value="1" selected>Male</option>
                                                <option value="2">Female</option>
                                            @elseif(strtolower($templateUser->gender) == '2')
                                                <option value="2" selected>Female</option>
                                                <option value="1">Male</option>
                                            @else
                                                <option value="1">Male</option>
                                                <option value="2">Female</option>
                                            @endif
                                        </select>
                                        @error('gender')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="dob" class="control-label">Group</label>
                                        <input type="text"
                                               class="form-control"
                                               value="{{$templateUser->group->name}}"
                                               readonly autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="profile_pic" class="control-label">Profile Picture
                                            <sup class="text-danger">*</sup></label>
                                        <input type="file" name="profile_pic"
                                               class="form-control" id="imgInp"
                                               placeholder="Enter Full Name" accept=".jpeg,.png,.jpg,.gif,.svg"
                                               autocomplete="off">
                                        @if(!$templateUser->profile_pic)
                                            <img style="border-radius: 50%;visibility: hidden;" id="blah" src=""
                                                 alt="User Image"
                                                 height="80px" width="80px"/>
                                        @else
                                            <img style="border-radius: 50%;" id="blah"
                                                 src="{{asset('storage/user_image/'.$templateUser->profile_pic)}}"
                                                 alt="Company Image"
                                                 height="80px" width="80px"/>
                                        @endif
                                        @error('profile_pic')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="created_at" class="control-label">Created Profile</label>
                                        <input type="text"
                                               class="form-control"
                                               value="{{$templateUser->created_at}}"
                                               autocomplete="off" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="present_address" class="control-label">Present Address
                                            <sup class="text-danger">*</sup></label>
                                        <input type="text" name="present_address"
                                               class="form-control" id="present_address"
                                               placeholder="Enter Present Address"
                                               value="{{$templateUser->present_address}}"
                                               required="required" autocomplete="off">
                                        @error('present_address')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="permanent_address" class="control-label">Permanent Address
                                            <sup class="text-danger">*</sup></label>
                                        <input type="text" name="permanent_address"
                                               class="form-control" id="permanent_address"
                                               placeholder="Enter Permanent Address"
                                               value="{{$templateUser->permanent_address}}"
                                               required="required" autocomplete="off">
                                        <label for="copy_present_address"></label>
                                        <input type="checkbox" id="copy_present_address" name="copy_present_address">
                                        <span style="background: #e7e7e7;">Same As Present Address</span>
                                        @error('permanent_address')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="bio" class="control-label">Bio (brief intro)
                                            <sup class="text-danger">*</sup></label>
                                    <textarea name="bio" id="bio" class="form-control resize_vertical"
                                              rows="4" data-bv-field="bio" autocomplete="off" placeholder="Enter your Bio"
                                              spellcheck="false">{{$templateUser->bio}}</textarea>
                                        @error('bio')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <button class="btn btn-success">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>

        document.getElementById("imgInp").onclick = function () {
            document.getElementById("blah").style.visibility = "visible";
        };

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function () {
            readURL(this);
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#copy_present_address").on("click", function () {
                let permanent_address = $.trim($("#present_address").val());
                if(permanent_address !== '')
                {
                    if($(this).is(":checked")) {
                        console.log(1)
                        $('#permanent_address').val(permanent_address);
                    }else{
                        $("#permanent_address").val('');
                    }
                } else {
                    alert('Present Address is empty');
                    return false;
                }

            });
        });
    </script>

@endsection
