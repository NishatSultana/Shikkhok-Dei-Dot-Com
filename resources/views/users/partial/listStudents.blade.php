@if( $templateUser->is_system_user || in_array('view_students_guardian', $templatePermissions) )
    <a href="{{url('/users/students-guardian')}}" class="btn btn-primary btn-panel " >
        <i class="ace-icon fa fa-list"></i>  View Student/Guardian List
    </a>
@endif
