@if( $templateUser->is_system_user || in_array('add_permissions', $templatePermissions) )
	<a href="{{url('/permissions/create')}}" class="btn btn-primary btn-panel " >
		<i class="ace-icon fa fa-plus-circle"></i> Add Permission
	</a>
@endif
