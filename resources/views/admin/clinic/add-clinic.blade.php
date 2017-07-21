@extends('admin.layout.master')

@section('title','Clinics')
@section('active_menu','mnu-clinic')
@section('active_submenu','add')

@section('styles')
@parent
<link href="{{url('md/plugins/cropper/cropper.min.css')}}" rel="stylesheet">

@endsection

@section('content')
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="card">
		<div class="body">

			<form id="form_validation" method="POST" action="{{url('admin/clinics')}}" enctype="multipart/form-data">
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


				<label>Clinic Name</label>
				<div class="row clearfix">
					<div class="col-sm-12">
						<div class="form-group ">
							<div class="form-line">
								<input type="text" value="{{old('name')}}" name="name" maxlength="255" class="form-control" required>
							</div>
						</div>
					</div>
				</div>

				<label>Description</label>
				<div class="row clearfix">
					<div class="col-sm-12">
						<div class="form-group">
							<div class="form-line">
								<textarea name="description" class="form-control" required>{{old('description')}}</textarea>
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
					<div class="col-sm-12">
						<div class="form-group">
							<div class="">
								<input type="submit" id="saveButton" name="save" value="Save Data" class="btn btn-success waves-effect" >
							</div>
						</div>
					</div>
				</div>

			</form>
		</div>
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

{{-- cropper --}}
<script src="{{url('md/plugins/cropper/cropper.min.js')}}"></script>
<script>
	$(function() {
		var imageWidth = 1251;
		var imageHeight = 846;
		var storageLocation= "{{App\Models\Clinic::IMAGE_LOCATION}}";
		var postUrl = "{{url('admin/clinic/upload-image')}}";

		var result = $('#result');
		var image = $(".featured_image > img");
		var saveButton = $("#saveButton");
		var imageInput =$("#ImageInput");
		var cropperModal = $('#CropperModal');

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
//Used for all Ajax posts
// CSRF protection
	$.ajaxSetup({
	headers: {
		'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
		}
	});
</script>

@endsection
