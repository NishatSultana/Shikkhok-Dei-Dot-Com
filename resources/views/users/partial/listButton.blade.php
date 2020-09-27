@if( $templateUser->is_system_user || in_array('view_users', $templatePermissions) )
	<a href="{{url('/users')}}" class="btn btn-primary btn-panel " >
		<i class="ace-icon fa fa-list"></i> View Tutors List
	</a>
@endif
