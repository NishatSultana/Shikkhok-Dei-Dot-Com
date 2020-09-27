@extends('backend.layouts.master')

@section('title', 'Add Module')

@section('content_header', 'Add Module')

@section('header_button')

@endsection


@section('content')

<div class="row">
	<div class="col-xs-12">
		<div class="panel pages">
            <div class="panel-heading  clearfix">
                <h3 class="panel-title">
				@include('modules.partial.listButton')
                </h3>
			</div>

				<div class="panel-body">
					<form action="{{url('modules')}}" method="POST">
						@csrf

						<div class="row">
							<div class="col-xs-5">
								<div class="form-group">
									<label for="label">Module Label <sup class="text-danger">*</sup></label>
									<input type="text" name="label" value="{{ old('label') }}" placeholder="Enter Label" class="form-control" id="label">
									@error('label')
							        	<div class="text-danger">{{ $message }}</div>
							        @enderror
								</div>
							</div>
							<div class="col-xs-5">

								<div class="form-group">
									<label for="url">Module Url <sup class="text-danger">*</sup></label>
									<input type="text" name="url" value="{{ old('url') }}"  placeholder="Enter Url" class="form-control" id="url">
									@error('url')
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
