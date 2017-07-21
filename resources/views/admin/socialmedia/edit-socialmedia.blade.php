@extends('admin.layout.master')

@section('title','Social Media')

@section('styles')
@parent

<link href="{{url('md/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />

@endsection


@section('content')

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

	<div class="card">
		<div class="body">

			<form id="form_validation" method="POST" action="{{url('admin/update-social-media/'.$socialmedia->id)}}" enctype="multipart/form-data">
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
				
				<input type="hidden" name="id" value="{{$socialmedia->id}}">

				<h2 class="card-inside-title">Social Media</h2>
				<div class="row clearfix">
					<div class="col-sm-12">
						<div class="form-group ">
							<div class="form-line">
								<select class="form-control show-tick" name="social" required>
									<option>-- Select Social Media --</option>
									<option value="fa fa-facebook-official">Facebook</option>
									<option value="fa fa-twitter-square">Twitter</option>
									<option value="fa fa-google-plus-square">Google Plus </option>
									<option value="fa fa-pinterest-square">Pinterest</option>
									<option value="fa fa-instagram">Instagram</option>
									<option value="fa fa-linkedin-square">LinkedIn</option>
									<option value="fa fa-rss-square">Blogger</option>
									<option value="fa fa-youtube-square">YouTube</option>
								</select>
							</div>
						</div>
					</div>
				</div>

				<h2 class="card-inside-title">URL</h2>
				<div class="row clearfix">
					<div class="col-sm-12">
						<div class="form-group ">
							<div class="form-line">
								<input type="text" value="{{$socialmedia->url}}" name="url" class="form-control" required>
							</div>
						</div>
					</div>
				</div>

				
				<div class="row clearfix">
					<div class="col-sm-12">
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

<script type="text/javascript">
//Activate current item in left side menu
$(document).ready(function() {
   $(".menu .list li").removeClass('active');
   $("#mnu-social").addClass('active').find('a').click();
});
</script>


@endsection