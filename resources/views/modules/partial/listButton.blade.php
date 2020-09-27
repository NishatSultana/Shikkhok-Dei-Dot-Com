@if( $templateUser->is_system_user || in_array('view_modules', $templatePermissions) )
	<a href="{{url('/modules')}}" class="btn btn-primary btn-panel " >
		<i class="ace-icon fa fa-list"></i> Modules List
	</a>
@endif
