@extends('admin.layout.master')

@section('title','Location')
@section('active_menu','mnu-location')

@section('styles')
@parent

<link href="{{url('md/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />

<link href="{{url('md/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}" rel="stylesheet">
<link href="{{url('md/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet" />

{{-- <link href="{{url('md/css/style.css')}}" rel="stylesheet"> --}}
@endsection


@section('content')

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="card">
		<div class="body">

			<form id="form_validation" method="POST" action="{{url('admin/location/'.$location->id)}}" enctype="multipart/form-data">
				
				{{csrf_field()}}
				{{ method_field('PUT') }}

				@if (count($errors) > 0)
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif

				<input type="hidden" value="{{$location->id}}" name="id">

				<h2 class="card-inside-title">Location </h2>
				<div class="row clearfix">
					<div class="col-sm-12">
						<div class="form-group ">
							<div class="form-line">
								<input type="text" name="name" value="{{$location->name}}" class="form-control" required>
							</div>
						</div>
					</div>
				</div>

				<h2 class="card-inside-title">Address </h2>
				<div class="row clearfix">
					<div class="col-sm-12">
						<div class="form-group ">
							<div class="form-line">
								<textarea name="address" maxlength="115" maxlength="180" minlength="10" class="form-control" required>{{$location->address}}</textarea>
							</div>
						</div>
					</div>
				</div>

				<h2 class="card-inside-title"> Contact Number </h2>
				<div class="row clearfix">
					<div class="col-sm-12">
						<div class="form-group demo-tagsinput-area">
							<div class="form-line">
								<input type="text" name="contact"  maxlength="30" value="{{$location->phone}}" class="form-control" data-role="tagsinput" required>
							</div>
						</div>
					</div>
				</div>

				<h2 class="card-inside-title"> Email </h2>
				<div class="row clearfix">
					<div class="col-sm-12">
						<div class="form-group demo-tagsinput-area">
							<div class="form-line">
								<input type="text" name="email" maxlength="110" value="{{$location->email}}" class="form-control" data-role="tagsinput" required>
							</div>
						</div>
					</div>
				</div>

				
				<h2 class="card-inside-title">Working Time </h2>
				<div class="row clearfix">
					<div class="col-sm-12">
						<div class="form-group ">
							<div class="form-line">
								<input type="text" value="{{$location->working_time}}" name="working_time" class="form-control" placeholder="eg: 9.00 am to 7.00 pm">
							</div>
						</div>
					</div>
				</div>

				
{{-- 
				<h2 class="card-inside-title">Map Cordinates<small class="help-block">To show location in google maps</small></h2>

				<h2 class="card-inside-title">Latitude </h2>
				<div class="row clearfix">
					<div class="col-sm-12">
						<div class="form-group ">
							<div class="form-line">
								<input type="number" name="latitude" value="{{$location->latitude}}" placeholder="25.369194" class="form-control" required>
							</div>
							<p class="help-block">latitude</p>
						</div>
					</div>
				</div>

				<h2 class="card-inside-title">longitude </h2>
				<div class="row clearfix">
					<div class="col-sm-12">
						<div class="form-group ">
							<div class="form-line">
								<input type="text" name="longitude" value="{{$location->longitude}}"  placeholder="51.551574,16"  class="form-control" required>
							</div>
							<p class="help-block">longitude,zoom</p>
						</div>
					</div>
				</div>
				
 --}}
				
				
				<div class="row clearfix">
					<div class="col-sm-6">
						<div class="form-group">
							<div class="">
								<input type="submit" name="save" value="Save Data" class="btn btn-success waves-effect" >
							</div>
						</div>
					</div>
				</div>

			</form>	

		</div>
	</div>
</div>



@endsection

@section('scripts')
@parent

<script src="{{url('md/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>
<script src="{{url('md/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>
<!-- Bootstrap Material Datetime Picker Plugin Js -->
<script src="{{url('md/js/pages/forms/basic-form-elements.js')}}"></script>
<!-- Moment Plugin Js -->
<script src="{{url('md/plugins/momentjs/moment.js')}}"></script>

<script src="{{url('md/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>

<script src="{{url('md/plugins/autosize/autosize.js')}}"></script>


@endsection