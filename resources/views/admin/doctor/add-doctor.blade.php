@extends('admin.layout.master')

@section('title','Doctor')
@section('active_menu','mnu-doctor')
@section('active_submenu','add')

@section('styles')
@parent
<link href="{{url('md/plugins/cropper/cropper.min.css')}}" rel="stylesheet">

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

			<form id="form_validation" method="POST" action="{{url('admin/add-doctor')}}" enctype="multipart/form-data">
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

				<h2 class="card-inside-title">Name </h2>
				<div class="row clearfix">
					<div class="col-sm-12">
						<div class="form-group ">
							<div class="form-line">
								<input type="text" value="{{old('name')}}" name="name" class="form-control" required>
							</div>
						</div>
					</div>
				</div>

				<h2 class="card-inside-title">Qualification </h2>
				<div class="row clearfix">
					<div class="col-sm-12">
						<div class="form-group ">
							<div class="form-line">
								<input type="text" value="{{old('qualification')}}" name="qualification" class="form-control">
							</div>
						</div>
					</div>
				</div>

				<h2 class="card-inside-title">Department </h2>
				<div class="row clearfix">
					<div class="col-sm-12">
						<div class="form-group ">
							<div class="form-line">
								<select  name="department" class="form-control" required>
									<option value="">--- Choose Department ---</option>
									@foreach($depts as $dept)
									<option value="{{$dept->id}}">{{$dept->name}}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>
				</div>

				<h2 class="card-inside-title">Designation </h2>
				<div class="row clearfix">
					<div class="col-sm-12">
						<div class="form-group ">
							<div class="form-line">
								<input type="text" value="{{old('designation')}}" name="designation" class="form-control">
							</div>
						</div>
					</div>
				</div>

				

				<h2 class="card-inside-title"> Visiting Place </h2>
				<div class="row clearfix">
					<div class="col-sm-12">
						<div class="form-group demo-tagsinput-area">
							<div class="form-line">
								<input type="text" maxlength="255" value="{{old('place')}}" name="place" class="form-control" data-role="tagsinput" required>
							</div>
						</div>
					</div>
				</div>

				<h2 class="card-inside-title"> Description</h2>
				<div class="row clearfix">
					<div class="col-sm-12">
						<div class="form-group demo-tagsinput-area">
							<div class="form-line">
								<textarea  name="description" class="form-control">{{old('description')}}</textarea>
							</div>
						</div>
					</div>
				</div>


				<div class="row clearfix">
					<div class="col-sm-12 image_class">
						<div class="form-group image_class">
							<label class="image_class">Upload Image :</label>
							<!-- <p class="help-block">Use images of width:1920px and height:430px for best quality</p> -->


							<input id="ImageInput" type="file" style="max-width:75px; max-height:70px; overflow:hidden;cursor:pointer;font-size: 5em;" accept="image/*" name="image" class="col-indigo glyphicon glyphicon-picture fa-5x image_class">
							<div id="result" class="img-preview preview-lg row image_class"></div>
						</div>
					</div>
				</div>
				


				
				
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




<!-- Modal -->
<div id="CropperModal" class="modal fade" aria-labelledby="modalLabel" role="dialog" tabindex="-1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modalLabel">Crop the image</h4>
			</div>
			<div class="modal-body">

				<div class="featured_image">
					<img id="CropperImage" alt="Crop Image" />
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-lg btn-success" data-dismiss="modal">Crop</button>
			</div>
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



{{-- cropper --}}
<script src="{{url('md/plugins/cropper/cropper.min.js')}}"></script>
<script>
	$(function() {
		imageWidth = 300;
		imageHeight = 300;
		storageLocation= "{{App\Models\Doctor::IMAGE_LOCATION}}";

		postUrl = "{{url('admin/doctor/upload-image')}}";

		result = $('#result');
		image = $(".featured_image > img");
		saveButton = $("#saveButton");
		imageInput =$("#ImageInput");
		cropperModal = $('#CropperModal');

		imageInput.change(function() {
			if (this.files && this.files[0]) {
				displayCropper(this);
			}
		});

		function displayCropper(input) {
					//Set src of Modal as input Image
					var reader = new FileReader();
					reader.onload = function(e) {
						$('#CropperImage').attr("src", e.target.result);
						$('#CropperModal').modal({
							backdrop: 'static',
							keyboard: false
						});
					}
					if (input instanceof File) {
						reader.readAsDataURL(input);
					} else {
						reader.readAsDataURL(input.files[0]);
					}
				}

				cropperModal.on('shown.bs.modal', function() {
					var croperOptions = {
						aspectRatio: imageWidth/imageHeight,
						autoCrop: true,
						autoCropArea: 1.0,
						background: false,
						checkImageOrigin: true,
						dragCrop: false,
						guides: false,
						highlight: false,
						modal: true,
						movable: false,
						mouseWheelZoom: false,
						resizable: false,
						responsive: false,
						strict: true,
						touchDragZoom: false,
						zoomable: false
					};
					image.cropper(croperOptions);
				}).on('hidden.bs.modal', function() {
					var loadingHtml = '<div id="ImageLoading" class="loader col-md-12 m-t-30"><div class="md-preloader pl-size-md"><svg viewBox="0 0 75 75"><circle cx="37.5" cy="37.5" r="33.5" class="pl-blue" stroke-width="4"></circle></svg></div></div>';
					result.html(loadingHtml);
					saveButton.attr('disabled',true);




					var croppedImage = image.cropper("getCroppedCanvas", {
						width: Math.min(imageWidth,image.cropper('getImageData').naturalWidth),
						height: Math.min(imageHeight,image.cropper('getImageData').naturalHeight)
					}).toDataURL();
					$.ajax({
						url : postUrl,
						type: "POST",
						data:  {
							image: croppedImage,
							location:storageLocation,
						},
						success:function(data) {
							imageInput.val("");

					// Show
					result.html('<div id="image-preview-'+data.filename.slice(0,-4)+'" class="col-md-3 m-t-30" style="min-height:100px"><span><img class="img-responsive" src="' + data.src + '"></span></div>');

					$('<input>').attr('type','hidden')
					.attr('id','image-input-'+data.filename.slice(0,-4))
					.attr('name','image[]')
					.attr('value',data.filename)
					.appendTo('#result');
				},
				error: function(){
					console.log('failed to upload image');
				},
				complete: function(){
					saveButton.attr('disabled',false);
					$('#ImageLoading').remove();
				}
			});
					image.cropper('destroy');
				});
			});
		</script>




		<script type="text/javascript">

			$.ajaxSetup({
				headers: {
					'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
				}
			});
		</script>


		@endsection