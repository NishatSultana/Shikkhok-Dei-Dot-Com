@extends('backend.layouts.master')

@section('title', 'List of Online Application')
@section('header_scripts')
    <link rel="stylesheet" type="text/css"
          href="{{ asset('backend/vendors/datatables/css/dataTables.bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/custom_css/datatables_custom.css')}}">
@endsection
@section('content_header', 'List of Online Application')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="panel pages">
                <div class="panel-heading  clearfix">
                    <h3 class="panel-title">
                        @include('applications.partial.listButton')
                    </h3>
                </div>

                <div class="panel-body table-responsive">
                    <table class="table table-striped table-bordered" id="example">
                        <thead>
                        <tr>
                            <th>Institute Name</th>
                            <th>Location</th>
                            <th>No. of Student</th>
                            <th>Days/Week</th>
                            <th>Category</th>
                            <td>Subject</td>
                            <td>Additional Requirement</td>
                            <td>Status</td>
                            @if( $templateUser->is_system_user || in_array('change_online_application', $templatePermissions) ||
                            in_array('view_online_application', $templatePermissions) || in_array('delete_online_application', $templatePermissions) )

                                <th>Action</th>

                            @endif
                        </tr>
                        </thead>

                        <tbody>
                        @if(!empty($applications))
                            @foreach($applications as $application)
                                <tr>
                                    <td>{{ $application->job->institute_name }}</td>
                                    <td>{{ $application->job->job_location }}</td>
                                    <td>{{ $application->job->no_of_students }}</td>
                                    @if($application->job->day_per_week==1)
                                        <td>1 Day/Week</td>
                                    @elseif($application->job->day_per_week==2)
                                        <td>2 Day/Week</td>
                                    @elseif($application->job->day_per_week==3)
                                        <td>3 Day/Week</td>
                                    @elseif($application->job->day_per_week==4)
                                        <td>4 Day/Week</td>
                                    @elseif($application->job->day_per_week==5)
                                        <td>5 Day/Week</td>
                                    @elseif($application->job->day_per_week==6)
                                        <td>6 Day/Week</td>
                                    @elseif($application->job->day_per_week==7)
                                        <td>7 Day/Week</td>
                                    @endif
                                    @if($application->job->student_category==1)
                                       <td> Bangla Medium</td>
                                    @elseif($application->job->student_category==2)
                                        <td>English Medium</td>>
                                    @elseif($application->job->student_category==3)
                                        <td>English Version</td>
                                    @endif
                                    <td>{{ $application->job->subject_list }}</td>
                                    <td>{{ $application->job->requirements }}</td>
                                    <td>Pending</td>

                                    @if( $templateUser->is_system_user
                                    || in_array('delete_online_application', $templatePermissions)
                                    || in_array('change_online_application', $templatePermissions))

                                        <td>
                                            @if( $templateUser->is_system_user || in_array('view_online_application', $templatePermissions) )
                                                <a href="{{url('/online_application/'. $application->job_id . '/view')}}"
                                                   class="btn btn-xs btn-primary mb-2">
                                                    <i class="ace-icon fa fa-eye"></i> Details
                                                </a>
                                            @endif


                                            @if( $templateUser->is_system_user || in_array('delete_online_application', $templatePermissions) )
                                                <form action="{{url('/delete_online_application', ['id'=>$application->id])}}" method="POST"
                                                      onsubmit="return confirm('Are you sure?')"
                                                      style="display: inline-block;">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-danger btn-xs">
                                                        <i class="ace-icon fa fa-trash-o"></i> Delete
                                                    </button>
                                                </form>
                                            @endif
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('backend/vendors/datatables/js/jquery.dataTables.js')}}"></script>
    <script type="text/javascript" src="{{ asset('backend/vendors/datatables/js/dataTables.bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/custom_js/datatables_custom.js')}}"></script>
@endsection
