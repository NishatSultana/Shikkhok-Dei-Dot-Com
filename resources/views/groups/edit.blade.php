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
                        <form action="{{url('/groups', ['id'=>$groups->id])}}" method="POST">
                            @method('PATCH')
                            @csrf

                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="name">Name <sup class="text-danger">*</sup></label>
                                        <input type="text" name="name" value="{{ $groups->name }}"
                                               placeholder="Enter Group Name" class="form-control" id="name">
                                        @error('name')
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
