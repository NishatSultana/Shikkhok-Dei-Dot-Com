@if( $templateUser->is_system_user || in_array('add_users', $templatePermissions) )
	<a href="{{url('/users/create')}}" class="btn btn-primary btn-panel " >
		<i class="ace-icon fa fa-plus-circle"></i> Add Office Employee
	</a>
@endif
