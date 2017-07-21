@extends('admin.layout.master')

@section('title','Department')
@section('active_menu','mnu-department')

@section('content')

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="body">
				<form id="form_validation" method="POST" action="{{url('admin/department-update/'.$department->id)}}" enctype="multipart/form-data">
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

					<input type="hidden" name="id" value="{{$department->id}}" class="form-control">

					<label> Department</label>
					<div class="row clearfix">
						<div class="col-sm-12">
							<div class="form-group ">
								<div class="form-line">
									<input type="text" value="{{$department->name}}" maxlength="255" name="name" class="form-control" required>
								</div>
							</div>
						</div>
					</div>


					<div class="row clearfix">
						<div class="col-sm-12">
							<div class="form-group">
								<div class="">
									<input type="submit" name="save" value="Save Data" id="saveButton" class="btn btn-success waves-effect" >
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


	{{-- cropper --}}
	
	<script type="text/javascript">
		document.getElementById("form_validation").addEventListener("click", function(event){
			//event.preventDefault()
		});
	</script>
	

	<script type="text/javascript">
//Used for all Ajax posts
// CSRF protection
$.ajaxSetup({
	headers: {
		'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
	}
});
</script>


<script type="text/javascript">
//Activate current item in left side menu
$(document).ready(function() {
	$(".menu .list li").removeClass('active');
	$("#mnu-dept").addClass('active').find('a').click();
});
</script>

@endsection
