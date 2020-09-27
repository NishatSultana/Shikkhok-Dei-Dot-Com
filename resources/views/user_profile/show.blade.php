@extends('backend.layouts.master')

@section('title', 'Profile Details')

@section('content_header', 'Profile Details')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel pages">
                    <div class="panel-heading  clearfix">
                        <h3 class="panel-title">
                            @include("user_profile.partial.editButton")
                        </h3>
                    </div>
                    <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="full_name" class="control-label">Full Name
                                            </label>
                                        <input type="text" name="full_name" id="full_name"
                                               class="form-control"
                                               value="{{$templateUser->full_name}}" readonly
                                               autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email" class="control-label">Email</label>
                                        <input type="email" name="email" id="email"
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
                                            </label>
                                        <input type="text" name="mobile" id="mobile"
                                               class="form-control"
                                               value="{{$templateUser->mobile}}" readonly
                                               autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="dob" class="control-label">Date of Birth
                                            </label>
                                        @if($templateUser->dob)
                                            <input type="date" name="dob"
                                                   class="form-control" id="dob"
                                                   value="{{$templateUser->dob->format('Y-m-d')}}" readonly
                                                   autocomplete="off">
                                        @else
                                            <input type="date" name="dob"
                                                   class="form-control" id="dob"
                                                   value=""
                                                   required="required" autocomplete="off">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="gender" class="control-label">Gender
                                            </label>
                                        <select name="gender" class="form-control" readonly>
                                            @if(strtolower($templateUser->gender) == '1')
                                                <option value="1" selected>Male</option>
                                            @elseif(strtolower($templateUser->gender) == '2')
                                                <option value="2" selected>Female</option>
                                            @endif
                                        </select>
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
                                            </label>
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
                                            </label>
                                        <input type="text" name="present_address"
                                               class="form-control" id="present_address"
                                               placeholder="Enter Present Address"
                                               value="{{$templateUser->present_address}}" readonly
                                               autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="permanent_address" class="control-label">Permanent Address
                                            </label>
                                        <input type="text" name="permanent_address"
                                               class="form-control" id="permanent_address"
                                               placeholder="Enter Permanent Address"
                                               value="{{$templateUser->permanent_address}}" readonly
                                               autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="bio" class="control-label">Bio (brief intro)
                                            </label>
                                        <textarea name="bio" id="bio" class="form-control resize_vertical" readonly
                                                  rows="4" data-bv-field="bio" autocomplete="off" placeholder="Enter your Bio"
                                                  spellcheck="false">{{$templateUser->bio}}</textarea>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
@endsection
