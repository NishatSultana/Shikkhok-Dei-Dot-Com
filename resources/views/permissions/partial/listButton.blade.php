@if( $templateUser->is_system_user || in_array('view_permissions', $templatePermissions) )
	<a href="{{url('/permissions')}}" class="btn btn-primary btn-panel " >
		<i class="ace-icon fa fa-list"></i> View Permissions
	</a>
@endif
