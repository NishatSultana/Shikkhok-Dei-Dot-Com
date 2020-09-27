@if( $templateUser->is_system_user || in_array('view_profile', $templatePermissions))
    <a href="{{url('/profile-view')}}" class="btn btn-primary btn-panel ">
        <i class="fa fa-user"></i> View Profile Information
    </a>
@endif
