@extends('backend.layouts.master')

@section('title', 'Add Testimonial')

@section('content_header', 'Add Testimonial')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="panel pages">
                <div class="panel-heading  clearfix">
                    <h3 class="panel-title">
                    @include('cms.testimonials.partial.listButton')
                    </h3>
                </div>
                <div class="panel-body">
                    <form action="{{url('/testimonials')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label for="name">Name <sup class="text-danger">*</sup></label>
                                    <input type="text" name="name" value="{{ old('name') }}"
                                           placeholder="Enter Name" class="form-control" id="name">
                                    @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label for="designation">Designation <sup class="text-danger">*</sup></label>
                                    <input type="text" name="designation" value="{{ old('designation') }}"
                                           placeholder="Enter Designation" class="form-control" id="designation">
                                    @error('designation')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label for="message">Message <sup class="text-danger">*</sup></label>
                                    <input type="text" name="message" value="{{ old('message') }}"
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
                                    <label for="image" class="control-label">Image</label>
                                    <input type="file" name="image" class="form-control" id="imgInp"
                                           accept=".jpeg,.png,.jpg,.gif,.svg">
                                    <img style="border-radius: 50%;visibility: hidden;" id="blah" src="" alt="Image"
                                         height="80px" width="80px"/>

                                    @error('image')
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
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label for="featured">Feature Image <sup class="text-danger">*</sup></label>
                                    <select class="form-control" name="featured" id="featured" required>
                                        <option value="">Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
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
