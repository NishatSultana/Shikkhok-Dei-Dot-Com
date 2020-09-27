@if( $templateUser->is_system_user || in_array('add_modules', $templatePermissions) )
	<a href="{{url('/modules/create')}}" class="btn btn-primary btn-panel " >
		<i class="ace-icon fa fa-plus-circle"></i> Add Module
	</a>
@endif
