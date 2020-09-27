@extends('backend.layouts.master')

@section('title', 'Add Teacher')

@section('content_header', 'Add Teacher')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="panel pages">
                <div class="panel-heading  clearfix">
                    <h3 class="panel-title">
                        @include('cms.teachers.partial.listButton')
                    </h3>
                </div>
                <div class="panel-body">
                        <form action="{{url('/teachers')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="title">Name <sup class="text-danger">*</sup></label>
                                        <input type="text" name="title" value="{{ old('title') }}"
                                               placeholder="Enter Title" class="form-control" id="title">
                                        @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="excerpt">Excerpt <sup class="text-danger">*</sup></label>
                                        <textarea name="excerpt" id="excerpt" cols="10" rows="3"
                                                  placeholder="Enter Excerpt" class="form-control"></textarea>
                                        @error('excerpt')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="order_by">Order Number <sup class="text-danger">*</sup></label>
                                        <input type="text" name="order_by" value="{{ old('order_by') }}"
                                               placeholder="Enter Order Number" class="form-control" id="order_by">
                                        @error('order_by')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="describes">Describes <sup class="text-danger">*</sup></label>
                                        <textarea name="describes" id="describes" cols="10" rows="3"
                                                  placeholder="Enter description" class="form-control"></textarea>
                                        @error('describes')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="front_page_image" class="control-label">Front Page Image</label>
                                        <input type="file" name="front_page_image" class="form-control" id="imgInp"
                                               accept=".jpeg,.png,.jpg,.gif,.svg">
                                        @error('front_page_image')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="details_page_image" class="control-label">Details Page Image</label>
                                        <input type="file" name="details_page_image" class="form-control" id="imgInp_2"
                                               accept=".jpeg,.png,.jpg,.gif,.svg">
                                        @error('details_page_image')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="display">Display <sup class="text-danger">*</sup></label>
                                        <select class="form-control" name="display" id="display" required>
                                            <option value="">Select</option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                        @error('display')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-inline col-xs-12 font-weight-bold">
                                    <div class="form-group">
                                        <label for="facility">Add Name, Designation and Message <sup class="text-danger">*</sup></label>
                                        <br>
                                        <textarea type="text" cols="60" rows="1" name="facility_title[]" class="form-control"
                                               id="facility_title" placeholder="Enter Name and Designation. Like: Mr kamal, Software Engineer"></textarea>

                                        <textarea type="text" cols="60" rows="1" class="form-control" name="facility_body[]"
                                               id="facility_body" placeholder="Enter Enter Message"></textarea>

                                        <button type="button" class="btn btn-info btn-sm add_file">
                                            <i class="ace-icon fa fa-plus bigger-110"></i> Add more
                                        </button>
                                        <p></p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12">
                                    <br>
                                    <button type="submit" class="btn btn-sm btn-success"> Submit
                                        <i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i>
                                    </button>
                                </div>
                            </div>

                        </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')

    <script>
        $(document).ready(function () {
            $("body").on('click', '.add_file', function (e) {
                e.preventDefault();
                console.log(1)
                let slug = 'facility';
                input_field = '<div class="control-group">';
                input_field += '<div class="">';
                input_field += '<div class="form-inline col-xs-12 font-weight-bold">';
                input_field += '<div class="form-group">';
                input_field += '<textarea type="text" cols="60" rows="1"" name="' + slug + '_title[]" class="form-control" id="facility_title" placeholder="Name and Designation. Like: Mr kamal, Software Engineer"></textarea>';
                input_field += '</div> &nbsp;';

                input_field += '<textarea type="text" cols="60" rows="1" name="' + slug + '_body[]" id="' + slug + '_body" class="form-control" placeholder="Enter Message"></textarea>';
                input_field += '<button class="btn btn-danger btn-sm remove_file" type="button"><i class="ace-icon fa fa-trash bigger-100"></i> Remove </button>';
                input_field += '<p></p>'

                input_field += '</div></div></div>';

                $(this).parent().parent().parent().append(input_field);
            });

            $("body").on('click', '.remove_file', function (e) {
                e.preventDefault();

                $(this).parent().parent().parent().remove();
            });

        });
    </script>
@endsection
