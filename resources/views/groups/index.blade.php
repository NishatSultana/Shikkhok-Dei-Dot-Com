@extends('backend.layouts.master')

@section('title', 'List of Groups')
@section('header_scripts')
    <link rel="stylesheet" type="text/css"
          href="{{ asset('backend/vendors/datatables/css/dataTables.bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/custom_css/datatables_custom.css')}}">
@endsection
@section('content_header', 'List of Groups')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel pages">
                    <div class="panel-heading  clearfix">
                        <h3 class="panel-title">
                            @include('groups.partial.addButton')
                        </h3>
                    </div>
                    <div class="panel-body table-responsive">
                        <table class="table table-striped table-bordered" id="example">
                            <thead>
                            <tr>
                                <th>Name</th>

                                @if( $templateUser->is_system_user || in_array('change_groups', $templatePermissions) || in_array('delete_groups', $templatePermissions) || in_array('group_permissions', $templatePermissions) )

                                    <th>Action</th>

                                @endif
                            </tr>
                            </thead>

                            <tbody>
                            @if(!empty($groups))
                                @foreach($groups as $groups)
                                    <tr>
                                        <td>{{ $groups->name }}</td>


                                        @if( $templateUser->is_system_user || in_array('change_groups', $templatePermissions) || in_array('delete_groups', $templatePermissions) || in_array('group_permissions', $templatePermissions))

                                            <td>
                                                @if( $templateUser->is_system_user || in_array('group_permissions', $templatePermissions) )
                                                    <a href="{{url('/groups/' . $groups->id . '/permissions')}}"
                                                       class="btn btn-xs btn-info mb-2">
                                                        <i class="ace-icon fa fa-key bigger-130"></i> Permissions
                                                    </a>
                                                @endif

                                                @if( $templateUser->is_system_user || in_array('change_groups', $templatePermissions) )
                                                    <a href="{{url('/groups/'. $groups->id . '/edit')}}"
                                                       class="btn btn-xs btn-primary mb-2">
                                                        <i class="ace-icon fa fa-pencil bigger-130"></i> Edit
                                                    </a>
                                                @endif

                                                @if( $templateUser->is_system_user || in_array('delete_groups', $templatePermissions) )
                                                    <form action="{{url('/groups', ['id'=>$groups->id])}}" method="POST"
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
    </section>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('backend/vendors/datatables/js/jquery.dataTables.js')}}"></script>
    <script type="text/javascript" src="{{ asset('backend/vendors/datatables/js/dataTables.bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/custom_js/datatables_custom.js')}}"></script>
@endsection
