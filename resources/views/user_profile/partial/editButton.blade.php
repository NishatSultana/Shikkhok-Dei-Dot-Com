@if( $templateUser->is_system_user || in_array('change_profile', $templatePermissions))
    <a href="{{url('/change-profile')}}" class="btn btn-primary btn-panel ">
        <i class="fa fa-edit"></i> Edit Profile Information
    </a>
@endif
