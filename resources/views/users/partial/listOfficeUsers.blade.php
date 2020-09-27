@if( $templateUser->is_system_user || in_array('view_office_users', $templatePermissions) )
    <a href="{{url('/users/office')}}" class="btn btn-primary btn-panel " >
        <i class="ace-icon fa fa-list"></i> View Office  Employees
    </a>
@endif
