@extends('backend.layouts.master')

@section('title', 'List of Tutors')
@section('header_scripts')
    <link rel="stylesheet" type="text/css"
          href="{{ asset('backend/vendors/datatables/css/dataTables.bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/custom_css/datatables_custom.css')}}">
@endsection
@section('content_header', 'List of Tutors')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="panel pages">
                <div class="panel-heading  clearfix">
                    <h3 class="panel-title">
                    @include('users.partial.addButton')
                    @include('users.partial.listOfficeUsers')
                    @include('users.partial.listStudents')
                    </h3>
                </div>

                <div class="panel-body table-responsive">
                    <table class="table table-striped table-bordered" id="example">
                            <thead>
                            <tr>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Mobile Number</th>
                                <th>Created Datetime</th>

                                @if( $templateUser->is_system_user || in_array('change_users', $templatePermissions) || in_array('delete_users', $templatePermissions) )

                                    <th>Action</th>

                                @endif
                            </tr>
                            </thead>

                            <tbody>
                            @if(!empty($users))
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->full_name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->mobile }}</td>
                                        <td>{{ $user->created_at }}</td>

                                        @if( $templateUser->is_system_user || in_array('change_users', $templatePermissions) || in_array('delete_users', $templatePermissions))

                                            <td>

                                                @if( $templateUser->is_system_user || in_array('change_users', $templatePermissions) )
                                                    <form action="{{url('/users', ['id' => $user->id])}}" method="POST"
                                                          onsubmit="return confirm('Are you sure?')"
                                                          style="display: inline-block;">
                                                        @method('DELETE')
                                                        @csrf
                                                        @if($user->status == 1)
                                                            <button class="btn btn-danger btn-xs">
                                                                <i class="ace-icon bigger-100"></i> Deactive
                                                            </button>
                                                        @else
                                                            <button class="btn btn-success btn-xs">
                                                                <i class="ace-icon  bigger-100"></i> Active
                                                            </button>
                                                        @endif
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
