@extends('admin.layout.master')

@section('title','Location')
@section('active_menu','mnu-location')
@section('active_submenu','add')

@section('styles')
@parent

<link href="{{url('md/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />

<link href="{{url('md/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}" rel="stylesheet">
<link href="{{url('md/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet" />

{{-- <link href="{{url('md/css/style.css')}}" rel="stylesheet">
 --}}
 @endsection



@section('content')


<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="card">
		<div class="body">

			<form id="form_validation" method="POST" action="{{url('admin/add-location')}}" enctype="multipart/form-data">
				{{csrf_field()}}

				@if (count($errors) > 0)
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif

				<h2 class="card-inside-title">Location </h2>
				<div class="row clearfix">
					<div class="col-sm-12">
						<div class="form-group ">
							<div class="form-line">
								<input type="text" value="{{old('name')}}" name="name" class="form-control" required placeholder="eg: Kozhikode">
							</div>
						</div>
					</div>
				</div>

				<h2 class="card-inside-title">Address </h2>
				<div class="row clearfix">
					<div class="col-sm-12">
						<div class="form-group ">
							<div class="form-line">
								
								<textarea id="" class="form-control" name="address" required>{{old('address')}}</textarea>
							</div>
						</div>
					</div>
				</div>

				<h2 class="card-inside-title"> Contact Number </h2>
				<div class="row clearfix">
					<div class="col-sm-12">
						<div class="form-group demo-tagsinput-area">
							<div class="form-line">
								<input type="number" value="{{old('contact')}}" name="contact" class="form-control" data-role="tagsinput" required>
							</div>
						</div>
					</div>
				</div>

				<h2 class="card-inside-title"> Email </h2>
				<div class="row clearfix">
					<div class="col-sm-12">
						<div class="form-group demo-tagsinput-area">
							<div class="form-line">
								<input type="text" value="{{old('email')}}" name="email"  class="form-control" data-role="tagsinput" required>
							</div>
						</div>
					</div>
				</div>

				<h2 class="card-inside-title">Working Time </h2>
				<div class="row clearfix">
					<div class="col-sm-12">
						<div class="form-group ">
							<div class="form-line">
								<input type="text" value="{{old('working_time')}}" name="working_time" class="form-control" placeholder="eg: 9.00 am to 7.00 pm">
							</div>
						</div>
					</div>
				</div>

		

				{{-- <h2 class="card-inside-title">Map Co ordinates<small class="help-block">To show location in google maps</small></h2>

				<h2 class="card-inside-title">Latitude </h2>
				<div class="row clearfix">
					<div class="col-sm-12">
						<div class="form-group ">
							<div class="form-line">
								<input type="number" maxlength="25" value="{{old('latitude')}}" name="latitude" placeholder="25.369194"  class="form-control" required>
							</div>
							<p class="help-block">latitude</p>
						</div>
					</div>
				</div>

				<h2 class="card-inside-title">Longitude </h2>
				<div class="row clearfix">
					<div class="col-sm-12">
						<div class="form-group ">
							<div class="form-line">
								<input type="text" maxlength="25" name="longitude" value="{{old('longitude')}}" placeholder="51.551574,16" class="form-control" required>
							</div>
							<p class="help-block">longitude,zoom</p>
						</div>
					</div>
				</div> --}}
				
				
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