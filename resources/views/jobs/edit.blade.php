@extends('backend.layouts.master')

@section('title', 'Change Job Information')

@section('content_header', 'Change Job Information')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel pages">
                    <div class="panel-heading  clearfix">
                        <h3 class="panel-title">
                            @include('jobs.partial.listButton')
                        </h3>
                    </div>
                    <div class="panel-body">
                        <form action="{{url('job-request-update', ['id' => $jobs->id])}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="tutor_type" class="control-label">Tutor Type
                                            <sup class="text-danger">*</sup></label>
                                        <select name="tutor_type" class="form-control" required="required">
                                            @if($jobs->tutor_type==1)
                                                <option value="">Select Tutor Type</option>
                                                <option value="1" selected>Home Tutoring</option>
                                                <option value="2">Online Tutoring</option>
                                                <option value="3">Group Tutoring</option>
                                                <option value="4">Package Tutoring</option>
                                            @elseif($jobs->tutor_type==2)
                                                <option value="">Select Tutor Type</option>
                                                <option value="1">Home Tutoring</option>
                                                <option value="2" selected>Online Tutoring</option>
                                                <option value="3">Group Tutoring</option>
                                                <option value="4">Package Tutoring</option>
                                            @elseif($jobs->tutor_type==3)
                                                <option value="">Select Tutor Type</option>
                                                <option value="1">Home Tutoring</option>
                                                <option value="2">Online Tutoring</option>
                                                <option value="3" selected>Group Tutoring</option>
                                                <option value="4">Package Tutoring</option>
                                            @elseif($jobs->tutor_type==4)
                                                <option value="">Select Tutor Type</option>
                                                <option value="1">Home Tutoring</option>
                                                <option value="2">Online Tutoring</option>
                                                <option value="3">Group Tutoring</option>
                                                <option value="4" selected>Package Tutoring</option>
                                            @else
                                                <option value="" selected>Select Tutor Type</option>
                                                <option value="1">Home Tutoring</option>
                                                <option value="2">Online Tutoring</option>
                                                <option value="3">Group Tutoring</option>
                                                <option value="4">Package Tutoring</option>
                                            @endif

                                        </select>
                                        @error('tutor_type')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
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
                                               value="{{$jobs->job_location}}"
                                               required="required" autocomplete="off">
                                        @error('job_location')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="day_per_week" class="control-label">Days/Week
                                            <sup class="text-danger">*</sup></label>
                                        <select name="day_per_week" class="form-control" required="required">
                                            @if($jobs->day_per_week==1)
                                                <option value="">Select Days/Week</option>
                                                <option value="1" selected>1 Day/Week</option>
                                                <option value="2">2 Day/Week</option>
                                                <option value="3">3 Day/Week</option>
                                                <option value="4">4 Day/Week</option>
                                                <option value="5">5 Day/Week</option>
                                                <option value="6">6 Day/Week</option>
                                                <option value="7">7 Day/Week</option>
                                            @elseif($jobs->day_per_week==2)
                                                <option value="">Select Days/Week</option>
                                                <option value="1">1 Day/Week</option>
                                                <option value="2" selected>2 Day/Week</option>
                                                <option value="3">3 Day/Week</option>
                                                <option value="4">4 Day/Week</option>
                                                <option value="5">5 Day/Week</option>
                                                <option value="6">6 Day/Week</option>
                                                <option value="7">7 Day/Week</option>
                                            @elseif($jobs->day_per_week==3)
                                                <option value="">Select Days/Week</option>
                                                <option value="1">1 Day/Week</option>
                                                <option value="2">2 Day/Week</option>
                                                <option value="3" selected>3 Day/Week</option>
                                                <option value="4">4 Day/Week</option>
                                                <option value="5">5 Day/Week</option>
                                                <option value="6">6 Day/Week</option>
                                                <option value="7">7 Day/Week</option>
                                            @elseif($jobs->day_per_week==4)
                                                <option value="">Select Days/Week</option>
                                                <option value="1">1 Day/Week</option>
                                                <option value="2">2 Day/Week</option>
                                                <option value="3">3 Day/Week</option>
                                                <option value="4" selected>4 Day/Week</option>
                                                <option value="5">5 Day/Week</option>
                                                <option value="6">6 Day/Week</option>
                                                <option value="7">7 Day/Week</option>
                                            @elseif($jobs->day_per_week==5)
                                                <option value="">Select Days/Week</option>
                                                <option value="1">1 Day/Week</option>
                                                <option value="2">2 Day/Week</option>
                                                <option value="3">3 Day/Week</option>
                                                <option value="4">4 Day/Week</option>
                                                <option value="5" selected>5 Day/Week</option>
                                                <option value="6">6 Day/Week</option>
                                                <option value="7">7 Day/Week</option>
                                            @elseif($jobs->day_per_week==6)
                                                <option value="">Select Days/Week</option>
                                                <option value="1">1 Day/Week</option>
                                                <option value="2">2 Day/Week</option>
                                                <option value="3">3 Day/Week</option>
                                                <option value="4">4 Day/Week</option>
                                                <option value="5">5 Day/Week</option>
                                                <option value="6" selected>6 Day/Week</option>
                                                <option value="7">7 Day/Week</option>
                                            @elseif($jobs->day_per_week==7)
                                                <option value="">Select Days/Week</option>
                                                <option value="1">1 Day/Week</option>
                                                <option value="2">2 Day/Week</option>
                                                <option value="3">3 Day/Week</option>
                                                <option value="4">4 Day/Week</option>
                                                <option value="5">5 Day/Week</option>
                                                <option value="6">6 Day/Week</option>
                                                <option value="7" selected>7 Day/Week</option>
                                            @else
                                                <option value="" selected>Select Days/Week</option>
                                                <option value="1">1 Day/Week</option>
                                                <option value="2">2 Day/Week</option>
                                                <option value="3">3 Day/Week</option>
                                                <option value="4">4 Day/Week</option>
                                                <option value="5">5 Day/Week</option>
                                                <option value="6">6 Day/Week</option>
                                                <option value="7">7 Day/Week</option>
                                            @endif
                                        </select>
                                        @error('day_per_week')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="student_gender" class="control-label">Student Gender
                                            <sup class="text-danger">*</sup></label>
                                        <select name="student_gender" class="form-control" required="required">
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
                                                required="required">
                                            @if($jobs->student_category==1)
                                                <option value="" >Select Student Category</option>
                                                <option value="1" selected>Bangla Medium</option>
                                                <option value="2">English Medium</option>
                                                <option value="3">English Version</option>
                                            @elseif($jobs->student_category==2)
                                                <option value="" >Select Student Category</option>
                                                <option value="1">Bangla Medium</option>
                                                <option value="2" selected>English Medium</option>
                                                <option value="3">English Version</option>
                                            @elseif($jobs->student_category==3)
                                                <option value="" >Select Student Category</option>
                                                <option value="1">Bangla Medium</option>
                                                <option value="2">English Medium</option>
                                                <option value="3" selected>English Version</option>
                                            @else
                                                <option value="" selected>Select Student Category</option>
                                                <option value="1">Bangla Medium</option>
                                                <option value="2">English Medium</option>
                                                <option value="3">English Version</option>
                                            @endif
                                        </select>
                                        @error('student_category')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="tutor_gender" class="control-label">Tutor Gender
                                            <sup class="text-danger">*</sup></label>
                                        <select name="tutor_gender" id="tutor_gender" class="form-control"
                                                required="required">
                                            @if($jobs->tutor_gender==1)
                                                <option value="">Select Student Gender</option>
                                                <option value="1" selected>Male</option>
                                                <option value="2">Female</option>
                                                <option value="3">Any</option>
                                            @elseif($jobs->tutor_gender==2)
                                                <option value="">Select Student Gender</option>
                                                <option value="1">Male</option>
                                                <option value="2" selected>Female</option>
                                                <option value="3">Any</option>
                                            @elseif($jobs->tutor_gender==3)
                                                <option value="">Select Student Gender</option>
                                                <option value="1">Male</option>
                                                <option value="2">Female</option>
                                                <option value="3" selected>Any</option>
                                            @else
                                                <option value="" selected>Select Tutor Gender</option>
                                                <option value="1">Male</option>
                                                <option value="2">Female</option>
                                                <option value="3">Any</option>
                                            @endif

                                        </select>
                                        @error('tutor_gender')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="student_class" class="control-label">Student Class
                                            <sup class="text-danger">*</sup></label>
                                        <input type="text" name="student_class"
                                               id="student_class"
                                               class="form-control"
                                               placeholder="Enter Student Class"
                                               value="{{$jobs->student_class}}"
                                               autocomplete="off">
                                        @error('student_class')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
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
                                               required="required" autocomplete="off">
                                        @error('subject_list')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="hiring_time" class="control-label">Hiring Date
                                            <sup class="text-danger">*</sup></label>
                                        <input type="date" name="hiring_time"
                                               class="form-control" id="hiring_time"
                                               placeholder="Enter Present Address"
                                               value="{{$jobs->hiring_time->format('Y-m-d')}}"
                                               required="required" autocomplete="off">
                                        @error('hiring_time')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
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
                                               required="required" autocomplete="off">
                                        @error('no_of_students')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="salary" class="control-label">Salary Range (Taka)
                                            <sup class="text-danger">*</sup></label>
                                        <input type="text" name="salary"
                                               class="form-control" id="salary"
                                               placeholder="Enter Salary Range/Negotiation"
                                               value="{{$jobs->salary}}"
                                               required="required" autocomplete="off">
                                        @error('salary')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="requirements" class="control-label">More about your Requirement
                                            <sup class="text-danger">*</sup></label>
                                        <textarea type="text" name="requirements"
                                                  class="form-control" id="requirements" rows="4"
                                                  placeholder="More about your Requirement"
                                                  required="required"
                                                  autocomplete="off">{{$jobs->requirements}}</textarea>
                                        @error('requirements')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <button class="btn btn-success">Update</button>
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

@endsection
