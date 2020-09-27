@extends('backend.layouts.master')

@section('title', 'Edit Slider')

@section('content_header', 'Edit Slider')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="panel pages">
                <div class="panel-heading  clearfix">
                    <h3 class="panel-title">
                    @include('cms.sliders.partial.listButton')
                    </h3>
                </div>

                <div class="panel-body">
                        <form action="{{url('/sliders', ['id'=>$sliders->id])}}" method="POST"  enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf

                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="title">Title <sup class="text-danger">*</sup></label>
                                        <input type="text" name="title" value="{{ $sliders->title }}"
                                               placeholder="Enter Title" class="form-control" id="title">
                                        @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="description">Description <sup class="text-danger">*</sup></label>
                                        <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ $sliders->description }}</textarea>
                                        @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="order_by">Order Number <sup class="text-danger">*</sup></label>
                                        <input type="text" name="order_by" value="{{ $sliders->order_by }}"
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
                                        <label for="image">Image <sup class="text-danger">*</sup></label>
                                        <input type="file" name="image" class="form-control" id="imgInp"
                                               accept=".jpeg,.png,.jpg,.gif,.svg">
                                        @if($sliders->image)
                                            <p>
                                                <img class="img-rounded" id="blah"
                                                     src="{{asset('storage/slider_image/'.$sliders->image)}}"
                                                     alt="Your Image"
                                                     width="80" height="80"/>
                                                <span style=" cursor: pointer;" class="close">&times;</span>
                                            </p>
                                        @endif
                                        <img style="border-radius: 50%;visibility: hidden;" id="blah" src=""
                                             alt="User Image"
                                             height="80px" width="80px"/>
                                        <p></p>
                                        <input type="hidden" name="checkimage" id="checkimage"
                                               value="@if($sliders->image){{$sliders->image}} @else  @endif">
                                        @error('image')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="featured">Feature Image <sup class="text-danger">*</sup></label>
                                        <select class="form-control" name="featured" id="featured" required>
                                            <option value="">Select</option>
                                            <option value="1"
                                            <?php echo $sliders->featured == 1 ? 'selected="selected"' : ''; ?> >Yes
                                            </option>
                                            <option value="0"
                                            <?php echo $sliders->featured == 0 ? 'selected="selected"' : ''; ?> >No
                                            </option>
                                        </select>
                                        @error('featured')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
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
        var closebtns = document.getElementsByClassName("close");
        var i;
        for (i = 0; i < closebtns.length; i++) {
            closebtns[i].addEventListener("click", function () {
                this.parentElement.style.display = 'none';
                document.getElementById("checkimage").value = "";
            });
        }
    </script>

    <script>

        document.getElementById("imgInp").onclick = function () {
            document.getElementById("blah").style.visibility = "visible";
            $("#tag_hide").hide();
        };

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function () {
            readURL(this);
        });
    </script>
@endsection
