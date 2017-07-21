@extends('aihms.layout.master')

@section('content')
<section id="breadcrumb" class="card">
	<h4 class="breadcrumb_title">Our Doctors</h4>
	<nav class="breadcrumb float-xs-right">
		<a class="breadcrumb-item" href="{{url('/')}}">Home</a>
		<span class="breadcrumb-item active">Our Doctors</span>
	</nav>
</section>

<section id="doctors">
	<div id="doctor_wraper" class="col-md-6 no-padding">
		<div class="asthma">
			<h4 class="find"><span>Find Your</span>Doctor</h4>
			<form id="find_doctor" action="{{url('/doctors')}}" method="get">
				<div class="form-group clearfix">

					<select class="" name="department">
						<option value="">Search By Department</option>
						@inject('departments','App\Models\Department')
						@foreach($departments->all() as $department)
						<option>{{$department->name}}</option>
						@endforeach
					</select>
					<select class="" name="location">
						@inject('locations','App\Models\Location')
						<option value="">Search By Place</option>
						@foreach($locations->get(['name']) as $location)
						<option value="{{$location->name}}">{{$location->name}}</option>
						@endforeach

					</select>

				</div>
				<button class="findDoctor" href="#" value="search" type="submit" name="find" >FIND DOCTOR</button>
			</form>
		</div>
	</div>
	<div class="col-md-6 no-padding">
		<div class="allergy">

			<div class="allergy_title">
				@if($doctors->isEmpty())
				<h1>no<br/>doctors<br/>found</h1>
				@else
				<h1>Our Doctors</h1>
				@endif
			</div>

			</div>
		</div>

		@if(!$doctors->isEmpty())

		<div  id="doctors_thumb">

			@foreach($doctors as $doctor)
			<div style="min-height:320px" class="clinic-item col-md-6 col-sm-6 col-xs-12 text-justify border-right bg">
				<div class="row">
					<a href="" data-toggle="modal" data-target="#Doctor-{{$loop->iteration}}">
						<div class="col-md-4 col-lg-4">
							<div class="round_pic">
								<img class="img-fluid" src="{{url('uploads/doctors/'.$doctor->image)}}">
							</div>
							<i class="fa fa-angle-right fa-2x right_angle" aria-hidden="true"></i>
						</div>
						<div class="col-md-8 col-lg-8 pt-10 pl-30">
							<h5 class="dctr_name">{{$doctor->name}}</h5>
							<h5 class="light-text bottom_line_green">{{$doctor->qualification}}</h5>
							<h6>Visiting Center</h6>
							<pre>{{$doctor->visiting_place}}</pre>
							{{-- <h6>Visiting Days</h6> --}}
							<pre>{{title_case($doctor->description) }}</pre>
						</div>
					</a>
				</div>
			</div>


<div id="Doctor-{{$loop->iteration}}" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<div class="row">
					<div class="col-md-6">
						<div >
							<img class="img-fluid" style="height:150px" src="{{url('uploads/doctors/'.$doctor->image)}}">
						</div>
					</div>
					<div class="col-md-6">
						<h5 class="dctr_name">{{$doctor->name}}</h5>
						<h5 class="light-text bottom_line_green">{{$doctor->qualification}}</h5>
						<h6>Designation :</h6>
						<p>{{$doctor->department->name}}</p>
					</div>

					<div class="col-sm-12">
						<div class="col-md-6">
							<h6>Visiting Center</h6>
							<p>{!!str_replace(",", '<br/>', $doctor->visiting_place)!!}</p>
						</div>
						<div class="col-md-6">
							<h6>Visiting Days</h6>
							<p>{!! nl2br(title_case($doctor->description)) !!}</p>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>


			@endforeach

		@endif

		<nav class="col-sm-12">
			{{ $doctors->links('vendor.pagination.bootstrap-4') }}
		</nav>

			<section style="float:left; padding:0;">
				<div style="margin-top:5px; margin-bottom:3px;" class="container">
					<div class="row ">
						@include('aihms.layout.partials.form')
					</div>
				</div>
			</section>

		</div>




	</section>
</div>
</div>
</div>

@endsection


@section('scripts')
@parent
<script type="text/javascript" src="{{url('aihms/bower_components/moment/min/moment.min.js')}}"></script>
<script type="text/javascript" src="{{url('aihms/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.js')}}"></script>
<script type="text/javascript">
	$(function () {
		$('#datetimepicker1').datetimepicker();
	});
</script>


@endsection

