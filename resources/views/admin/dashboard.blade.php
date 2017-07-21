@extends('admin.layout.master')

@section('title', 'Dashboard')

@section('content')
<div class="row">


		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
			<div class="card">
				<div class="header bg-green">
					<h2>Banner </h2>
				</div>
				<div class="body">
					<div class="list-group">
						<a href="{{url('admin/banners/add')}}" class="list-group-item">Add</a>
						<a href="{{url('admin/banners')}}" class="list-group-item">Manage</a>
					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
			<div class="card">
				<div class="header bg-green">
					<h2>Clinic</h2>
				</div>
				<div class="body">
					<div class="list-group">
						<a href="{{url('admin/clinics/add')}}" class="list-group-item">Add</a>
						<a href="{{url('admin/clinics')}}" class="list-group-item">Manage</a>
					</div>
				</div>
			</div>
		</div>


		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
			<div class="card">
				<div class="header bg-green">
					<h2>Departments</h2>
				</div>
				<div class="body">
					<div class="list-group">
						<a href="{{url('admin/department')}}" class="list-group-item">Add</a>
						<a href="{{url('admin/manage-department')}}" class="list-group-item">Manage</a>
					</div>
				</div>
			</div>
		</div>


		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
			<div class="card">
				<div class="header bg-green">
					<h2>Doctors</h2>
				</div>
				<div class="body">
					<div class="list-group">
						<a href="{{url('admin/doctor')}}" class="list-group-item">Add</a>
						<a href="{{url('admin/manage-doctor')}}" class="list-group-item">Manage</a>
					</div>
				</div>
			</div>
		</div>





		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
			<div class="card">
				<div class="header bg-green">
					<h2>Gallery</h2>
				</div>
				<div class="body">
					<div class="list-group">
						<a href="{{url('admin/gallery/add')}}" class="list-group-item">Add</a>
						<a href="{{url('admin/gallery')}}" class="list-group-item">Manage</a>
					</div>
				</div>
			</div>
		</div>



		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
			<div class="card">
				<div class="header bg-green">
					<h2>Talks</h2>
				</div>
				<div class="body">
					<div class="list-group">
						<a href="{{url('admin/talks/add')}}" class="list-group-item">Add</a>
						<a href="{{url('admin/talks')}}" class="list-group-item">Manage</a>
					</div>
				</div>
			</div>
		</div>

		



</div>
@endsection

@section('scripts')
@parent

<script type="text/javascript">
//Activate current item in left side menu
$(document).ready(function() {
   $(".menu .list li").removeClass('active');
   $("#mnu-dashboard").addClass('active').find('a').click();
});
</script>

@endsection
