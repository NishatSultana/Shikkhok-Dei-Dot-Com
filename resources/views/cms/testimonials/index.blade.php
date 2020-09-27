@extends('backend.layouts.master')

@section('title', 'List of Testimonials')
@section('header_scripts')
    <link rel="stylesheet" type="text/css"
          href="{{ asset('backend/vendors/datatables/css/dataTables.bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/custom_css/datatables_custom.css')}}">
@endsection
@section('content_header', 'List of Testimonials')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel pages">
                    <div class="panel-heading  clearfix">
                        <h3 class="panel-title">
                            @include('cms.testimonials.partial.addButton')
                        </h3>
                    </div>
                    <div class="panel-body table-responsive">
                        <table class="table table-striped table-bordered" id="example">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Image</th>
                                <th>Message</th>
                                <th>Featured</th>
                                <th>Order Number</th>
                                <th>Language</th>
                                @if( $templateUser->is_system_user)
                                    <th>Action</th>
                                @endif
                            </tr>
                            </thead>

                            <tbody>
                            @if(!empty($testimonials))
                                @foreach($testimonials as $testimonial)
                                    <tr>
                                        <td>{{ $testimonial->name }}</td>
                                        <td>{{ $testimonial->designation }}</td>
                                        @if($testimonial->image)
                                            <td>
                                                <img id="avatar" class="editable img-responsive "
                                                     alt="User Image" height="50px"
                                                     width="100px"
                                                     src="{{asset('storage/testimonial_user_image/'.$testimonial->image)}}"/>
                                            </td>
                                        @else
                                            <td>
                                                <img id="avatar" class="editable img-responsive"
                                                     alt="No Image"
                                                     height="50px"
                                                     width="100px"
                                                     src="backend/img/original.jpg"/>
                                            </td>
                                        @endif
                                        <td>{{ $testimonial->message }}</td>
                                        @if($testimonial->featured == 1)
                                            <td>Yes</td>
                                        @elseif($testimonial->featured == 0)
                                            <td>No</td>
                                        @endif
                                        <td>{{ $testimonial->order_by }}</td>
                                        @if( $templateUser->is_system_user)
                                            <td>
                                                @if( $templateUser->is_system_user || in_array('change_testimonials', $templatePermissions) )
                                                    <a href="{{url('/testimonials/'. $testimonial->id . '/edit')}}"
                                                       class="btn btn-xs btn-primary mb-2">
                                                        <i class="ace-icon fa fa-pencil bigger-130"></i> Edit
                                                    </a>
                                                @endif
                                                @if( $templateUser->is_system_user || in_array('delete_testimonials', $templatePermissions) )
                                                    <form action="{{url('/testimonials', ['id'=>$testimonial->id])}}"
                                                          method="POST"
                                                          onsubmit="return confirm('Are you sure?')"
                                                          style="display: inline-block;">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn btn-danger btn-xs">
                                                            <i class="ace-icon fa fa-trash-o bigger-130"></i> Delete
                                                        </button>
                                                    </form>
                                                @endif
                                            </td
                                        @endif
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('backend/vendors/datatables/js/jquery.dataTables.js')}}"></script>
    <script type="text/javascript" src="{{ asset('backend/vendors/datatables/js/dataTables.bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/custom_js/datatables_custom.js')}}"></script>
@endsection
