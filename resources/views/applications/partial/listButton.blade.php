@if( $templateUser->is_system_user || in_array('view_job_board', $templatePermissions) )
	<a href="{{url('/job-board')}}" class="btn btn-primary btn-panel " >
		<i class="ace-icon fa fa-list"></i> View Job Board
	</a>
@endif
