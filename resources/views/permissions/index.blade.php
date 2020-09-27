@extends('backend.layouts.master')

@section('title', 'List of Permissions')
@section('header_scripts')
    <link rel="stylesheet" type="text/css"
          href="{{ asset('backend/vendors/datatables/css/dataTables.bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/custom_css/datatables_custom.css')}}">
@endsection
@section('content_header', 'List of Permissions')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="panel pages">
                <div class="panel-heading  clearfix">
                    <h3 class="panel-title">
                    @include('permissions.partial.addButton')
                    </h3>
                </div>

                <div class="panel-body table-responsive">
                    <table class="table table-striped table-bordered" id="example">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Code Name</th>
                                <th>Module Name</th>

                                @if( $templateUser->is_system_user || in_array('change_permissions', $templatePermissions) || in_array('delete_permissions', $templatePermissions) )

                                    <th>Action</th>

                                @endif
                            </tr>
                            </thead>

                            <tbody>
                            @if(!empty($permissions))
                                @foreach($permissions as $permission)
                                    <tr>
                                        <td>{{ $permission->name }}</td>
                                        <td>{{ $permission->codename }}</td>
                                        <td>{{ $permission->module->label }}</td>

                                        @if( $templateUser->is_system_user || in_array('change_permissions', $templatePermissions) || in_array('delete_permissions', $templatePermissions))

                                            <td>
                                                @if( $templateUser->is_system_user || in_array('change_permissions', $templatePermissions) )
                                                    <a href="{{url('/permissions/'. $permission->id . '/edit')}}"
                                                       class="btn btn-xs btn-primary mb-2">
                                                        <i class="ace-icon fa fa-pencil bigger-130"></i> Edit
                                                    </a>
                                                @endif

                                                @if( $templateUser->is_system_user || in_array('change_permissions', $templatePermissions) )
                                                    <form action="{{url('/permissions', ['id'=>$permission->id])}}" method="POST"
                                                          onsubmit="return confirm('Are you sure?')"
                                                          style="display: inline-block;">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn btn-danger btn-xs">
                                                            <i class="ace-icon fa fa-trash-o bigger-130"></i> Delete
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
