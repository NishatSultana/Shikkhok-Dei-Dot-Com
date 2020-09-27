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
                    <form action="{{url('/testimonials', ['id'=>$testimonials->id])}}" method="POST"
                          enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label for="name">Name <sup class="text-danger">*</sup></label>
                                    <input type="text" name="name" value="{{ $testimonials->name }}"
                                           placeholder="Enter Name" class="form-control" id="name">
                                    @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label for="designation">Designation <sup class="text-danger">*</sup></label>
                                    <input type="text" name="designation" value="{{ $testimonials->designation }}"
                                           placeholder="Enter Designation" class="form-control" id="designation">
                                    @error('designation')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label for="message">Message <sup class="text-danger">*</sup></label>
                                    <input type="text" name="message" value="{{ $testimonials->message }}"
                                           placeholder="Enter Name" class="form-control" id="message">
                                    @error('message')
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
                                    @if($testimonials->image)
                                        <p>
                                            <img class="img-rounded" id="blah"
                                                 src="{{asset('storage/testimonial_user_image/'.$testimonials->image)}}"
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
                                           value="@if($testimonials->image){{$testimonials->image}} @else  @endif">
                                    @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label for="order_by">Order Number <sup class="text-danger">*</sup></label>
                                    <input type="text" name="order_by" value="{{ $testimonials->order_by }}"
                                           placeholder="Enter Order Number" class="form-control" id="order_by">
                                    @error('order_by')
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
                                        <?php echo $testimonials->featured == 1 ? 'selected="selected"' : ''; ?> >Yes
                                        </option>
                                        <option value="0"
                                        <?php echo $testimonials->featured == 0 ? 'selected="selected"' : ''; ?> >No
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
