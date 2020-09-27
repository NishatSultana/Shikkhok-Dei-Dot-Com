@if( $templateUser->is_system_user || in_array('add_groups', $templatePermissions) )
	<a href="{{url('/groups/create')}}" class="btn btn-primary btn-panel ">
		<i class="ace-icon fa fa-plus-circle"></i> Add Group
	</a>
@endif
