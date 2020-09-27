@extends('backend.layouts.master')

@section('title', 'List of Sliders')
@section('header_scripts')
    <link rel="stylesheet" type="text/css"
          href="{{ asset('backend/vendors/datatables/css/dataTables.bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/custom_css/datatables_custom.css')}}">
@endsection
@section('content_header', 'List of Sliders')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel pages">
                    <div class="panel-heading  clearfix">
                        <h3 class="panel-title">
                            @include('cms.sliders.partial.addButton')
                        </h3>
                    </div>
                    <div class="panel-body table-responsive">
                        <table class="table table-striped table-bordered" id="example">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Featured</th>
                                <th>Order Number</th>
                                @if( $templateUser->is_system_user)
                                    <th>Action</th>
                                @endif
                            </tr>
                            </thead>

                            <tbody>
                            @if(!empty($sliders))
                                @foreach($sliders as $slider)
                                    <tr>
                                        <td>{{ $slider->name }}</td>
                                        <td>{{ $slider->title }}</td>
                                        <td>{{ $slider->description }}</td>
                                        @if($slider->image)
                                            <td>
                                                <img id="avatar" class="editable img-responsive "
                                                     alt="User Image" height="50px"
                                                     width="100px"
                                                     src="{{asset('storage/slider_image/'.$slider->image)}}"/>
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
                                        @if($slider->featured == 1)
                                            <td>Yes</td>
                                        @elseif($slider->featured == 0)
                                            <td>No</td>
                                        @endif
                                        <td>{{ $slider->order_by }}</td>
                                        @if( $templateUser->is_system_user)
                                            <td>
                                                @if( $templateUser->is_system_user)
                                                    <a href="{{url('/sliders/'. $slider->id . '/edit')}}"
                                                       class="btn btn-xs btn-primary mb-2">
                                                        <i class="ace-icon fa fa-pencil bigger-130"></i> Edit
                                                    </a>
                                                @endif

                                                @if( $templateUser->is_system_user)
                                                    <form action="{{url('/sliders', ['id'=>$slider->id])}}"
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
                                            </td>
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
