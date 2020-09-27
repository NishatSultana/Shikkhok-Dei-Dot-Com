@extends('backend.layouts.master')

@section('title', 'Group Permissions')
@section('header_scripts')
    <link rel="stylesheet" type="text/css"
          href="{{ asset('backend/vendors/datatables/css/dataTables.bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/custom_css/datatables_custom.css')}}">
@endsection
@section('content_header', 'Group Permissions')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="panel pages">
                <div class="panel-heading clearfix">
                    <h3 class="panel-title">
                        @include('groups.partial.listButton')
                    </h3>
                </div>

                <div class="panel-body">
                    <form action="{{url('/groups/' . $group->id . '/permissions')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-8">
                                <div id="accordion" class="accordion-style2">
                                    @if(!empty($modules))
                                        @foreach($modules as $module)
                                            <div class="group">
                                                <h3 class="accordion-header">{{ $module->label }}</h3>
                                                <div>
                                                    @foreach($module->permissions as $singlePermission)
                                                        <input type="checkbox" name="permission_id[]"
                                                               value="{{ $singlePermission->id }}"
                                                               id="{{ $singlePermission->id }}" class="singlePermission"
                                                        <?php echo !empty($group_permissions) && in_array($singlePermission->id, $group_permissions) ? 'checked' : ''; ?>
                                                        >
                                                        {{ $singlePermission->name }}
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <h1>No Modules Found...</h1>
                                    @endif
                                </div><!-- #accordion -->
                            </div><!-- ./span -->
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-sm-6">
                                <button class="btn btn-success">Save</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('backend/vendors/datatables/js/jquery.dataTables.js')}}"></script>
    <script type="text/javascript" src="{{ asset('backend/vendors/datatables/js/dataTables.bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/custom_js/datatables_custom.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.singlePermission').change(function (e) {
                e.preventDefault();
                id = $(this).attr('id');
                element = $('#' + id);
                check = $(this).is(":checked");
                if (check) {
                    element.attr('checked', true)
                } else {
                    element.removeAttr('checked')
                }
            })
        })
    </script>
@endsection
