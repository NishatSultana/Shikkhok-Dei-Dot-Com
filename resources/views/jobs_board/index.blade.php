@extends('backend.layouts.master')

@section('title', 'Job Board')
@section('content_header', 'Job Board')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="panel pages">
                <div class="panel-heading  clearfix">
                    <h3 class="panel-title">

                    </h3>
                </div>

                <div class="panel-body">
                    <div class="col-sm-12">
                        @if($jobs)
                            @foreach($jobs as $job)
                                <div class="panel nvd3-panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            Need
                                            @if($job->student_category==1)
                                                Bangla Medium
                                            @elseif($job->student_category==2)
                                                English Medium
                                            @elseif($job->student_category==3)
                                                English Version
                                            @endif
                                            Tutor For
                                            {{$job->student_class}} Student
                                            -
                                            @if($job->day_per_week==1)
                                                1 Day/Week
                                            @elseif($job->day_per_week==2)
                                                2 Day/Week
                                            @elseif($job->day_per_week==3)
                                                3 Day/Week
                                            @elseif($job->day_per_week==4)
                                                4 Day/Week
                                            @elseif($job->day_per_week==5)
                                                5 Day/Week
                                            @elseif($job->day_per_week==6)
                                                6 Day/Week
                                            @elseif($job->day_per_week==7)
                                                7 Day/Week
                                            @endif
                                        </h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="nvd3-chart line-chart" data-x-grid="false">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <br>
                                                        <i class="fa fa-mars-stroke"></i>
                                                        <label for="tutor_gender" class="control-label">Tutor Gender
                                                            @if($job->tutor_gender==1)
                                                                <strong>Male</strong>
                                                            @elseif($job->tutor_gender==2)
                                                                <strong>Female</strong>
                                                            @elseif($job->tutor_gender==3)
                                                                <strong>Any</strong>
                                                            @endif
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <br>
                                                        <i class="fa fa-mars-stroke"></i>
                                                        <label for="tutor_gender" class="control-label">Student Gender
                                                            @if($job->student_gender==1)
                                                                <strong>Male</strong>
                                                            @elseif($job->student_gender==2)
                                                                <strong>Female</strong>
                                                            @endif
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <br>
                                                        <i class="fa fa-book"></i>
                                                        <label for="institute_name" class="control-label">Institute Name
                                                                <strong>{{$job->institute_name}}</strong>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <br>
                                                        <i class="fa fa-money"></i>
                                                        <label for="salary" class="control-label">Salary Range
                                                            <strong>{{$job->salary}}</strong>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <br>
                                                        <i class="fa fa-tag"></i>
                                                        <label for="tutor_type" class="control-label">Tutor Type
                                                            @if($job->tutor_type==1)
                                                                <strong>Home Tutoring</strong>
                                                            @elseif($job->tutor_type==2)
                                                                <strong>Online Tutoring</strong>
                                                            @elseif($job->tutor_type==3)
                                                                <strong>Group Tutoring</strong>
                                                            @elseif($job->tutor_type==4)
                                                                <strong>Package Tutoring</strong>
                                                            @endif
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <br>
                                                        <i class="fa fa-location-arrow"></i>
                                                        <label for="job_location" class="control-label">Job Location
                                                            <strong>{{$job->job_location}}</strong>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <br>
                                                        <i class="fa fa-users"></i>
                                                        <label for="no_of_students" class="control-label">Number of Student
                                                            <strong>{{$job->no_of_students}}</strong>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <br>
                                                        <i class="fa fa-times-circle"></i>
                                                        <label for="hiring_time" class="control-label">Hiring Time
                                                            <strong>{{$job->hiring_time}}</strong>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <br>
                                                        <i class="fa fa-bookmark"></i>
                                                        <label for="subject_list" class="control-label">Subject List
                                                            <strong>{{$job->subject_list}}</strong>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <br>
                                                        <i class="fa fa-key"></i>
                                                        <label for="requirements" class="control-label">Additional Requirements
                                                            <strong>{{$job->requirements}}</strong>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <a href="{{'application-request/'.$job->id}}" class="btn btn-success">Apply</a>
                                                        <br>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    {{ $jobs->links() }}
                </div>
            </div>

        </div>
    </div>

@endsection

@section('scripts')

@endsection
