@if( $templateUser->is_system_user)
	<a href="{{url('/teachers/create')}}" class="btn btn-xs btn-primary" >
		<i class="ace-icon fa fa-plus-circle bigger-130"></i> Add Teachers
	</a>
@endif
