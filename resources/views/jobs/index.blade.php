@extends('backend.layouts.master')

@section('title', 'List of Posted Job')
@section('header_scripts')
    <link rel="stylesheet" type="text/css"
          href="{{ asset('backend/vendors/datatables/css/dataTables.bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/custom_css/datatables_custom.css')}}">
@endsection
@section('content_header', 'List of Posted Job')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="panel pages">
                <div class="panel-heading  clearfix">
                    <h3 class="panel-title">
                        @include('jobs.partial.addButton')
                    </h3>
                </div>

                <div class="panel-body table-responsive">
                    <table class="table table-striped table-bordered" id="example">
                        <thead>
                        <tr>
                            <th>Institute Name</th>
                            <th>Hiring Date</th>
                            <th>Salary Range (Taka)</th>
                            <th>Created Post</th>
                            @if( $templateUser->is_system_user || in_array('change_jobs', $templatePermissions) ||
                            in_array('view_jobs', $templatePermissions) || in_array('delete_jobs', $templatePermissions) )

                                <th>Action</th>

                            @endif
                        </tr>
                        </thead>

                        <tbody>
                        @if(!empty($jobs))
                            @foreach($jobs as $job)
                                <tr>
                                    <td>{{ $job->institute_name }}</td>
                                    <td>{{ $job->hiring_time->format('Y-m-d')}}</td>
                                    <td>{{ $job->salary }}</td>
                                    <td>{{ $job->created_at }}</td>

                                    @if( $templateUser->is_system_user || in_array('view_jobs', $templatePermissions)
                                    || in_array('delete_jobs', $templatePermissions)
                                    || in_array('change_jobs', $templatePermissions))

                                        <td>
                                            @if( $templateUser->is_system_user || in_array('change_jobs', $templatePermissions) )
                                                <a href="{{url('/jobs/'. $job->id . '/edit')}}"
                                                   class="btn btn-xs btn-primary mb-2">
                                                    <i class="ace-icon fa fa-pencil"></i> Edit
                                                </a>
                                            @endif
                                            @if( $templateUser->is_system_user || in_array('view_jobs', $templatePermissions) )
                                                <a href="{{url('/jobs/'. $job->id . '/view')}}"
                                                   class="btn btn-xs btn-primary mb-2">
                                                    <i class="ace-icon fa fa-eye"></i> Details
                                                </a>
                                            @endif


                                            @if( $templateUser->is_system_user || in_array('change_jobs', $templatePermissions) )
                                                <form action="{{url('/jobs', ['id'=>$job->id])}}" method="POST"
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
