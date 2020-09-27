@if( $templateUser->is_system_user)
	<a href="{{url('/testimonials/create')}}" class="btn btn-primary btn-panel ">
		<i class="ace-icon fa fa-plus-circle"></i> Add Testimonial
	</a>
@endif
