@extends('backend.layouts.master')

@section('title', 'Job Information Details')

@section('content_header', 'Job Information Details')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel pages">
                    <div class="panel-heading  clearfix">
                        <h3 class="panel-title">
                            @include('jobs.partial.listButton')
                            @include('jobs.partial.addButton')
                        </h3>
                    </div>
                    <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="tutor_type" class="control-label">Tutor Type
                                            <sup class="text-danger">*</sup></label>
                                        <select name="tutor_type" class="form-control" readonly="readonly">
                                            @if($jobs->tutor_type==1)
                                                <option value="1" selected>Home Tutoring</option>
                                            @elseif($jobs->tutor_type==2)
                                                <option value="2" selected>Online Tutoring</option>
                                            @elseif($jobs->tutor_type==3)
                                                <option value="3" selected>Group Tutoring</option>
                                            @elseif($jobs->tutor_type==4)
                                                <option value="4" selected>Package Tutoring</option>
                                            @endif

                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="institute_name" class="control-label">Institute Name
                                            <sup class="text-danger">*</sup></label>
                                        <input type="text" id="institute_name"
                                               class="form-control" name="institute_name"
                                               placeholder="Enter Student Institute Name"
                                               value="{{$jobs->institute_name}}"
                                               readonly
                                               autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="job_location" class="control-label">Job Location
                                            <sup class="text-danger">*</sup></label>
                                        <input type="text" name="job_location"
                                               class="form-control" id="job_location"
                                               placeholder="Enter Job location"
                                               value="{{$jobs->job_location}}" readonly
                                               required="required" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="day_per_week" class="control-label">Days/Week
                                            <sup class="text-danger">*</sup></label>
                                        <select name="day_per_week" class="form-control" readonly="readonly">
                                            @if($jobs->day_per_week==1)
                                                <option value="1" selected>1 Day/Week</option>
                                            @elseif($jobs->day_per_week==2)
                                                <option value="2" selected>2 Day/Week</option>
                                            @elseif($jobs->day_per_week==3)
                                                <option value="3" selected>3 Day/Week</option>
                                            @elseif($jobs->day_per_week==4)
                                                <option value="4" selected>4 Day/Week</option>
                                            @elseif($jobs->day_per_week==5)
                                                <option value="5" selected>5 Day/Week</option>
                                            @elseif($jobs->day_per_week==6)
                                                <option value="6" selected>6 Day/Week</option>
                                            @elseif($jobs->day_per_week==7)
                                                <option value="7" selected>7 Day/Week</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="student_gender" class="control-label">Student Gender
                                            <sup class="text-danger">*</sup></label>
                                        <select name="student_gender" class="form-control" readonly="readonly">
                                            @if($jobs->student_gender==1)
                                                <option value="">Select Student Gender</option>
                                                <option value="1" selected>Male</option>
                                                <option value="2">Female</option>
                                            @elseif($jobs->student_gender==2)
                                                <option value="">Select Student Gender</option>
                                                <option value="1">Male</option>
                                                <option value="2" selected>Female</option>
                                            @else
                                                <option value="" selected>Select Student Gender</option>
                                                <option value="1">Male</option>
                                                <option value="2">Female</option>
                                            @endif
                                        </select>
                                        @error('student_gender')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="student_category" class="control-label">Student Category
                                            <sup class="text-danger">*</sup></label>
                                        <select name="student_category" id="student_category" class="form-control"
                                                required="required" readonly="readonly">
                                            @if($jobs->student_category==1)
                                                <option value="1" selected>Bangla Medium</option>
                                            @elseif($jobs->student_category==2)
                                                <option value="2" selected>English Medium</option>
                                            @elseif($jobs->student_category==3)
                                                <option value="3" selected>English Version</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="tutor_gender" class="control-label">Tutor Gender
                                            <sup class="text-danger">*</sup></label>
                                        <select name="tutor_gender" id="tutor_gender" class="form-control" readonly="readonly"
                                                required="required">
                                            @if($jobs->tutor_gender==1)
                                                <option value="1" selected >Male</option>
                                            @elseif($jobs->tutor_gender==2)
                                                <option value="2" selected>Female</option>
                                            @elseif($jobs->tutor_gender==3)
                                                <option value="3" selected>Any</option>
                                            @endif

                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="student_class" class="control-label">Student Class
                                            <sup class="text-danger">*</sup></label>
                                        <input type="text" name="student_class"
                                               id="student_class"
                                               class="form-control" readonly
                                               placeholder="Enter Student Class"
                                               value="{{$jobs->student_class}}"
                                               autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="subject_list" class="control-label">Subject List
                                            <sup class="text-danger">*</sup></label>
                                        <input type="text" name="subject_list"
                                               class="form-control" id="subject_list"
                                               placeholder="Enter Subject List exp. bangla, english"
                                               value="{{$jobs->subject_list}}"
                                               readonly autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="hiring_time" class="control-label">Hiring Date
                                            <sup class="text-danger">*</sup></label>
                                        <input type="text" name="hiring_time"
                                               class="form-control" id="hiring_time"
                                               value="{{$jobs->hiring_time->format('Y-m-d')}}"
                                               readonly autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="no_of_students" class="control-label">Number of Students
                                            <sup class="text-danger">*</sup></label>
                                        <input type="number" name="no_of_students"
                                               class="form-control" id="no_of_students"
                                               placeholder="Enter Subject List exp. bangla, english"
                                               value="{{$jobs->no_of_students}}"
                                               readonly autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="salary" class="control-label">Salary Range (Taka)
                                            <sup class="text-danger">*</sup></label>
                                        <input type="number" name="salary"
                                               class="form-control" id="salary"
                                               placeholder="Enter Salary Range/Negotiation"
                                               value="{{$jobs->salary}}"
                                               readonly autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="requirements" class="control-label">More about your Requirement
                                            <sup class="text-danger">*</sup></label>
                                        <textarea type="text"
                                                  class="form-control" id="requirements" rows="4"
                                                  placeholder="More about your Requirement"
                                                  readonly
                                                  autocomplete="off">{{$jobs->requirements}}</textarea>
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
