@extends('backend.layouts.master')

@section('title', 'Edit Group')

@section('content_header', 'Edit Group')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="panel pages">
                <div class="panel-heading  clearfix">
                    <h3 class="panel-title">
                        @include('groups.partial.listButton')
                    </h3>
                </div>

                <div class="panel-body">
                        <form action="{{url('/teachers', ['id'=>$teachers->id])}}" method="POST" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf

                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="title">Title <sup class="text-danger">*</sup></label>
                                        <input type="text" name="title" value="{{ $teachers->title }}"
                                               placeholder="Enter Permission Name" class="form-control" id="title">
                                        @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="excerpt">Excerpt <sup class="text-danger">*</sup></label>
                                        <input type="text" name="excerpt" value="{{ $teachers->excerpt }}"
                                               placeholder="Enter Permission Name" class="form-control" id="excerpt">
                                        @error('excerpt')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="order_by">Order <sup class="text-danger">*</sup></label>
                                        <input type="text" name="order_by" value="{{ $teachers->order_by }}"
                                               placeholder="Enter Permission Name" class="form-control" id="order_by">
                                        @error('order_by')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="front_page_image">Image <sup class="text-danger">*</sup></label>
                                        <input type="file" name="front_page_image" class="form-control" id="imgInp"
                                               accept=".jpeg,.png,.jpg,.gif,.svg">
                                        @if($teachers->front_page_image)
                                            <img class="img-rounded" id="blah"
                                                 src="{{asset('storage/teachers_image/'.$teachers->front_page_image)}}"
                                                 alt="Your Image" name="front_page_image"
                                                 width="80" height="80"/>
                                        @endif
                                        @error('front_page_image')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="details_page_image">Image <sup class="text-danger">*</sup></label>
                                        <input type="file" name="details_page_image" class="form-control" id="image"
                                               accept=".jpeg,.png,.jpg,.gif,.svg" onchange="document.getElementById('image_blah').src = window.URL.createObjectURL(this.files[0])">

                                        @if($teachers->details_page_image)
                                            <img class="img-rounded" id="image_blah"
                                                 src="{{asset('storage/teachers_image/'.$teachers->details_page_image)}}"
                                                 alt="Your Image" name="details_page_image"
                                                 width="80" height="80"/>
                                        @endif
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
                                            <option value="1"
                                            <?php echo $teachers->display == 1 ? 'selected="selected"' : ''; ?> >Yes
                                            </option>
                                            <option value="1"
                                            <?php echo $teachers->display == 0 ? 'selected="selected"' : ''; ?> >No
                                            </option>
                                        </select>
                                        @error('display')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="describes">Description <sup class="text-danger">*</sup></label>
                                        <input type="text" name="describes" value="{{ $teachers->describes }}"
                                               placeholder="Enter describes" class="form-control" id="describes">
                                        @error('describes')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                @foreach($teachers_testimonial as $facility)
                                    <div class="form-inline col-xs-12 font-weight-bold">
                                        <div class="form-group dummy targetdom_{{$facility->id}}" id="remove_file_{{$facility->id}}">
                                            <label for="facility">Facilities <sup class="text-danger">*</sup></label>
                                            <br>
                                            <textarea type="text" cols="60" rows="1" name="facility_title[]"
                                                      class="form-control"
                                                      id="facility_title" placeholder="Facility Heading">{{$facility->name_designation}}</textarea>

                                            <textarea type="text" cols="60" rows="1" class="form-control"
                                                      name="facility_body[]"
                                                      id="facility_body">{{$facility->message}}</textarea>

                                            <button type="button" class="btn btn-danger btn-sm">
                                                <i class="ace-icon fa fa-trash bigger-110"></i> Remove
                                            </button>
                                            <p></p>

                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="row">
                                <div class="form-inline col-xs-12 font-weight-bold">
                                    <div class="form-group">

                                        <button type="button" class="btn btn-info btn-sm add_file">
                                            <i class="ace-icon fa fa-plus bigger-110"></i> Add more
                                        </button>
                                        <p></p>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
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
            $("body").on('click', '.dummy', function (e) {
                e.preventDefault();
                let target_option = this.id;
                let split_data = target_option.split("_");
                let remove_dom_altime = split_data[2];
                let targetDOM = $('.' + 'targetdom_' + remove_dom_altime)
                if (remove_dom_altime) {
                    $(targetDOM).empty();
                }
            });
        });
    </script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function () {
            readURL(this);
        });
    </script>




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
                input_field += '<textarea type="text" cols="60" rows="1"" name="' + slug + '_title[]" class="form-control" id="facility_title" placeholder="Facility Heading"></textarea>';
                input_field += '</div> &nbsp;';

                input_field += '<textarea type="text" cols="60" rows="1" name="' + slug + '_body[]" id="' + slug + '_body" class="form-control" placeholder="Facility Body"></textarea>';
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
