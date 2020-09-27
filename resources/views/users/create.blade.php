@extends('backend.layouts.master')

@section('title', 'Add Office Employee')

@section('content_header', 'Add Office Employee')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="panel pages">
                <div class="panel-heading  clearfix">
                    <h3 class="panel-title">
                    @include('users.partial.listButton')
                    </h3>
                </div>

                <div class="panel-body">
                        <form action="{{url('users')}}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="name">Full Name <sup class="text-danger">*</sup></label>
                                        <input type="text" name="name" value="{{ old('name') }}"
                                               placeholder="Enter Full Name" class="form-control" id="name">
                                        @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="email">Email <sup class="text-danger">*</sup></label>
                                        <input type="text" name="email" value="{{ old('email') }}"
                                               placeholder="Enter Email Address" class="form-control" id="email">
                                        @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="mobile">Mobile Number</label>
                                        <input type="text" name="mobile" value="{{ old('mobile') }}"
                                               placeholder="Enter Mobile Number" class="form-control" id="mobile">
                                        @error('mobile')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="password">Password <sup class="text-danger">*</sup></label>
                                        <input type="password" name="password" value="{{ old('password') }}"
                                               placeholder="Enter passworde" class="form-control" id="password">
                                        @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="group">Group <sup class="text-danger">*</sup></label>
                                        <select class="form-control" name="group" id="group" required>
                                            <option value="2">Admin</option>
                                        </select>
                                        @error('group')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="is_staff">Staff <sup class="text-danger">*</sup></label>
                                        <select class="form-control" name="is_staff" id="is_staff" required>
                                            <option value="1">Yes</option>
                                        </select>
                                        @error('is_staff')
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
