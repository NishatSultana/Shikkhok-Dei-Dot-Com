@if( $templateUser->is_system_user || in_array('view_jobs', $templatePermissions) )
	<a href="{{url('/view-jobs')}}" class="btn btn-primary btn-panel " >
		<i class="ace-icon fa fa-list"></i> Posted Job List
	</a>
@endif
