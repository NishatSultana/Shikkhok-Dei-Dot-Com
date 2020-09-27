@if( $templateUser->is_system_user || in_array('add_jobs', $templatePermissions) )
	<a href="{{url('/post-job')}}" class="btn btn-primary btn-panel " >
		<i class="ace-icon fa fa-plus-circle"></i> Add Tutor Request
	</a>
@endif
