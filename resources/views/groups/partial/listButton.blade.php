@if( $templateUser->is_system_user || in_array('view_groups', $templatePermissions) )
	<a href="{{url('/groups')}}" class="btn btn-primary btn-panel ">
		<i class="ace-icon fa fa-list"></i> View Groups
	</a>
@endif
