@extends('admin.layout.master')

@section('title','Product Category')

@section('styles')
@parent

<link href="{{url('md/plugins/cropper/cropper.min.css')}}" rel="stylesheet">

@endsection

@section('content')

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

	<div class="card">
		<div class="body">
			<form id="form_validation" method="POST" action="{{url('admin/update-category/'.$category->id)}}" enctype="multipart/form-data">
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

				<input type="hidden" name="id" value="{{$category->id}}">
					<div class="col-sm-12">
				<h2 class="card-inside-title">Product Category</h2>
						<div class="form-group ">
							<div class="form-line">
								<input type="text" maxlength="80" value="{{$category->category}}" name="productcategory" class="form-control" required>
							</div>
						</div>
					</div>




				<!-- 	<h2 class="card-inside-title">Publish in Menu</h2> -->
				<div class="demo-checkbox" style="display:none">
					<input type="checkbox" name="publishmenu" id="md_checkbox_30" value="Y" class="filled-in chk-col-pink" checked />
					<label for="md_checkbox_30">Publish in Menu</label>
				</div>

				<!-- <h2 class="card-inside-title">Publish in Shop</h2> -->
				<div class="demo-checkbox" style="display:none">
					<input type="checkbox" name="publishshop" id="md_checkbox_31" value="Y" class="filled-in chk-col-pink" checked />
					<label for="md_checkbox_31">Publish in Shop</label>

				</div>

								{{-- <h2 class="card-inside-title">Choose Background Image</h2> --}}
{{-- 				<div class="row clearfix">
					<div class="col-sm-12">
						<div class="form-group ">
							<div class="">
								<img height="135px" src="{{url('uploads/ourmenu/'.$category->image)}}" width="247" height="165" alt="no-image">
							</div>
						</div>
					</div>
				</div> --}}

{{-- 				<h2 class="card-inside-title">Choose Background Image</h2>
				<p class="help-block">Use dark image of width:950px and height:135px for a better visual appeal</p>
				<div class="row clearfix">
					<div class="col-sm-12">
						<div class="form-group ">
							<div class="form-line">
								<input type="file" name="image" class="form-control" >
							</div>
						</div>
					</div>
				</div> --}}

				<div class="col-sm-12">
					<div class="form-group">
						<h2 class="card-inside-title">Upload Background Image :</h2>
							<p class="help-block">Use dark image of width:950px and height:135px for a better visual appeal</p>
						<input id="ImageInput" type="file" style="max-width:75px; max-height:70px; overflow:hidden;cursor:pointer;font-size: 5em;" accept="image/*" name="image" class="col-indigo glyphicon glyphicon-picture fa-5x">
						<div id="result" class="img-preview preview-lg row">
						@if(null != $category->image)
							<input type="hidden" id="image-input-{{substr($category->image,0,-4)}}" name = "image[]" value="{{$category->image}}">
							<div id="image-preview-{{substr($category->image,0,-4)}}" class="col-md-12" style="margin-top:20px;min-height:210px"><span><img class="img-responsive" src="{{url(App\Models\ProductCategory::IMAGE_LOCATION)."/".$category->image}}"></span></div>
						@endif
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




@include('admin.layout.partials.imageCropBox')

@endsection
@section('scripts')
@parent



  {{-- cropper --}}
    <script src="{{url('md/plugins/cropper/cropper.min.js')}}"></script>
    <script>
    $(function() {
    	result = $('#result');
    	image = $(".featured_image > img");
    	
    	$("#ImageInput").change(function() {
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

	$('#CropperModal').on('shown.bs.modal', function() {
		image.cropper({
			aspectRatio: 950/135, //Change ratio here
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
		});
	}).on('hidden.bs.modal', function() {
		result.html('<div id="ImageLoading" class="col-sm-3 text-center"><h3>loading...</h3></div>');
		$("#saveButton").attr('disabled',true);

		var location= "{{App\Models\ProductCategory::IMAGE_LOCATION}}";

		$.ajax({
		    url : "{{url('admin/product/category/upload-image')}}",
		    type: "POST",
		    data:  {
				image: image.cropper("getCroppedCanvas").toDataURL(),
				location:location,
			},
			success:function(data) {
				$('#ImageInput').val("");

				// Show
				result.html('<div id="image-preview-'+data.filename.slice(0,-4)+'" class="col-md-12" style="margin-top:20px;min-height:100px"><span><img class="img-responsive" src="' + data.src + '"></span></div>');

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
					$("#saveButton").attr('disabled',false);
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

<script type="text/javascript">
//Activate current item in left side menu
$(document).ready(function() {
   $(".menu .list li").removeClass('active');
   $("#mnu-product").addClass('active').find('a').click();
});
</script>




@endsection